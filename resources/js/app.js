import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

// Массив id модалок (поддерживай порядок как в HTML)
const modalIds = [
    'modalGTA2',
    'modalGTA3',
    'modalMaxPayne',
    'modalViceCity',
    'modalSanAndreas'
];

// Возвращает индекс открытой модалки или -1
function getCurrentModalIndex() {
    for (let i = 0; i < modalIds.length; i++) {
        const el = document.getElementById(modalIds[i]);
        if (el && el.classList.contains('show')) {
            return i;
        }
    }
    return -1;
}

document.addEventListener('DOMContentLoaded', () => {
    // --- Popovers: инициализируем один раз ---
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    popoverTriggerList.forEach(el => {
        // Используем getOrCreateInstance, чтобы не создавать дубликаты
        bootstrap.Popover.getOrCreateInstance(el);
    });

    // --- Toast: создаём инстанс и вешаем обработчик ---
    const toastTrigger = document.getElementById('liveToastBtn');
    const toastEl = document.getElementById('liveToast');
    let toastInstance = null;
    if (toastEl) {
        toastInstance = bootstrap.Toast.getOrCreateInstance(toastEl);
    }
    if (toastTrigger && toastInstance) {
        toastTrigger.addEventListener('click', () => {
            toastInstance.show();
        });
    }

    // --- Подготовка модалок: создаём инстансы и обработчики закрытия ---
    modalIds.forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;

        // Создаём/поднимаем инстанс (не обязательно, но удобно)
        bootstrap.Modal.getOrCreateInstance(el);

        // При закрытии модалки — если больше нет открытых, убрать backdrop и класс body
        el.addEventListener('hidden.bs.modal', () => {
            if (getCurrentModalIndex() === -1) {
                const back = document.querySelector('.modal-backdrop');
                if (back) back.remove();
                document.body.classList.remove('modal-open');
            }
        });
    });

    // --- Переключение модалок стрелками ---
    // Логика: при нажатии стрелки скрыть текущую модалку, по событию hidden.bs.modal открыть следующую.
    document.addEventListener('keydown', (event) => {
        if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;

        const currentIndex = getCurrentModalIndex();
        if (currentIndex === -1) return; // если нет открытой модалки — ничего не делаем

        event.preventDefault();

        const targetIndex = event.key === 'ArrowLeft' ? (currentIndex - 1) : (currentIndex + 1);
        if (targetIndex < 0 || targetIndex >= modalIds.length) return;

        const currentEl = document.getElementById(modalIds[currentIndex]);
        const nextEl = document.getElementById(modalIds[targetIndex]);
        if (!currentEl || !nextEl) return;

        // Показываем следующую модалку только после того, как текущая полностью скрыта
        const onHidden = () => {
            // Открываем следующую
            bootstrap.Modal.getOrCreateInstance(nextEl).show();
            currentEl.removeEventListener('hidden.bs.modal', onHidden);
        };

        // Подписываемся и прячем текущую
        currentEl.addEventListener('hidden.bs.modal', onHidden);
        const currentModal = bootstrap.Modal.getOrCreateInstance(currentEl);
        currentModal.hide();
    });
});
