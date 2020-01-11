
// $('#carouselExample .card-body').css({ opacity: 0 });


// $('#carouselExample .active').css('right', '45%');

// $('#carouselExample .active ').find('.card, img').addClass('transform-img');
// $('#carouselExample .active ').next().find('.card, img').addClass('transform-img');
// $('#carouselExample .active ').next().next().find('.card, img').addClass('transform-img');



$('#carouselExample').bind('wheel', function (e) {

    if (e.originalEvent.wheelDelta / 120 < 0) {
        $(this).carousel('next');

    } else {
        $(this).carousel('prev');
    }

});

$('#carouselExample').on('slide.bs.carousel', function (e) {

    var active = $(e.relatedTarget);

    var idx = active.index();

    var itemsPerSlide = 4;
    var totalItems = $('.carousel-item-main').length;


    // $(active).css('right', '4%')
    if (idx >= totalItems - (itemsPerSlide - 1)) {


        var it = itemsPerSlide - (totalItems - idx);

        for (var i = 0; i < it; i++) {

            // append slides to end
            if (e.direction == "left") {
                $('.carousel-item-main').eq(i).appendTo('.carousel-inner-main');
            }
            else {

                $('.carousel-item-main').eq(0).appendTo('.carousel-inner-main');
            }
        }


        // $.each($('.carousel-item-main'), function () {


        //     $(this).removeClass('b-green b-red b-blue right-35 left-35');
        //     $(this).find('.card').removeClass('transform-img');

        // });

        // $('.active').next().find('img').addClass('b-red')

        // $('.carousel-inner-main').addClass('b-red')

    }

    // $('#carouselExample .active').css('right', '30%');
    // $('#carouselExample .active').next().next().css('right', '20%');
    // $('#carouselExample .active').next().css('right', '25%');

    // $('#carouselExample .active').next().next().next().css('right', '20%');

    // $('.active').next().next().addClass('transform-img')





});





