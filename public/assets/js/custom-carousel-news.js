$('#recipeCarousel').on('slide.bs.carousel', function (e) {


    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 2;
    var totalItems = $('.carousel-item-news').length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i = 0; i < it; i++) {
            // append slides to end
            if (e.direction == "left") {
                $('.carousel-item-news').eq(i).appendTo('.carousel-inner-news');
            } else {
                $('.carousel-item-news').eq(0).appendTo('.carousel-inner-news');
            }


        }
    }
});


$(document).ready(function () {


    $(".img-opacity").mouseover(function (e) {
        e.preventDefault();
        $(this).next('.img-description').addClass('animation-duration fadeOutDown my-opacity');
    });

    $(".img-opacity").mouseout(function () {
        $(this).next('.img-description').removeClass('animation-duration fadeOutDown my-opacity').addClass('animation-duration fadeInUp');
    });

    $('#recipeCarousel').bind('wheel', function (e) {


        var last = $("#recipeCarousel .carousel-inner-news .carousel-item-news:last");
        var first = $("#recipeCarousel .carousel-inner-news .carousel-item-news:first");

        if (e.originalEvent.wheelDelta / 120 < 0) {
            $('#recipeCarousel .carousel-control-prev').css({
                opacity: 1
            });
            $(this).carousel('next');

        }

        if (e.originalEvent.wheelDelta / 120 > 0) {
            if (!first.hasClass('active')) {
              $(this).carousel('prev');
            }
          }
    });



});


