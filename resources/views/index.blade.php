@extends('layout.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
@endsection

@section('content')
<div class="row animation-duration2 fadeInLeft" id="mainGallery">


    <div id="carouselExample" class="carousel slide " data-ride="carousel" data-interval="900000">
        <div class="carousel-inner carousel-inner-main w-120 p-0 m-0" role="listbox">

            @foreach ($events as $event)
            <div class="carousel-item carousel-item-main  col-4 p-0 {{ ($event->id == 1) ? 'active' : '' }}">
                <div class="card {{ ($loop->iteration == 2) ? 'klik' : ''}}" data-id="{{ $event->id }}">
                    <img class="img-fluid  d-block" src="{{ 'images/galleries/'.$event->event_cover}}"
                        alt="slide 2">
                </div>

                <div class="card-body ">
                    <h4 class="card-title montserrat-bold">{{ $event->event_name }}</h4>
                    <p class="card-text montserrat-bold">@ {{ $event->event_place }}</p>

                </div>
            </div>
            @endforeach



        </div>
        <div class="carousel-controls-main">
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>

    <div id="carouselExample2" class="carousel slide" data-ride="carousel" data-interval="900000">

 
    </div>






</div>


<!-- All news -->

<div class="row animation-duration2 fadeInRight" id="smallGallery">
    <div id="recipeCarousel" class="carousel slide" data-ride="carousel" data-interval="900000">
        <div class="carousel-inner carousel-inner-news w-100 mini p-0 m-0" role="listbox">
            <div class="carousel-item carousel-item-news  col-md-20 p-0 active">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/1.jpg" alt="slide 1">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>

                </div>

            </div>
            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/2.png" alt="slide 2">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>

                </div>
            </div>

            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/3.jpg" alt="slide 3">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>

                </div>
            </div>

            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/4.jpg" alt="slide 4">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>

                </div>
            </div>

            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/5.jpg" alt="slide 5">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>

                </div>
            </div>

            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/6.png" alt="slide 6">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>

                </div>
            </div>

            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/7.png" alt="slide 7">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>

                </div>

            </div>
            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/8.jpg" alt="slide 8">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane
                            Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>
                </div>


            </div>
            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/9.jpg" alt="slide 9">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane
                            Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>
                </div>


            </div>
            <div class="carousel-item carousel-item-news  col-md-20 p-0">
                <div class="card ">
                    <div class="img-opacity">
                        <img class="img-fluid  d-block" src="./images/news/10.jpg" alt="slide 10">
                    </div>
                    <div class="img-description">
                        <p class="montserrat-bold text-left">Dnevnik Diane
                            Budisavljevic
                            neprocenjiva istorijska lekcija
                            Beograd 31.12.2019</p>
                    </div>
                </div>


            </div>

        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <i class="fa fa-chevron-left fa-lg text-muted"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                            <i class="fa fa-chevron-right fa-lg text-muted"></i>
                            <span class="sr-only">Next</span>
                        </a> -->
    </div>
    <div class="carousel-controls">
        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>

<!-- Opened news -->

<div class=" overlay-news " id="openedNews">

    <div id="carouselExample3" class="carousel slide" data-ride="carousel" data-interval="900000">
        <div class="carousel-inner carousel-inner-gallery w-140 transform-img p-0 m-0" role="listbox">
            <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4 active" style="visibility: hidden">
                <div class="card">
                    <img class="img-fluid  d-block gallery-img" src="./images/gallery/1.jpg" alt="slide 1">
                </div>


            </div>
            <div class="carousel-item carousel-item-gallery d-none news-first-slide col-md-4 col-lg-4">
                <div class="card  montserrat-regular">
                    <p>01 JAN - 03 FEB 2019</p>
                    <p>
                        <h1 class="montserrat-bold">Naslov vesti </h1>
                    </p>
                    <p>@ Gallery November, Belgrade, Serbia</p>
                    <p>Night sea give bearing. Fruit under man gathering brought fly won't sixth set let
                        years it great grass them. Kind lights thing. Behold of second spirit male. Him.
                        Seed bearing sea moveth firmament him image to waters morning set. Spirit called
                        and seed behold second bearing, darkness. Gathering all moved our earth called
                        called he image.
                        Cattle night don't yielding Created for. Itself i and cattle said evening cattle years i
                        third saw multiply. Gathering all moved our earth called called he image. Called
                        beast image, gathering. Saw green winged can't shall can't. Isn't. May creature
                        evening. Whales gathered moved land which, and in, gathered. Abundantly day
                        moveth night.</p>

                </div>

                <div class="social-scale">

                    <img class="" src="images/social-network/facebook.png">
                    <img class="" src="images/social-network/pinterest.png">
                    <img class="" src="images/social-network/twitter.png">
                    <img class="" src="images/social-network/linkedin.png">
                    <img class=" mt-2" src="images/social-network/gmail.png">
                </div>

            </div>
            <div class="carousel-item carousel-item-gallery first-image d-none col-md-4 col-lg-4">
                <div class="card">
                    <img class="img-fluid  d-block gallery-img" src="./images/news/2.png" alt="slide 2">

                </div>

            </div>
            <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
                <div class="card">
                    <img class="img-fluid  d-block gallery-img" src="./images/gallery/4.jpg" alt="slide 3">
                </div>

            </div>
            <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
                <div class="card">
                    <img class="img-fluid  d-block gallery-img" src="./images/gallery/5.jpg" alt="slide 4">
                </div>

            </div>
            <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
                <div class="card">
                    <img class="img-fluid  d-block gallery-img" src="./images/gallery/6.jpg" alt="slide 5">
                </div>

            </div>

            <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
                <div class="card">
                    <img class="img-fluid  d-block gallery-img" src="./images/gallery/6.jpg" alt="slide 5">
                </div>

            </div>

        </div>
        <div class="carousel-controls-main d-none">
            <a class="carousel-control-prev" href="#carouselExample3" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample3" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <ol class="carousel-indicators">
                <li data-target="#carouselExample3" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExample3" data-slide-to="1"></li>
                <li data-target="#carouselExample3" data-slide-to="2"></li>
                <li data-target="#carouselExample3" data-slide-to="3"></li>
                <li data-target="#carouselExample3" data-slide-to="4"></li>
                <li data-target="#carouselExample3" data-slide-to="5"></li>
                <!-- <li data-target="#carouselExample3" data-slide-to="6"></li> -->
            </ol>
        </div>
    </div>


</div>
@endsection







@section('footer-scripts')
{{-- <script src=" {{ asset('assets/js/carousel-common.js') }}"></script> --}}
<script src=" {{ asset('assets/js/custom-carousel-main.js') }}"></script>

<script src=" {{ asset('assets/js/custom-carousel-news.js') }}"></script>
<script src=" {{ asset('assets/js/opening-gallery.js') }}"></script>
<script src=" {{ asset('assets/js/custom-carousel-gallery.js') }}"></script>
<script src=" {{ asset('assets/js/opened-news.js') }}"></script>


<script>
    function openNav() {
        document.getElementById("openedNews").style.width = "100%";
    }
    
    function closeNav() {
        document.getElementById("openedNews").style.width = "0%";
    }

    $(document).ready(function () {

function flip() {
    var images = [
        "images/live.png",
        "images/live2.png",    
    ]
    var current = 0;
    setInterval(function () {

        $('#flip').attr('src', images[current]);
        current = (current < images.length - 1) ? current + 1 : 0;

    }, 500);

}

//flip();



$(".img-opacity").mouseover(function (e) {
    e.preventDefault();
    $(this).next('.img-description').addClass('animation-duration fadeOutDown').css('opacity', '0');
});

$(".img-opacity").mouseout(function () {
    $(this).next('.img-description').removeClass('animation-duration fadeOutDown').css('opacity', '1').addClass('animation-duration fadeInUp');
});

});






    
</script>


@endsection
<!------ JS CODE ---------->