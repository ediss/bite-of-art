<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>

    <noscript>
        <meta http-equiv="refresh" content="0; url={{ url('/en/warning')}}" />
    </noscript>

    <title>Biteofart |@yield("page-title")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-menu.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.min.css')}}" />


    @yield('css')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="container-fluid">

        @include('inc.navbar')

        @yield('content')


        <!-- Footer -->
        <div class="row page-footer">
            <div class="col-12 text-center">
                <footer class=" footer">

                    <div class="row">
                        <div class="col-4 d-none d-md-block"></div>
                        <div class="col-12  col-md-4">
                            <div class="row d-none d-md-block">
                                <div class="col-12 col-md-4 offset-md-4">
                                    <a target="_blank" href="https://ec.europa.eu/programmes/creative-europe/node_en">
                                        <img class="img-fluid  d-block gallery-img about-europe"
                                            src="{{ asset('images/about/partners-cb/EU2.png') }}"
                                            data-src="{{ asset('images/about/partners-cb/EU2.png') }}"
                                            data-hover="{{ asset('images/about/partners/EU.png') }}" alt="creative europe">
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Copyright -->
                            <div class="footer-copyright text-center montserrat-regular d-md-none">All rights reserved © BITE of
                                art 2020
                            </div>
                            <!-- Copyright -->
                        </div>
                        <div class="d-none d-md-block col-md-4">
       
                            
                        </div>
                    </div>

                    
                    

                </footer>
            </div>

        </div>

        <!-- Footer -->

        <!--Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

        <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="/assets/js/min/jquery.blockUI.min.js"></script>
        <script src="/assets/js/common/global.js"></script>


        <script>
            function charCount(el) {
            $(this).keyup(function(e){
                e.preventDefault();
                var characterCount = el.value.length;
                $(el).parent().next().text(characterCount+"/ 3500");
                $(el).next().next().next('span')
            });
        }
 
        $('.carousel').carousel({
            interval: false
        })



        function flip() {
            var images = [
                "../images/live.png",
                "../images/live2.png",
            ]
            var current = 0;
            setInterval(function () {

                $('#flip').attr('src', images[current]);
                current = (current < images.length - 1) ? current + 1 : 0;

            }, 500);
        }
$(document).ready(function () {
    flip();

    $(".about-europe").mouseover(function () {
             $(this).attr('src', $(this).data("hover"));
          }).mouseout(function () {
            $(this).attr('src', $(this).data("src"));
         });
    $('#toggle').click(function () {
     $(this).toggleClass('active');
     $('#overlay').toggleClass('open');
 
 });
});

document.onload = function(){
    $("#mainGallery").addClass("radi");
}


window.addEventListener('load', function () {
    $("#mainGallery").addClass("fadeInLeft  animation-duration2");
    $("#smallGallery").addClass("fadeInRight animation-duration2");
})
        </script>

        @yield('footer-scripts')

    </div>





</body>

</html>