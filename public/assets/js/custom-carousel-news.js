 $('#recipeCarousel').on('slide.bs.carousel', function (e) {

            /*
            
            CC 2.0 License Iatek LLC 2018
            Attribution required
            
            */

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

        $('.carousel-controls .carousel-control-prev').css({
            opacity: 0
        });
        $(document).ready(function () {
            var count = $('#recipeCarousel .carousel-inner').children().length
            var firstSrc = $('#recipeCarousel .carousel-inner .carousel-item:first-child img').attr('src'),
                lastSrc = $('#recipeCarousel .carousel-inner .carousel-item:nth-child(' + (count - 1) + ') img').attr('src');



            function showHideButtons() {
                setTimeout(function () {
                    if ($('#smallGallery .active img').attr('src') == lastSrc) {
                        $('.carousel-controls .carousel-control-next').css({
                            opacity: 0,
                            'pointer-events': 'none'
                        });
                    } else {
                        $('.carousel-controls .carousel-control-next').css({
                            opacity: 1,
                            'pointer-events': 'auto'
                        });
                    }
                    if ($('#smallGallery .active img').attr('src') == firstSrc) {
                        $('.carousel-controls .carousel-control-prev').css({
                            opacity: 0,
                            'pointer-events': 'none'
                        });
                    } else {
                        $('.carousel-controls .carousel-control-prev').css({
                            opacity: 1,
                            'pointer-events': 'auto'
                        });
                    }
                }, 700)
            }


            $('#recipeCarousel').bind('wheel', function (e) {
                if ($('#smallGallery .active img').attr('src') != lastSrc) {
                    if (e.originalEvent.wheelDelta / 120 < 0) {
                        $(this).carousel('next');
                    }
                }
                if ($('#smallGallery .active img').attr('src') != firstSrc) {
                    if (e.originalEvent.wheelDelta / 120 > 0) {
                        $(this).carousel('prev');
                    }
                }
                showHideButtons()
            });



        });


    