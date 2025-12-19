import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Функция для получения всех ID модалок, которые реально есть на странице прямо сейчас
function getDynamicModalIds() {
    // Выбираем все элементы с классом modal и берем их id
    return Array.from(document.querySelectorAll('.modal')).map(modal => modal.id);
}

function getCurrentModalIndex(modalIds) {
    for (let i = 0; i < modalIds.length; i++) {
        const el = document.getElementById(modalIds[i]);
        if (el && el.classList.contains('show')) {
            return i;
        }
    }
    return -1;
}

document.addEventListener('DOMContentLoaded', () => {
    // 1. Инициализация Popovers и Toast (оставляем как было)
    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
        bootstrap.Popover.getOrCreateInstance(el);
    });

    const toastEl = document.getElementById('liveToast');
    if (toastEl) {
        const toastTrigger = document.getElementById('liveToastBtn');
        const toastInstance = bootstrap.Toast.getOrCreateInstance(toastEl);
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => toastInstance.show());
        }
    }

    // 2. Переключение модалок стрелками
    document.addEventListener('keydown', (event) => {
        if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;

        const modalIds = getDynamicModalIds(); // Получаем актуальный список ID
        const currentIndex = getCurrentModalIndex(modalIds);

        if (currentIndex === -1) return;

        event.preventDefault();

        // Рассчитываем индекс следующей цели
        const targetIndex = event.key === 'ArrowLeft' ? (currentIndex - 1) : (currentIndex + 1);

        // Проверка границ
        if (targetIndex < 0 || targetIndex >= modalIds.length) return;

        const currentEl = document.getElementById(modalIds[currentIndex]);
        const nextEl = document.getElementById(modalIds[targetIndex]);

        if (!currentEl || !nextEl) return;

        // Логика переключения
        const currentModal = bootstrap.Modal.getOrCreateInstance(currentEl);
        const nextModal = bootstrap.Modal.getOrCreateInstance(nextEl);

        // Чтобы не было конфликта анимаций и "черного экрана" (backdrops)
        currentEl.addEventListener('hidden.bs.modal', function onHidden() {
            nextModal.show();
            currentEl.removeEventListener('hidden.bs.modal', onHidden);
        }, { once: true });

        currentModal.hide();
    });
});
