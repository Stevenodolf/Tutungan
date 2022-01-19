$(document).ready(function () {

    // console.log(wishDetail.deadline);
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
        // bgColor: "#C4C4C4",
        // color:"#DE3E16",
        bgColor: "#FFF09E",
        color: "#D5B81B",
        speed:0.2,
        wrapper:".progressBar",
        height:10,
        classNameBar : "timer",
        wrapperId : "progressBarId",
        finishAnimation : false,
        rounded : { // use it to round Corners of Probar.
            topLeft : 5,
            topRight : 5,
            bottomLeft : 5,
            bottomRight : 5
        },
        roundedInternal : { // use it to round Corners of Probar (internal).
            topLeft : 5,
            topRight : 5,
            bottomLeft : 5,
            bottomRight : 5
        }
    });

    proBar.goto(50);
})

function setupTickCountDown(tick) {

    var locale = {
        YEAR_PLURAL: 'Tahun',
        YEAR_SINGULAR: 'Tahun',
        MONTH_PLURAL: 'Bulan',
        MONTH_SINGULAR: 'Bulan',
        WEEK_PLURAL: 'Minggu',
        WEEK_SINGULAR: 'Minggu',
        DAY_PLURAL: 'Hari',
        DAY_SINGULAR: 'Hari',
        HOUR_PLURAL: 'Jam',
        HOUR_SINGULAR: 'Jam',
        MINUTE_PLURAL: 'Menit',
        MINUTE_SINGULAR: 'Menit',
        SECOND_PLURAL: 'Detik',
        SECOND_SINGULAR: 'Detik',
        MILLISECOND_PLURAL: 'Milidetik',
        MILLISECOND_SINGULAR: 'Milidetik'
    };

    for (var key in locale) {
        if (!locale.hasOwnProperty(key)) { continue; }
        tick.setConstant(key, locale[key]);
    }

    // var deadline = Tick.helper.date('2022-02-09T12:00:00');
    wishDetail.deadline = wishDetail.deadline.replace(/\s/g, 'T');
    var deadline = Tick.helper.date(wishDetail.deadline);

    // console.log(wishDetail.deadline)
    var counter = Tick.count.down(deadline);


    counter.onupdate = function(value) {
        tick.value = value;
    };

    counter.onended = function() {

    };

}
