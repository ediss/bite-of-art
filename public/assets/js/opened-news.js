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

$(document).on("slide.bs.carousel", '#carouselExample2', function (e) {

    if (e.direction == "left") {
      $('.carousel-indicators').find('.active').removeClass('active').next().addClass('active');
    } else {
      $('.carousel-indicators').find('.active').removeClass('active').prev().addClass('active');
    }

  });

var ww = document.body.clientWidth;
if (ww < 990) {
    $(".mobile-hidden").remove();
    $('.mobile-first').addClass('active');
}