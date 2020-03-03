@extends('layout.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}" />
@endsection

@section('logo-img')
<div class="close-gallery animation-duration2 fadeInDown"></div>
@endsection

@section('content')
<div class="row">


    @php
    $counter = 0;
    @endphp

    <div class="col-12 p-0">
        <div id="carouselExample2" class="carousel slide about-carousel" data-ride="carousel" data-interval="900000">
            <div class="carousel-inner carousel-inner-gallery  transform-img p-0 m-0 next-id" role="listbox">

                <div class="carousel-item carousel-item-gallery  col-1 mobile-hidden col-lg-4  active"
                    style="visibility:hidden">

                    <div class="card">
                        <p>first_slide</p>
                    </div>
                </div>
                @php
                $counter ++;
                @endphp
                <div
                    class="carousel-item carousel-item-gallery  animation-duration2 fadeInUp col-12  col-lg-4 mobile-first">

                        <div class="row">
                            <div class="col-10 gallery-first-slide  text-left">
                                <h1 class="montserrat-bold">About BITE of art</h1>

                                <p class="montserrat-regular">The <b>BITE of Art </b> initiative represents a joint vision of cultural and artistic institutions and organizations coming from Spain, Slovenia and Serbia to bring innovative practices into work of cultural operators, and indirectly to contemporary artists, shaping a path for mainstreaming contemporary art among young citizens. Our aim is to transform promotion and attractiveness of the contemporary art among audience by application of the digital communication technologies and the new approaches in informing and attracting audience, as well as in enhancing artwork presentation.
                                </p>
                                <p class="montserrat-regular">Under the <i>BITE of Art </i> umbrella, we are gathering all those who can contribute to this goal, on the first place cultural operators, individuals, various organisations and companies. We started from Serbia, Spain and Slovenia, with the strong intention to further expand this initiative in Europe.</p>
                                <p class="montserrat-regular">The European Union supported BITE of Art initiative by co-financing project for development and piloting unique BITE communication model through the Creative Europe 2019 programme.</p>
                                {{-- <div class=" social-scale">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                class="fb-xfbml-parse-ignore">
                                <img class="" src="{{ asset('images/social-network/facebook.png') }}">
                                </a>

                                <a target="_blank"
                                    href="http://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{ url($data->event_cover) }}"
                                    class="pin-it-button" count-layout="horizontal">
                                    <img class="" src="{{ asset('images/social-network/pinterest.png') }}">
                                </a>

                                <a target="_blank"
                                    href="http://twitter.com/share?&url={{url()->current()}}&hashtags=bite,of,art">
                                    <img class="" src="{{ asset('images/social-network/twitter.png') }}">
                                </a>


                                <a target="_blank"
                                    href="http://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $data->event_name }}&summary={{ url($data->event_cover) }}">
                                    <img class="" src="{{ asset('images/social-network/linkedin.png') }}">
                                </a>

                                <a href="mailto:?subject=I wanted you to see this site&amp;body={{url()->current()}}"
                                    title="Event: {{ $data->event_name }}">
                                    <img class="mt-2" src="{{ asset('images/social-network/gmail.png') }}">
                                </a>

                            </div> --}}
                        </div>

                    </div>

            </div>


            <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4 ">
                @php
                $counter++;
                @endphp
                <div class="card">
                    <img class="img-fluid  d-block gallery-img" src="{{ asset('images/about/BITEAB.jpg') }}"
                        alt="slide 2">

                </div>

            </div>

        </div>

    </div>

</div>
<div class="carousel-controls-main">
    <a class="carousel-control-prev" href="#carouselExample2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <ol class="carousel-indicators">

        @for ($i = 0; $i < $counter; $i++) <li data-target="#carouselExample2" data-slide-to="{{ $i }}"
            {{ ($i == 0) ? "class=active" : ""}}>
            </li>
            @endfor

    </ol>
</div>



</div>
@endsection

@section('footer-scripts')
<script>
    $('.footer').css('display', 'none');
</script>
<script src=" {{ asset('assets/js/opened-news.js') }}"></script>
@endsection