<?php
date_default_timezone_set('Asia/Manila');
session_start();
require '../database/database.php';

// Settings
$max_attempts = 3;
$lockout_time = 900; // 15 minutes
$admin_webhook = 'https://discord.com/api/webhooks/1343392289174589492/k0Qvwb3K8ib3Dloz6Q_8epKLCvQwhMnuEL_soQqV5oQObFT0fRcc2DS2ZlktjcE094z5'; // Replace with your Discord webhook

function sendDiscordAlert($message, $webhookUrl) {
    $jsonData = json_encode(["content" => $message]);
    $ch = curl_init($webhookUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($ch);
    curl_close($ch);
}

function sendSuspiciousLoginAlert($username, $ip, $status, $webhookUrl) {
    $message = "⚠️ **Suspicious Login Attempt Detected** ⚠️\n\n"
             . "**Username:** {$username}\n"
             . "**IP Address:** {$ip}\n"
             . "**Status:** {$status}\n"
             . "**Time:** " . date('Y-m-d H:i:s');
    sendDiscordAlert($message, $webhookUrl);
}

function sendSuccessfulAdminLoginAlert($username, $ip, $webhookUrl) {
    $message = "✅ **Admin Login Successful:**\n\n"
             . "**Username:** {$username}\n"
             . "**IP Address:** {$ip}\n"
             . "**Time:** " . date('Y-m-d H:i:s') . " 🚀";
    sendDiscordAlert($message, $webhookUrl);
}

// Helper functions
function getFailedAttempts($username, $ip, $conn) {
    $timeWindow = date('Y-m-d H:i:s', strtotime('-15 minutes'));
    $sql = "SELECT COUNT(*) AS attempts, MIN(attempt_time) AS first_attempt 
            FROM login_attempts 
            WHERE username = :username AND ip_address = :ip 
            AND attempt_time > :timeWindow";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':ip' => $ip, ':timeWindow' => $timeWindow]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function logAdminAttempt($username, $ip, $status, $conn) {
    $sql = "INSERT INTO admin_login_attempts (username, ip_address, attempt_time, status) 
            VALUES (:username, :ip, NOW(), :status)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':ip' => $ip, ':status' => $status]);
}

function recordFailedAttempt($username, $ip, $conn) {
    $sql = "INSERT INTO login_attempts (username, ip_address, attempt_time) VALUES (:username, :ip, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':ip' => $ip]);
}

function clearFailedAttempts($username, $ip, $conn) {
    $sql = "DELETE FROM login_attempts WHERE username = :username AND ip_address = :ip";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':ip' => $ip]);
}

function getRemainingLockoutTime($first_attempt_time, $lockout_time) {
    $first_attempt_timestamp = strtotime($first_attempt_time);
    $unlock_time = $first_attempt_timestamp + $lockout_time;
    $remaining_seconds = $unlock_time - time();
    return max($remaining_seconds, 0);
}

// Main login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $ip = $_SERVER['REMOTE_ADDR'];

    try {
        $attemptsData = getFailedAttempts($username, $ip, $conn);
        $attempts = $attemptsData['attempts'] ?? 0;

        if ($attempts >= $max_attempts) {
            $remaining = getRemainingLockoutTime($attemptsData['first_attempt'], $lockout_time);
            if ($remaining > 0) {
                $_SESSION['error'] = "⚠️ Too many failed attempts. Try again in " 
                                     . floor($remaining / 60) . "m " . ($remaining % 60) . "s.";
                header("Location: ../pages/login.php");
                exit();
            } else {
                clearFailedAttempts($username, $ip, $conn);
            }
        }

        $sql = "SELECT id, first_name, last_name, password, role FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            clearFailedAttempts($username, $ip, $conn);
            logAdminAttempt($username, $ip, 'success', $conn);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                sendSuccessfulAdminLoginAlert($username, $ip, $admin_webhook);
                header("Location: ../admin_page/dashboard.php");
            } else {
                header("Location: ../pages/dashboard.php");
            }
            exit();
        } else {
            recordFailedAttempt($username, $ip, $conn);
            logAdminAttempt($username, $ip, 'failed', $conn);
            sendSuspiciousLoginAlert($username, $ip, 'Failed Login Attempt', $admin_webhook);

            $remainingAttempts = $max_attempts - ($attempts + 1);
            $_SESSION['error'] = $remainingAttempts > 0
                ? "❌ Invalid credentials. {$remainingAttempts} attempt(s) left."
                : "⚠️ Too many failed attempts. Account locked for 15 minutes.";
            header("Location: ../pages/login.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>