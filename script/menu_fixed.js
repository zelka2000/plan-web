const header = document.querySelector("header");
let lastScrollY = 0;

window.addEventListener("scroll", () => {
    const currentScrollY = window.scrollY;

    // Если скролл вверх или в самом начале страницы — показываем меню
    if (currentScrollY === 0 || currentScrollY < lastScrollY) {
        gsap.to(header, { y: 0, duration: 0.5 });
    } else {
        // Если скролл вниз — прячем меню
        gsap.to(header, { y: -header.offsetHeight, duration: 0.5 });
    }

    lastScrollY = currentScrollY; // Обновляем последнюю позицию скролла
});
