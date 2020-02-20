$("#mainGallery").on("click", ".klik", function() {
    //$("#carouselExample .carousel-inner-main").addClass('w-140-300');

    //event id
    var data_id = $(this).attr("data-id");

    $(".logo").animate({
        transition: "top 4.4s ease-in-out",
        top: "-100px"
    });

    $(".live").css("visibility", "hidden");

    $("#carouselExample .carousel-controls-main").hide();

    $("#smallGallery").animate(
        {
            right: "250%"
        },
        1000
    );

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

    $("#carouselExample")
        .find(".active")
        .animate(
            {
                transition: "right 3s ease-in-out",
                right: "55%"
            },
            2000
        );

    //for mobile

    $("#carouselExampleIndicators .carousel-inner").animate(
        { opacity: 1 },
        {
            step: function() {

              $(this).find(".active").animate({ left: "100%"});
              $(".page-footer").fadeOut('slow');
            },
            duration: 1000,

            complete: function() {
                $.ajax({
                    type: "POST",
                    url: "/event",
                    // url:"{{ url('/event/{id?}') }}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    data: { id: data_id },

                    success: function(data) {
                        $("#carouselExample2").prepend(data.html);
                        $("#carouselExampleIndicators").replaceWith(
                            $("#carouselExample2")
                        );
                    }
                });

                $("#carouselExample2").css("display", "block");
                $(".close-gallery")
                    .removeClass("d-none")
                    .addClass("d-block animation-duration2 fadeInDown");
                
            }
        }
    );

    //end of mobile animation
    $("#carouselExample .carousel-inner-main").animate(
        { opacity: 1 },
        {
            step: function() {
                if (
                    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                        navigator.userAgent
                    )
                ) {
                    // alert('radi');
                    $(this).css({
                        "transform-origin": "50% 0",
                        transition:
                            "transform 4.9s ease-in-out, width 1.9s ease-in-out",
                        transform: "scale(2.2) translate3d(0, 0, 0)"
                        // width: "140%"
                    });

                    $(this)
                        .find(".active")
                        .next()
                        .fadeOut("slow");
                } else {
                    $(this).css({
                        "transform-origin": "0 0",
                        transition:
                            "transform 1.9s ease-in-out, width 1.9s ease-in-out",
                        transform: "scale(1.6) translate3d(0, 0, 0)",
                        width: "140%"
                    });

                    $(this)
                        .find(".active")
                        .next()
                        .find("img")
                        .addClass("new-transform");

                    $(this)
                        .find(".p-0")
                        .removeClass("p-0");
                }

                $(this)
                    .find(".active")
                    .next()
                    .next()
                    .animate({
                        left: "55.3333%",
                        "transform-origin": "0 0",
                        transition: "transform .1s ease-in-out"
                    });

                // $(this)
                // .find(".active")
                // .next()
                // .find("img").css({
                //   transform: "translate3d(0.5%, 0, 0)",
                //   transition: "transform 2.5s ease-in-out"
                // });
            },
            duration: 3000,

            complete: function() {
                $.ajax({
                    type: "POST",
                    url: "/event",
                    // url:"{{ url('/event/{id?}') }}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    data: { id: data_id },

                    success: function(data) {
                        $("#carouselExample2").prepend(data.html);
                        $("#carouselExample").replaceWith(
                            $("#carouselExample2")
                        );
                    }
                });

                $("#carouselExample2").css("display", "block");
                $(".close-gallery")
                    .removeClass("d-none")
                    .addClass("d-block animation-duration2 fadeInDown");
                $(".page-footer").hide();
            }
        }
    );
});
