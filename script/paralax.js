// Убедимся, что ScrollTrigger подключен к GSAP
gsap.registerPlugin(ScrollTrigger);

// Анимация параллакса для элемента
gsap.to('.parallax-element', {
  y: 500, // Смещение вверх на 100px (регулируйте по вкусу)
  opacity: 0,
  ease: "none",
  scrollTrigger: {
    trigger: '.parallax-container',
    start: 'top top', // Начинаем, когда верх контейнера совпадает с верхом окна
    end: 'bottom top', // Заканчиваем, когда низ контейнера достигает верха окна
    scrub: true // Плавное скольжение
  }
});