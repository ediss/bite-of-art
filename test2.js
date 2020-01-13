$(document).ready(function(){
    var animDuration = 1000;

    $(".klik").click(function () {
        $('#carouselExample').find('.card-body').css({ height: '0px' });
        $("#mainGallery").find('.active').next().next().nextAll().hide();
        
        $("#mainGallery").find('.active').animate({
            transition: 'all 1.2s ease-in-out',
            right : '55%',
        }, 3400);
        
        $("#mainGallery").find('.active').nextAll().animate({ left: '33.3333%'}, {
            // transition: 'all 1.2s ease-in-out',
            // left:'33.3333%',
    
            step: function(now,fx) {
                $(this).parent().css({
                    // transition: 'all 2.5s linear',
                    width: '140%',
                    'transform-origin': '0 0',
                    
                    // transform: ' scale(1.6, 1)',
                    // left: '-62%',

                  });

                  
                  

           
            },
            
            
            duration: 2500,
            
            complete: function(){
                
               $(this).parent().css({
                   transition: 'all 2.5s linear',
                'transform-origin': 'left top',
                   transform: ' scale(1.6)',
                   left: '-62%',
               });

               $("#mainGallery").find('.active').nextAll().removeClass('p-0', 1000);
                
            }
    
        }, 3400);

        

        $("#smallGallery").css({
            // right: "120%",
            display:'none'
        });
        
    
    });
    
})
        
        
        
        
        
        
        
        
        
        
        
