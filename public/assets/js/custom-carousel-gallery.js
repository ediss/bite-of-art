$(document).ready(function () {

  $("#carouselExample2 .carousel-controls-main .carousel-control-prev").css({
    opacity: 0
  });


  $(".close-gallery").click(function (e) {
    e.preventDefault();
    $("#carouselExample2, #carouselExample3").animate({
      right: "10%",

      "transform-origin": "0 0",
      transition: "right .3s linear"
    }),
      $("#carouselExample2, #carouselExample3").animate({
        left: "200%",
        "transform-origin": "0 0",
      }),

      $(this).removeClass('fadeInDown').addClass('fadeOutUp');
    setTimeout(function () {
      window.location.href = "/";
    }, 1500);
  });


  $(document).on("wheel", '#carouselExample2', function (e) {

    $('.gallery-first-slide').parent().removeClass('fadeInUp');


    if (e.originalEvent.wheelDelta / 120 < 0) {
      $(this).carousel("next");
    }

    if (e.originalEvent.wheelDelta / 120 > 0) {
      $(this).carousel("prev");
    }
  });




  $(document).on("slide.bs.carousel", '#carouselExample2', function (e) {

    if (e.direction == "left") {
      $('.carousel-indicators').find('.active').removeClass('active').next().addClass('active');
    } else {
      $('.carousel-indicators').find('.active').removeClass('active').prev().addClass('active');
    }

    if ($("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:last").prev().hasClass('active')) {
      var next = $('.next-id').attr('next-id');
      window.location.href = "/event/" + next;
    }

  });
});
