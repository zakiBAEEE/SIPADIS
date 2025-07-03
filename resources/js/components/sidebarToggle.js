export function initSidebarToggle() {
    const toggleBtn = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            console.log('Toggle clicked');
            sidebar.classList.toggle('-translate-x-full');
        });
    } else {
        console.warn('Sidebar toggle elements not found');
    }
}

