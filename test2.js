$(document).ready(function() {
  var animDuration = 1000;

  $("#mainGallery").on("click", ".klik", function() {
 

    $("#smallGallery").fadeOut("slow");

    $("#carouselExample")
      .find(".card-body")
      .animate(
        {
          transition: "all 2s ease-in-out",
          height: "0px"
        },
        1500
      );

    $("#carouselExample").find(".active").animate({
          transition: "right 3s ease-in-out",
          // border : '2px solid red'
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
            //   "transform-origin": "0 0",
              transition: "transform 2.5s ease-in-out",
          });

          $(this)
          .find(".p-0")
          .removeClass("p-0");

        
        },
        duration: 2000,

        complete: function() {
          console.log("gotova");

   
          
           
          
            $("#mainGallery")
          .find(".active")
          .next()
          .nextAll()
          .css({ visibility: "hidden" });
        }
      }
    );
  });
});
