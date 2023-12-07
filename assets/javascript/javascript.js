// /*------------Urgent Animals-----------*/
// $(document).ready(function () {
//     var interval = 5000; // Cambia este valor para ajustar la velocidad del carrusel
//     var currentIndex = 0;
//     var items = $(".carrusel-item");

//     function showItems(startIndex) {
//         items.removeClass("active");
//         for (var i = 0; i < limit; i++) {
//             var index = (startIndex + i) % items.length;
//             items.eq(index).addClass("active");
//         }
//     }

//     function nextItems() {
//         currentIndex = (currentIndex + 1) % items.length;
//         showItems(currentIndex);
//     }

//     // Iniciar carrusel
//     var carouselInterval = setInterval(nextItems, interval);

//     // Detener carrusel al pasar el mouse sobre un elemento
//     items.hover(
//         function () {
//             clearInterval(carouselInterval);
//         },
//         function () {
//             carouselInterval = setInterval(nextItems, interval);
//         }
//     );

//     // Acción al hacer clic en un elemento
//     items.click(function () {
//         var href = $(this).data("href");
//         // Simplemente imprime la URL actualmente configurada (puedes cambiarla según tus necesidades)
//         console.log("Enlace clickeado: " + href);
//     });

//     // Mostrar los primeros elementos al cargar la página
//     showItems(currentIndex);
// });
/*--------------------------ANIMALES URGENTES--------------------------*/
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 80,
    grabCursor: true,
    loop: true,
    autoplay: {
        delay: 3000, // Intervalo de 5 segundos
        disableOnInteraction: false, // Permitir la navegación manual
    },
    speed: 800, // Ajustar la velocidad a tu preferencia
    breakpoints: {
        991: {
            slidesPerView: 3
        },
    }
});
