
    $(".about-europe").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });

    $(".about-bum").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });

    $(".about-tripovej").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });

    $(".about-zmaji").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });


    $(".about-blackslash").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });


    $(".about-colormedia").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });

    $(".about-connect").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });

    $(".about-kcb").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });

    $(".about-valencia").mouseover(function () {
        $(this).attr('src', $(this).data("hover"));
    }).mouseout(function () {
        $(this).attr('src', $(this).data("src"));
    });


    var first = $(
        "#myCarouselExampleIndicators .carousel-inner .carousel-item:first"
    );

    var last = $(
        "#myCarouselExampleIndicators .carousel-inner .carousel-item:last"
    );

    if (first.hasClass("active")) {
        $(".carousel-controls-main .carousel-control-prev").css({
            opacity: 0,
            display: "none"
        });
    }



    $(document).on("wheel", "#myCarouselExampleIndicators", function(e) {
        $(".carousel-item:first")
            .removeClass("fadeInUp");

        if (e.originalEvent.wheelDelta / 120 < 0 && (!last.hasClass('active'))) {
            $(this).carousel("next");
        }

        if (e.originalEvent.wheelDelta / 120 > 0) {
            if (!first.hasClass("active")) {
                $(this).carousel("prev");
            }
        }
    });

    $(document).on("slide.bs.carousel", "#myCarouselExampleIndicators", function(e) {
        var active = $(e.relatedTarget);

        if ($(active).hasClass("about-first")) {
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


        if ($(active).hasClass("about-last")) {
            $(".carousel-controls-main .carousel-control-next").css({
                opacity: 0,
                display: "none"
            });
        }else {
            $(".carousel-controls-main .carousel-control-next").css({
                opacity: 1,
                display: "block"
            });
        }

        if (e.direction == "left") {
            $(".carousel-indicators").find(".active").removeClass("active").next().addClass("active");
            
        } else {
            $(".carousel-indicators").find(".active").removeClass("active").prev().addClass("active");
        }
    });