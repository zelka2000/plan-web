// Открытие попапов
const openPopupBtns = document.querySelectorAll('.openPopup');
const popups = document.querySelectorAll('.popup');
const closePopupBtns = document.querySelectorAll('.close-popup');

// Открытие попапа по кнопке
openPopupBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        const popupId = btn.getAttribute('data-popup');
        const popup = document.getElementById(popupId);
        popup.classList.add('open');
        document.body.style.overflow = 'hidden';
    });
});

// Закрытие попапа по кнопке
closePopupBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        const popupId = btn.getAttribute('data-popup');
        const popup = document.getElementById(popupId);
        popup.classList.remove('open');
        document.body.style.removeProperty('overflow');
    });
});

// Закрытие попапа при клике вне области попапа
window.addEventListener('click', (e) => {
    popups.forEach((popup) => {
        if (e.target === popup) {
            popup.classList.remove('open');
            document.body.style.removeProperty('overflow');
        }
    });
});