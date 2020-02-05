
    
    function showHideButtons(div) {
// console.log(div + " .carousel-inner-gallery");
    var count = $(div + " .carousel-inner-gallery").children().length;

    var firstSrc = $(div + " .carousel-inner-gallery .carousel-item-gallery:first-child img").attr("src"),
        lastSrc = $(div + " .carousel-inner-gallery .carousel-item-gallery:nth-child(" + (count - 1) +") img").attr("src");
        setTimeout(function() {
            if ($(div + " .active img").attr("src") == lastSrc) {
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
            if ($(div + " .active img").attr("src") == firstSrc) {
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

    function wheel(div) {
        var count2 = $(this).find("#carouselExample2 .carousel-inner-gallery").children().length;
        var count = $("#carouselExample2 .carousel-inner-gallery").children().length;

        console.log(count);

    var firstSrc = $(div + " .carousel-inner-gallery .carousel-item-gallery:first-child img").attr("src"),
        lastSrc = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:nth-child(" + (count - 1) +") img").attr("src");

        console.log(firstSrc);
        
        $("#carouselExample2").bind("wheel", function(e) {
            $(".news-first-slide").removeClass("fadeInUp");
            $(".first-image").removeClass("animation-duration2 fadeInRight");

            if (div == "#carouselExample2") {
                

                if ($("#carouselExample2 .active img").attr("src") != lastSrc) {
                    if (e.originalEvent.wheelDelta / 120 < 0) {
                        $(this).carousel("next");
                    }
                }
              

                if ($(div + ".active img").attr("src") != firstSrc) {
                    console.log('first');
                    if (e.originalEvent.wheelDelta / 120 > 0) {
                        $(this).carousel("prev");
                    }
                }
            }
            else {
                console.log('aa');
            }

            showHideButtons(div);
        });
    }

