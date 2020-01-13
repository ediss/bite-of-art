$(document).ready(function(){
    var animDuration = 1000;

    $("#mainGallery").on( 'click', '.klik', (function () {
        
        $("#mainGallery").find('.active').next().nextAll().css({visibility: 'hidden'});
        
        $("#smallGallery").fadeOut('slow');
        
        $('#carouselExample').find('.card-body').animate({ 
            transition: 'all 2s ease-in-out',
            height: '0px' ,
        }, 1500);
        
        // $("#carouselExample").find('.active').animate({ right: '35%'}, {
        //     step : function(v) {
        //         $(this).css({
        //             transition: 'all 2s ease-in-out',
        //             // border : '2px solid red'
        //             visibility : 'hidden',
        //         })
        //     }
        // },2400);

        $("#carouselExample .carousel-inner-main").animate({ opacity:1
  
        },
        {
            step : function() {
                
                $(this).find('.active').animate({
                    transition: 'all 2s ease-in-out',
                    border : '2px solid red',
                    // visibility : 'hidden',

                    right: '50vw',

                    visibility : 'hidden',
                });


                $(this).css({
                    transition: 'all 1.9s ease-in-out',
                    
                    // visibility : 'hidden',          width: '140%',
            // 'transform-origin': '0 0',
            transform: 'scale(1.6) translate3d(29%, 90px, 0)',
            width: '140%'

                    
                });

                $(this).find('.p-0').removeClass('p-0');
            },
            duration : 2000,

            complete: function() {
                console.log('gotova');
            }
        });

            
        
        
 
        
    
    }));
    
})
        
        
        
        
        
        
        
        
        
        
        
