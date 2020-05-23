$(".carousel-controls-main .carousel-control-prev").css({
    opacity: 0,
    display: "none"
});

var first_slide = $('.news-first-slide');

var last_slide = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:last");


$(document).on('keydown',  function(event) {

    if (event.keyCode == 37) {
       //event.preventDefault();
        if (!first_slide.prev().hasClass('active')) {
            $("#carouselExample2").carousel("prev");
        }
    }

    if (event.keyCode == 39) {
        //event.preventDefault();
        if (!last_slide.prev().hasClass('active')) {
            $("#carouselExample2").carousel("next");
        }
     }
});

$(document).on("wheel", '#carouselExample2', function (e) {
    var delta = e.originalEvent.deltaY;

    if (delta > 0) {
        if (!last_slide.prev().hasClass('active')) {
            $(this).carousel("next");
        }
    }
    if (!first_slide.prev().hasClass('active')) {

        if (delta <= 0) {
            $(this).carousel("prev");
        }
    }

});

$(document).on("slide.bs.carousel", '#carouselExample2', function (e) {
    var active = $(e.relatedTarget);

    if ($(active).next().hasClass("mobile-first")) {
        $(".carousel-controls-main .carousel-control-prev").css({
            opacity: 0,
            display: "none"
        });
    } else {
        $(".carousel-controls-main .carousel-control-prev").css({
            opacity: 1,
            display: "block"
        });
    }

    if (last_slide.prev().prev().hasClass('active')) {
        $(".carousel-controls-main .carousel-control-next").css({
            opacity: 0,
            display: "none"
        });
    }
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