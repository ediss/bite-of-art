function goToSlide(number) {
    int_number = parseInt(number);
   $("#carouselExample2").carousel(int_number-1);

}
$(document).ready(function() {
    var ww = document.body.clientWidth;
    var route = $(".next-id").attr("data-route");

    var number = window.location.hash.replace(/^\D+/g, '');//Get the number

    if(number != "") {
        var url = document.location.toString();

        if (url.match('#')) {
            // Clear active item
            $('#carouselExample2 .carousel-item.active').removeClass('active');
            $('#event-news .carousel-indicators').find("li").removeClass('active');
            $('#event-news .carousel-indicators[data-slide-to="0"]').removeClass('active');

            // Activate item number #hash
            var index = url.split('#')[1];

            $('#carouselExample2 .carousel-item[data-slide-id="' + index + '"]').addClass('active');
            $('*[data-slide-to="'+index+ '"]').addClass('active');
            $('#carouselExample2 .carousel-indicators[data-slide-to="' + index + '"]').addClass('active');
        }
    }
    var first_slide2 = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery").first();
    var last_slide = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:last");

    var first = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:first");

    if (first.hasClass("active")) {
        $(".carousel-controls-main .carousel-control-prev").css({
            opacity: 0,
            display: "none"
        });
    }
    $(".close-gallery").click(function(e) {
        e.preventDefault();
        $("#carouselExample2").animate({
            right: "10%",

            "transform-origin": "0 0",
            transition: "right .3s linear"
        }),
            $("#carouselExample2").animate({
                left: "200%",
                "transform-origin": "0 0"
            }),
            $(this)
                .removeClass("fadeInDown")
                .addClass("fadeOutUp");
        setTimeout(function() {
            window.location.href = "/";
        }, 1500);
    });

    $(document).on('keydown',  function(event) {

        if (event.keyCode == 37) {
           //event.preventDefault();
           if (!first_slide2.hasClass('active')) {
                $("#carouselExample2").carousel("prev");
            }
        }
    
        if (event.keyCode == 39) {
            //event.preventDefault();
            if ((!last_slide.is('.active') && first_slide2.is('.mobile-first')) || (!last_slide.prev().is('.active') && first_slide2.is('.mobile-hidden')) ) {
                $("#carouselExample2").carousel("next");
            }
         }
    });

    $(document).on('wheel',"#carouselExample2", function(e) {

        var delta = e.originalEvent.deltaY;

        $(".gallery-first-slide")
        .parent()
        .removeClass("fadeInUp");

        if (delta > 0) {
            $(this).carousel("next");

        }
        else {
            if (!first.hasClass("active")) {
                $(this).carousel("prev");
            }
        }

        return false;
      });


    $(document).on("slide.bs.carousel", "#carouselExample2", function(e) {

        var active = $(e.relatedTarget);
        var slide_id = active.next().attr("data-slide-id");
        slide_id = slide_id -1;
        if(slide_id != "1") {
            window.history.pushState('state', 'Title', '#'+slide_id);
        }else {
            window.history.pushState('state', 'Title', '#');
        }
        if ($(active).next().hasClass("mobile-first")) {
            $(".carousel-controls-main .carousel-control-prev").css({
                opacity: 0,
                display: "none"
            });
        } else {
            $(".carousel-controls-main .carousel-control-prev").css({
                opacity: 1,
                display: "block"
            });
        }

        if (e.direction == "left") {
            $(".carousel-indicators").find(".active").removeClass("active").next().addClass("active");

        } else {
            $(".carousel-indicators").find(".active").removeClass("active").prev().addClass("active");
        }

        if (ww < 990) {
            if (active.hasClass("mobile-first")) {
                $(".carousel-controls-main .carousel-control-prev").css({
                    opacity: 0,
                    display: "none"
                });
            }

            if ($("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:last").hasClass("active") &&e.direction == "left") {
              var next = $(".next-id").attr("next-id");

              window.location.href = route;
            }
        }

        if ($("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:last").prev().hasClass("active") &&e.direction == "left") {
            var next = $(".next-id").attr("next-id");

            setTimeout(function() {
                window.location.href = route;
            }, 1000);

        }


    });
    var vr_height = $("#event_cover").height();



    $(".virtual-toure").height(vr_height);

    if (ww < 990) {
        $(".mobile-hidden").remove();
        $(".mobile-first").addClass("active");
        var vr_height = $("#event_cover").height();

        $(".virtual-toure").height(vr_height);
    }
});


