document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('accordionSidebar');

    if (toggleButton && sidebar) {
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('toggled');
        });
    }
});
