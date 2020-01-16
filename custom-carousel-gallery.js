$("#carouselExample2 .carousel-controls-main .carousel-control-prev").css({
  opacity: 0
});

$(".close-gallery").click(function(e) {
  e.preventDefault();
  $("#carouselExample2").animate({
    right: "10%",

    "transform-origin": "0 0",
    transition: "right .3s linear"
  }),
    $("#carouselExample2").animate({
      left: "200%",
      "transform-origin": "0 0",
    //   transition: "left 0.5s linear",
    //   'transition-duration': '5s'

    }),

    $(this).removeClass('fadeInDown').addClass('fadeOutUp');
    setTimeout(function() {
      window.location.href = "index.html";
    }, 1500);
});

$(document).ready(function() {
  var count = $("#carouselExample2 .carousel-inner-gallery").children().length;
  var firstSrc = $(
      "#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:first-child img"
    ).attr("src"),
    lastSrc = $(
      "#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:nth-child(" +
        (count - 1) +
        ") img"
    ).attr("src");

  function showHideButtons() {
    setTimeout(function() {
      if ($("#carouselExample2 .active img").attr("src") == lastSrc) {
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
      if ($("#carouselExample2 .active img").attr("src") == firstSrc) {
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

  $("#carouselExample2").bind("wheel", function(e) {
    $('.gallery-first-slide').parent().removeClass('fadeInUp');
    if ($("#carouselExample2 .active img").attr("src") != lastSrc) {
      if (e.originalEvent.wheelDelta / 120 < 0) {
        
        $(this).carousel("next");
      }
    }
    if ($("#carouselExample2 .active img").attr("src") != firstSrc) {
      if (e.originalEvent.wheelDelta / 120 > 0) {
        $(this).carousel("prev");
        
      }
    }
    showHideButtons();
  });
});
