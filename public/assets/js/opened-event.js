$(document).ready(function () {
  var ww = document.body.clientWidth;

  var first = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:first");

  // if (first.hasClass('active')) {
  //   $('.carousel-controls-main .carousel-control-prev').css({
  //     opacity: 0
  //   });
  // }


  $(".close-gallery").click(function (e) {
    e.preventDefault();
    $("#carouselExample2").animate({
      right: "10%",

      "transform-origin": "0 0",
      transition: "right .3s linear"
    }),
      $("#carouselExample2").animate({
        left: "200%",
        "transform-origin": "0 0",
      }),

      $(this).removeClass('fadeInDown').addClass('fadeOutUp');
    setTimeout(function () {
      window.location.href = "/";
    }, 1500);
  });


  $(document).on("wheel", '#carouselExample2', function (e) {
    if (first.hasClass('active')) {
      $('.carousel-controls-main .carousel-control-prev').css({
        opacity: 0
      });
    }

    $('.gallery-first-slide').parent().removeClass('fadeInUp');

    if (e.originalEvent.wheelDelta / 120 < 0) {
      $('.carousel-controls-main .carousel-control-prev').css({
        opacity: 1
      });
      $(this).carousel('next');

    }

    if (e.originalEvent.wheelDelta / 120 > 0) {
      if (!first.hasClass('active')) {
        $(this).carousel('prev');
      }
    }
  });




  $(document).on("slide.bs.carousel", '#carouselExample2', function (e) {
    var active = $(e.relatedTarget);

    if (e.direction == "left") {
      $('.carousel-indicators').find('.active').removeClass('active').next().addClass('active');
      $('.carousel-controls-main .carousel-control-prev').css({
        opacity: 1
      });

    } else {
      $('.carousel-indicators').find('.active').removeClass('active').prev().addClass('active');
    }

    if (ww < 990) {
      if (active.hasClass('active')) {
        $('.carousel-controls-main .carousel-control-prev').css({
          opacity: 0
        });
      }
    }else {
      
      if (active.hasClass("mobile-hidden") ) {
        
        $('.carousel-controls-main .carousel-control-prev').css({
          opacity: 0
        });
      }
    }
    



    if ($("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:last").prev().hasClass('active')) {
      var next = $('.next-id').attr('next-id');

      setTimeout(function () {
        window.location.href = "/event/" + next;
      }, 1000);

    }

  });
  var vr_height = $(".virtual-toure").parent().parent().parent().height();

  $(".virtual-toure").height(vr_height);
  if (ww < 990) {
    $(".mobile-hidden").remove();
    $('.mobile-first').addClass('active');

    
  }
});
