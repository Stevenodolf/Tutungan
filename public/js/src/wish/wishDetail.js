$(document).ready(function () {
    var swiper = new Swiper(".listPicture", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: false,
        touchRatio: 0.2,
    });
    var swiper2 = new Swiper(".bigPicture", {
        spaceBetween: 10,
        allowTouchMove:false,
        autoplay:{
            delay:5000,
            pauseOnMouseEnter:true,
        },
        thumbs: {
            swiper: swiper,
        },
    });

    let proBar = new ProBar({
        bgColor: "#C4C4C4",
        color:"#DE3E16",
        speed:0.2,
        wrapper:".progressBar",
        height:10,
        classNameBar : "timer",
        wrapperId : "progressBarId",
        finishAnimation : false,
        rounded : { // use it to round Corners of Probar.
            topLeft : 2,
            topRight : 2,
            bottomLeft : 2,
            bottomRight : 2
        },
        roundedInternal : { // use it to round Corners of Probar (internal).
            topLeft : 2,
            topRight : 2,
            bottomLeft : 2,
            bottomRight : 2
        }
    });

    proBar.goto(30);

})
