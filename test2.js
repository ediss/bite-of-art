$(document).ready(function() {

  $("#mainGallery").on("click", ".klik", function() {
 
    $('.logo').animate( {        
        transition: "top 4.4s ease-in-out",
        'top' : '-100px',
    });

    $('.live').css('visibility', 'hidden');

    $('#carouselExample .carousel-controls-main').hide();
    


    $("#smallGallery").fadeOut("slow");

    $("#carouselExample")
      .find(".card-body")
      .animate(
        {
          transition: "height 1.4s ease-in-out",
          height: "0px"
        },
        {
            step:function() {
                $(this).animate({
                    transition: "visibility 1s ease-in-out",
                    'visibility' : 'hidden'
                });
            }
        }
      );

    $("#carouselExample").find(".active").animate({
          transition: "right 3s ease-in-out",
          right: "35%"
        },2000
    );

    $("#carouselExample .carousel-inner-main").animate(
      { opacity: 1 },
      {
        step: function() {


          $(this).css({
            "transform-origin": "0 0",
            transition: "transform 1.9s ease-in-out, width 1.9s ease-in-out",
            transform: "scale(1.6) translate3d(0, 0, 0)",
            width: "140%"
          });

          $(this)
          .find(".active")
          .next().next().animate({
            left : '33%',
            "transform-origin": "0 0",
            transition: "transform .1s ease-in-out",
          });

          $(this)
          .find(".active")
          .next()
          .find("img")
          .css({
              "transform": "translate3d(31.5%, 0, 0)",
              transition: "transform 2.5s ease-in-out",
          });

          $(this)
          .find(".p-0")
          .removeClass("p-0");

        
        },
        duration: 3000,

        complete: function() {

          $('#carouselExample').replaceWith($('#carouselExample2'));
          $('#carouselExample2').css('display', 'block');
          $('.close-gallery').removeClass('d-none').addClass('d-block animation-duration2 fadeInDown');
          $('.page-footer').hide();

          
          
        }
      }
    );
  });
});
