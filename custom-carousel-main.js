
        $('#carouselExample .card-body').css({ opacity: 0 });


        $(".klik").click(function () {

            /*mainGallery*/
            $("#mainGallery").find('.active').animate({
                
                transition: 'all 1.2s ease-in-out',
                // transform: 'scale(1.5)',
                // right : '55%'
            },
            {
                step: function(go) {
               
console.log('rad');
                    // $(this).find()
                  $(this).parent().css({
                    'transition': 'all 2.2s ease-in-out',
                    
                    'transform-origin': '0 0',
                    // width: '140%',
                    // left: '-62%',
                    transform: 'matrix(1.5, 0, 0, 1.5, 450, 0)'
                    // transform: 'matrix(1, 0, 0, 1.5, 1101, 143)'
                    // transform: 'scale(1.6)'

                  });

            //       $(this).find('active').animate({
            //           right: '25%'
            //       }, 2400)
                
            //       $(this).addClass('w-140').removeClass('w-120')

            //       $.each($('.carousel-item-main'), function(key,val) {
            //         $(this).removeClass('p-0');
            //   });
                  
                },
                duration: 2200,
                // complete: function(){ alert('done') }
            });

            // $("#mainGallery").find('.active').parent().addClass('transform-img');
            // $("#mainGallery").find('.active').nextAll().animate({
            //     left:'20%'

            // });
        

            /*smallGallery*/
            $("#smallGallery").css({
                // right: "120%",
                display:'none'
            });



        


        });



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

        // $('.carousel-item img').bind('click',function(e){
        //    // var alt = e.target.alt.replace(' ','_');
        //     // window.open(window.location.origin+'/'+alt+'.html','_self');



        // })

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



