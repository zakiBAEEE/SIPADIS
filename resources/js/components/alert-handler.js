export function initializeAlerts() {

    const alerts = document.querySelectorAll('.js-dismissable-alert');

    alerts.forEach(alert => {
        const closeButton = alert.querySelector('.js-close-alert');

        const dismiss = () => {
            alert.style.opacity = '0';
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.parentNode.removeChild(alert);
                }
            }, 350);
        };

        if (closeButton) {
            closeButton.addEventListener('click', dismiss);
        }

        setTimeout(dismiss, 5000);
    });
};