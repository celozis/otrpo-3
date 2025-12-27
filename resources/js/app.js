import './bootstrap';
import Alpine from 'alpinejs';

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

window.Alpine = Alpine;
Alpine.start();



function getDynamicModalIds() {
    return Array.from(document.querySelectorAll('.modal')).map(modal => modal.id);
}

function getCurrentModalIndex(modalIds) {
    for (let i = 0; i < modalIds.length; i++) {
        const el = document.getElementById(modalIds[i]);

        if (el && (el.classList.contains('show') || el.style.display === 'block')) {
            return i;
        }
    }
    return -1;
}

document.addEventListener('DOMContentLoaded', () => {

    // Переключение модалок стрелками
    document.addEventListener('keydown', (event) => {
        if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;

        const modalIds = getDynamicModalIds();
        const currentIndex = getCurrentModalIndex(modalIds);

        if (currentIndex === -1) return;

        const targetIndex = event.key === 'ArrowLeft' ? (currentIndex - 1) : (currentIndex + 1);
        if (targetIndex < 0 || targetIndex >= modalIds.length) return;

        const currentEl = document.getElementById(modalIds[currentIndex]);
        const nextEl = document.getElementById(modalIds[targetIndex]);

        if (currentEl && nextEl) {
            event.preventDefault();

            const currentModal = bootstrap.Modal.getInstance(currentEl) || new bootstrap.Modal(currentEl);
            const nextModal = new bootstrap.Modal(nextEl);

            currentEl.addEventListener('hidden.bs.modal', () => {
                nextModal.show();
            }, { once: true });

            currentModal.hide();
        }
    });
});
