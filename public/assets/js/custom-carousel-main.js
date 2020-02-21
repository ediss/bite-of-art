function wheelCarousel(e, el) {
    if (e / 120 < 0) {
        el.carousel("next");
    } else {
        el.carousel("prev");
    }
}

function recursiveCarousel(active, idx, itemsPerSlide, totalItems, direction) {
    if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide - (totalItems - idx);

        for (var i = 0; i < it; i++) {
            // append slides to end
            if (direction == "left") {
                $(".carousel-item-main")
                    .eq(i)
                    .appendTo(".carousel-inner-main");
            } else {
                $(".carousel-item-main")
                    .eq(0)
                    .appendTo(".carousel-inner-main");
            }
        }
    }
}

function carouselItemStyle(active, item) {
    $.each($(item), function(key, val) {
        $(this).find(".card").removeClass("click");

        $(val).mouseover(function() {
            $(this).find(".card-body").css("opacity", "0").removeClass("animation-duration fadeInUp");
        });

        $(val).mouseout(function() {
            $(this).find(".card-body").css("opacity", "0").removeClass("animation-duration fadeOutDown");
        });
    });

    // adding class click
    $(active).next().find(".card").addClass("click");

    //show event name on hover
    $(active.next()).mouseover(function() {
        $(this).find(".card-body").css("opacity", "1").removeClass("fadeOutDown").addClass("animation-duration fadeInUp");
    });

    $(active.next()).mouseout(function() {
        $(this).find(".card-body").css("opacity", "0").removeClass("animation-duration fadeInUp").addClass("animation-duration fadeOutDown");
    });
}

$(document).ready(function() {
    //hide event name
    $("#carouselExample .card-body").css({ opacity: 0 });

    var active = $(".active");

    carouselItemStyle(active, null)

    // mobile

    $("#carouselExampleIndicators").on("slide.bs.carousel", function(e) {
        var active = $(e.relatedTarget);

        $.each($(".carousel-item"), function(key, val) {
            $(this).removeClass("mobile-click");
        });

        $(active).addClass("mobile-click");
    });

    $("#carouselExample").bind("wheel", function(e) {
        var event = e.originalEvent.wheelDelta;
        wheelCarousel(event, $(this));
    });

    $("#carouselExample").on("slide.bs.carousel", function(e) {
        var active = $(e.relatedTarget);
        var idx = active.index();
        var itemsPerSlide = 4;
        var totalItems = $(".carousel-item-main").length;
        var item = $(".carousel-item-main");
        var direction = e.direction;

        recursiveCarousel(active, idx, itemsPerSlide, totalItems, direction);

        carouselItemStyle(active, item);
    });
});
