var ww = document.body.clientWidth;
if (ww < 990) {
    $(".mobile-hidden").remove();
    $('.mobile-first').addClass('active');
}

$(".carousel-controls-main .carousel-control-prev").css({
    opacity: 0,
    display: "none"
});


var first_slide = $(".mobile-first");
var first_slide2 = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery").first();
var last_slide = $("#carouselExample2 .carousel-inner-gallery .carousel-item-gallery:last");



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

$(document).on("wheel", '#carouselExample2', function (e) {
    var delta = e.originalEvent.deltaY;



    if (delta > 0) {
        if (!last_slide.prev().hasClass('active')) {
            $(this).carousel("next");
        }
    }else {

        if (!first_slide.prev().hasClass('active') )  {
            $(this).carousel("prev");
        }
    }



});

$(document).on("slide.bs.carousel", '#carouselExample2', function (e) {
    var active = $(e.relatedTarget);


    if($(active).is(first_slide2)) {
        $(".carousel-controls-main .carousel-control-prev").css({
            opacity: 0,
            display: "none"
        });
    }else{
        $(".carousel-controls-main .carousel-control-prev").css({
            opacity: 1,
            display: "block"
        });

    }




    if(active.is(last_slide)) {
        if(first_slide2.is('.mobile-first')) {
            $(".carousel-controls-main .carousel-control-next").css({
                opacity: 0,
                display: "none"
            });
        }
    }else if(active.next().is(last_slide)) {
        
        if(first_slide2.is('.mobile-hidden')) {
            $(".carousel-controls-main .carousel-control-next").css({
                opacity: 0,
                display: "none"
            });
        }
    }else {
        $(".carousel-controls-main .carousel-control-next").css({
            opacity: 1,
            display: "block"
        });
    }






    if (e.direction == "left") {
      $('.carousel-indicators').find('.active').removeClass('active').next().addClass('active');
    } else {
      $('.carousel-indicators').find('.active').removeClass('active').prev().addClass('active');
    }

  });

