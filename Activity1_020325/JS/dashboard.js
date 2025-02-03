function toggleDropdown(dropdownId) {
    var dropdownContent = document.getElementById(dropdownId);
    if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "block";
    }
}
