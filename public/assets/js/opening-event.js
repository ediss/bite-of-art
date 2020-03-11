function openingEventAnimations() {

     $(".logo").css({
         transform: "translate(0,-100px)",
         transition: "transform 3.4s ease-in-out"
     });

    $("#carouselExample .carousel-controls-main").hide();

    $("#smallGallery").addClass("moveRight");

    $("#smallGallery").animate({ right: "250%" }, 1500);

    $("#carouselExample")
        .find(".card-body")
        .animate(
            {
                transition: "height 1.4s ease-in-out",
                height: "0px"
            },
            {
                step: function() {
                    $(this).animate({
                        transition: "visibility 1s ease-in-out",
                        visibility: "hidden"
                    });
                },
                duration: 2000
            }
        );

    $("#carouselExample").find(".active").animate({transition: "right 3s ease-in-out",right: "55%"},2000);
}


function openingEventAjax(carousel_div, event_id, mobile, route) {
    $.ajax({
        type: "POST",
        // url: "{{route('opened.event',)}}",
        // url:"{{ url('/event/{id?}') }}",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            )
        },
        data: { id: event_id },

        success: function(data) {
            $("#carouselExample2").html(data.html);

            if(mobile) {
                $("#carouselExample2").find('.mobile-hidden').remove();
                $("#carouselExample2").find('.mobile-first').addClass('active');
            }

            carousel_div.replaceWith(
                $("#carouselExample2")
            );
        }
    });
}

$(document).ready(function(){
    $("#mainGallery").on("click", ".click", function() {
        //event id
        var event_id = $(this).attr("data-id");
        var language = $("#mainGallery").attr("data-language");
        var route = $(this).attr("data-href");


        openingEventAnimations();

        $("#carouselExample .carousel-inner-main").animate(
            { opacity: 1 },
            {
                step: function() {
                    $(this).css({
                        "transform-origin": "0 0",
                        transition:
                            "transform 1.9s ease-in-out, width 1.9s ease-in-out",
                        // transform: "scale(1.6) translate3d(18%, 0, 0)",
                        transform: "scale(1.8) translate(11.1%, 0px)",
                        // width: "140%"
                    });

                    //$(this).find(".active").next().find("img").addClass("new-transform");

                    $(this).find(".p-0").removeClass("p-0");

                    $(this).find(".active").next().next().animate({
                        left: "55%",
                        "transform-origin": "0 0",
                        transition: "transform .1s ease-in-out"
                    });

                },
                duration: 3000,

                complete: function() {
                    var carouselDiv = $("#carouselExample");
                    window.location.href = route;
                }
            }
        );
    });

    $("#mainGallery").on("click", ".mobile-click", function() {

        openingEventAnimations();

        //event id
        var event_id = $(this).attr("data-id");

        $("#smallGallery").addClass("moveRight");

        $("#smallGallery").animate({ right: "130%" }, 1500);

        $("#carouselExampleIndicators .active").animate({
            left: "100%"
        });

        setTimeout(function () {
            window.location.href = "/event112/"+event_id;
          }, 2100);


        $("#carouselExample2").find(".d-lg-block").removeClass("active");



        $(".page-footer").fadeOut("slow");



    });




});
