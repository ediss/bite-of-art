


$(document).ready(function () {
    // $('#recipeCarousel .carousel-control-prev').css({
    //     opacity: 0
    // });

    $(".img-opacity").mouseover(function (e) {
        e.preventDefault();
        $(this).find('.img-description').addClass('animation-duration fadeOutDown my-opacity');
        $(this).find('.img-description').css('opacity', '0');
    });

    $(".img-opacity").mouseout(function () {
        $(this).find('.img-description').removeClass('animation-duration fadeOutDown my-opacity').addClass('animation-duration fadeInUp');
        $(this).find('.img-description').css('opacity', '1');
    });

    $('#recipeCarousel').on('slide.bs.carousel', function (e) {

        // if($(e.relatedTarget).hasClass('first-news')) {

        //     $('#recipeCarousel .carousel-control-prev').css({
        //         opacity: 0,
        //         display : 'none'
        //       });
        // }else {
        //     $('#recipeCarousel .carousel-control-prev').css({
        //         opacity: 1,
        //         display : 'block'

        //       });
        // }


        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
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

    $('#recipeCarousel').bind('wheel', function (e) {

        var first = $("#recipeCarousel .carousel-inner-news .carousel-item-news:first");

        if (e.originalEvent.wheelDelta / 120 < 0) {

            $(this).carousel('next');

        }

        if (e.originalEvent.wheelDelta / 120 > 0) {

              $(this).carousel('prev');

          }
    });



});


