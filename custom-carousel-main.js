
        $('#carouselExample .card-body').css({ opacity: 0 });


        $('#carouselExample .active').next().mouseover(
            function () {
                $(this).find('.card-body').css('opacity', '1').removeClass('fadeOutDown  animation-duration').addClass('animation-duration fadeInUp');
            }
        );

        $('#carouselExample .active').next().mouseout(
            function () {
                $(this).find(".card-body").css('opacity', '0').removeClass('animation-duration fadeInUp').addClass('animation-duration fadeOutDown ');
            }
        );


        $('#carouselExample').bind('wheel', function (e) {

            if (e.originalEvent.wheelDelta / 120 < 0) {
                $(this).carousel('next');
            } else {
                $(this).carousel('prev');
            }

        });

        $('.carousel-item img').bind('click',function(e){
            var alt = e.target.alt.replace(' ','_');
            window.open(window.location.origin+'/'+alt+'.html','_self');
        })

        $('#carouselExample').on('slide.bs.carousel', function (e) {

            var active = $(e.relatedTarget);

            var idx = active.index();

            var itemsPerSlide = 4;
            var totalItems = $('.carousel-item-main').length;


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
            }


            $.each($('.carousel-item-main'), function(key,val){
                
                $(val).mouseover(function () {
                    $(this).find('.card-body').css('opacity', '0').removeClass('animation-duration fadeInUp');
                });
                $(val).mouseout(function () {
                    $(this).find(".card-body").css('opacity', '0').removeClass('animation-duration fadeOutDown');
                });
            });

            $(active.next()).mouseover(function () {
                $(this).find('.card-body').css('opacity', '1').removeClass('fadeOutDown').addClass('animation-duration fadeInUp');
            });
            $((active).next()).mouseout(function () {
                $(this).find(".card-body").css('opacity', '0').removeClass('animation-duration fadeInUp').addClass('animation-duration fadeOutDown');
            });

           
        });



       