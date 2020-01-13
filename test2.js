$(document).ready(function(){
    var animDuration = 1000;

    $("#mainGallery").on( 'click', '.klik', (function () {
        
        $("#mainGallery").find('.active').next().next().nextAll().hide();
        
        $("#smallGallery").fadeOut('slow');
        
        $('#carouselExample').find('.card-body').animate({ 
            // transition: 'all 2s ease-in-out',
            opacity: '0' ,
        }, 1000);
        
        $("#mainGallery").find('.active').animate({
            transition: 'all .2s ease-in-out',
            right : '31%',
        }, 2400);
        
        $("#mainGallery").find('.active').nextAll().animate({ left: '33.3333%'}, {
            // transition: 'all 1.2s ease-in-out',
            // left:'33.3333%',
    
            step: function(now,fx) {
                $(this).parent().css({
                    // transition: 'all 2.5s linear',
                    // width: '140%',
                    'transform-origin': '0 0',
                    
                    // transform: ' scale(1.6, 1)',
                    // left: '-62%',

                  });

                  
                  

           
            },
            
            
            duration: 2500,
            
            complete: function(){
                
               $(this).parent().css({

                transition: 'all .9s linear',
                'transform-origin': 'left top',
                transform: ' scale(1.6)',
                width: '140%',
                left: '-62%',
               });

               $('#carouselExample').find('.card-body').animate({ 
                // transition: 'all 2s ease-in-out',
                height: '0px' ,
            }, 1000);

               $("#mainGallery").find('.active').nextAll().removeClass('p-0', 1000);
               
            }
    
        }, 3400);    

        // $("#smallGallery").css({
        //     // right: "120%",
        //     display:'none'
        // });
        
    
    }));
    
})
        
        
        
        
        
        
        
        
        
        
        
