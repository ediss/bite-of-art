$(document).ready(function() {
    var ww = document.body.clientWidth;

    var first = $(
        "#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:first"
    );

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

    $(document).on("wheel", "#carouselExample2", function(e) {
        $(".gallery-first-slide")
            .parent()
            .removeClass("fadeInUp");

        if (e.originalEvent.wheelDelta / 120 < 0) {
            $(this).carousel("next");
        }

        if (e.originalEvent.wheelDelta / 120 > 0) {
            if (!first.hasClass("active")) {
                $(this).carousel("prev");
            }
        }
    });

    $(document).on("slide.bs.carousel", "#carouselExample2", function(e) {
        var active = $(e.relatedTarget);

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
              window.location.href = "/event/" + next;
          }
        } 

        if ($("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:last").prev().hasClass("active") &&e.direction == "left") {
            var next = $(".next-id").attr("next-id");

            setTimeout(function() {
                window.location.href = "/event/" + next;
            }, 1000);
        }

    
    });
    var vr_height = $(".carousel-inner-gallery").height();

    $(".virtual-toure").height(vr_height);

    if (ww < 990) {
        $(".mobile-hidden").remove();
        $(".mobile-first").addClass("active");
        var vr_height = $(".carousel-inner-gallery").height();

        $(".virtual-toure").height(vr_height);
    }
});
