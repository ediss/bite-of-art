$("#carouselExample2 .carousel-controls-main .carousel-control-prev").css({
    opacity: 0
  });

  $("#carouselExample3 .carousel-controls-main .carousel-control-prev").css({
    opacity: 0
  });

  $(".close-gallery").click(function(e) {
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
      setTimeout(function() {
        window.location.href = "/";
      }, 1500);
  });



  var count = $("#carouselExample2 .carousel-inner-gallery").children().length;
  var firstSrc = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:first-child img").attr("src"),
       lastSrc = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:nth-child(" + (count - 1) + ") img").attr("src");



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

    $(document).on("wheel", '#carouselExample2', function(e) {

      var next = $('.next-id').attr('next-id');


      var count = $("#carouselExample2 .carousel-inner-gallery").children().length;
      var firstSrc = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:first-child img").attr("src"),
      lastSrc = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:nth-child(" + (count -1 ) + ") img").attr("src");

      $('.gallery-first-slide').parent().removeClass('fadeInUp');
      if ($("#carouselExample2 .active img").attr("src") != lastSrc) {
        if (e.originalEvent.wheelDelta / 120 < 0) {
          $(this).carousel("next");
        }
      } else {
        if (e.originalEvent.wheelDelta / 120 < 0) {

          $.ajax({

            type:'POST',
              url:'/event',
              // url:"{{ url('/event/{id?}') }}",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data : { id : next },
              success:function(data) {
                $('#carouselExample2').remove('.carousel-inner-gallery');
                $('#carouselExample2').html(data.html);

                  $('#carouselExample2').replaceWith($('#carouselExample2'));
               }
            });
        }


      }
      if ($("#carouselExample2 .active img").attr("src") != firstSrc) {
        if (e.originalEvent.wheelDelta / 120 > 0) {

          $(this).carousel("prev");

        }
      } else{
        $( '.carousel-indicators' ).find( '.active' ).addClass( 'active' );
      }
      showHideButtons();
    });


    $("#carouselExample2").on("slide.bs.carousel", function(e) {

      if (e.direction == "left") {
        $( '.carousel-indicators' ).find( '.active' ).removeClass( 'active' ).next().addClass( 'active' );
      }else {
        $( '.carousel-indicators' ).find( '.active' ).removeClass( 'active' ).prev().addClass( 'active' );
      }

    });