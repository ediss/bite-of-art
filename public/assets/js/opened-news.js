$(document).on("wheel", '#carouselExample2', function (e) {

    var first_slide = $('.news-first-slide');

    var last_slide = $('.carousel-inner-gallery .carousel-item-gallery:last');

    if (e.originalEvent.wheelDelta / 120 < 0) {
        if (!last_slide.prev().hasClass('active')) {
            $(this).carousel("next");
        }
    }

    if (!first_slide.prev().hasClass('active')) {
        if (e.originalEvent.wheelDelta / 120 > 0) {
            $(this).carousel("prev");
        }
    }
});

var ww = document.body.clientWidth;
if (ww < 990) {
    $(".mobile-hidden").remove();
    $('.mobile-first').addClass('active');
}