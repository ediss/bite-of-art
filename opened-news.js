$(document).ready(function() {

    /*opening news*/
  $(".img-opacity").click(function() {
    openNav();

    setTimeout(function() {
      $(".logo").animate({
        transition: "top 4.4s ease-in-out",
        top: "-100px"
      });

      $(".live").css("visibility", "hidden");
      $(".close-gallery")
        .removeClass("d-none")
        .addClass(" animation-duration2 fadeInDown");

      $(".news-first-slide")
        .removeClass("d-none")
        .addClass("animation-duration2 fadeInUp");
      $("#carouselExample3")
        .find(".carousel-controls-main")
        .removeClass("d-none")
        .addClass("animation-duration2 fadeInUp");
      $(".first-image")
        .removeClass("d-none")
        .addClass("animation-duration2 bounceInRight");
    }, 1500);
  });



  var count = $("#carouselExample3 .carousel-inner-gallery").children().length;
  var firstSrc = $(
      "#carouselExample3 .carousel-inner-gallery .carousel-item-gallery:first-child img"
    ).attr("src"),
    lastSrc = $(
      "#carouselExample3 .carousel-inner-gallery .carousel-item-gallery:nth-child(" +
        (count - 1) +
        ") img"
    ).attr("src");

  function showHideButtons() {
    setTimeout(function() {
      if ($("#carouselExample3 .active img").attr("src") == lastSrc) {
        $(".carousel-controls-main .carousel-control-next").css({
          opacity: 0,
          "pointer-events": "none"
        });
      } else {
        $(".carousel-controls-main .carousel-control-next").css({
          opacity: 1,
          "pointer-events": "auto"
        });
      }
      if ($("#carouselExample3 .active img").attr("src") == firstSrc) {
        $(".carousel-controls-main .carousel-control-prev").css({
          opacity: 0,
          "pointer-events": "none"
        });
      } else {
        $(".carousel-controls-main .carousel-control-prev").css({
          opacity: 1,
          "pointer-events": "auto"
        });
      }
    }, 700);
  }

  $(
    ".carousel-controls-main .carousel-control-prev,.carousel-controls-main .carousel-control-next"
  ).bind("click", function(e) {
    showHideButtons();
  });

  $("#carouselExample3").bind("wheel", function(e) {
    $('.news-first-slide').removeClass('fadeInUp');
    $(".first-image").removeClass("animation-duration2 bounceInRight");

    
    if ($("#carouselExample3 .active img").attr("src") != lastSrc) {
      if (e.originalEvent.wheelDelta / 120 < 0) {
        $(this).carousel("next");
      }
    }
    if ($("#carouselExample3 .active img").attr("src") != firstSrc) {
      if (e.originalEvent.wheelDelta / 120 > 0) {
        $(this).carousel("prev");
      }
    }
    showHideButtons();
  });
});
