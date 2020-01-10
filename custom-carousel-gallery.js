//  $('.carousel-item-main').css('visibility', 'hidden');


if($('.carousel-item-main.active').find('.galleryOpened-card') ) {
    
    console.log($(this))
    
    // $('.carousel-item-main.active').css('left', '300px');
    // $(this).find('.active').next().css('display', 'none');
    // $(this).find('.active').css('display', 'none');
}

 $('.carousel-item-main.active').css('visibility', 'visible');


 $('.carousel-item-main.active').css( {
    'position': 'absolute',
    'right' : '93%',

    

 });

//  $('.carousel-item-main').css('position', 'relative');
 $('.carousel-item-main.active').next().css( {
    'position': 'relative',
    // 'right' : '93%'
    'border': '2px solid green'

 });


 $('.carousel-item-main.active').next().next().css( {
    'position': 'absolute',
    'left' : '75%',

    'border': '2px solid yellow'

 });


 $('.carousel-item-main.active').next().next().next().css( {
    'position': 'absolute',
    'left' : '75%',

    'border': '2px solid black'

 });

 $('.carousel-item-main.active').next().next().css('visibility', 'visible');


 
 
//  $('.carousel-item-main.active').next().next().css('visibility', 'visible');
 
 
 $('#carouselExample').on('slide.bs.carousel', function (e) {

            /*
            
            CC 2.0 License Iatek LLC 2018
            Attribution required
            
            */

           var active = $(e.relatedTarget);


            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 2;
            var totalItems = $('.carousel-item-main').length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $('.carousel-item-main').eq(i).appendTo('.carousel-inner-main');
                    } else {
                        $('.carousel-item-main').eq(0).appendTo('.carousel-inner-main');
                    }


                }
            }

            $.each($('.carousel-item-main'), function(key,val){
                
                $(val).css( {
                    'position': 'absolute',
                    'left' : 'inherit'
                })
                    // $(this).css
                
                
            });

            
       //reset


            //
            $('.carousel-item-main.active').css( {
                'position': 'relative',
                'border': '6px solid black'
                
            
                
            
             });
            
            //  $('.carousel-item-main').css('position', 'relative');
             $('.carousel-item-main.active').next().css( {
                'position': 'relative',
                'right' : '73%',
                'border': '5px solid green'
            
             });
            
            
             $('.carousel-item-main.active').next().next().css( {
                'position': 'absolute',
                'left' : '0',
            
                'border': '2px solid yellow'
            
             });

             $(active).next().next().next().css( {
                // 'position': 'relative',
                'left':'0'
                
            
                
            
             });
            
            
          
            $(active.next()).mouseover(function () {
                $(this).find('.card-body').css('opacity', '1').removeClass('fadeOutDown').addClass('animation-duration fadeInUp');
            });
            $((active).next()).mouseout(function () {
                $(this).find(".card-body").css('opacity', '0').removeClass('animation-duration fadeInUp').addClass('animation-duration fadeOutDown');
            });
        });

        $('.carousel-controls .carousel-control-prev').css({
            opacity: 0
        });
        $(document).ready(function () {
            var count = $('#carouselExample .carousel-inner-main').children().length
            var firstSrc = $('#carouselExample .carousel-inner-main .carousel-item-main:first-child img').attr('src'),
                lastSrc = $('#carouselExample .carousel-inner-main .carousel-item-main:nth-child(' + (count - 4) + ') img').attr('src');



            function showHideButtons() {
                setTimeout(function () {
                    if ($('#openedGallery .active img').attr('src') == lastSrc) {
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
                    if ($('#openedGallery .active img').attr('src') == firstSrc) {
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



            $('.carousel-controls .carousel-control-prev,.carousel-controls .carousel-control-next').bind(
                'click',
                function (e) {
                    showHideButtons()
                })

            $('#carouselExample').bind('wheel', function (e) {
                if ($('#openedGallery .active img').attr('src') != lastSrc) {
                    if (e.originalEvent.wheelDelta / 120 < 0) {
                        $(this).carousel('next');
                    }
                }
                if ($('#openedGallery .active img').attr('src') != firstSrc) {
                    if (e.originalEvent.wheelDelta / 120 > 0) {
                        $(this).carousel('prev');
                    }
                }
                showHideButtons()
            });



        });


    