@extends('layout.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />

<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}" />
{{-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style2.css')}}" /> --}}
@endsection

@section('logo-img')
    <div class="close-gallery animation-duration2 fadeInDown"></div>
@endsection

@section('content')
<div class="row">

    <div class="col-12 p-0">
        <div id="carouselExample2" class="carousel slide" data-ride="carousel" data-interval="900000">

            @php
            $counter = 0;
            @endphp


            <div class="carousel-inner carousel-inner-gallery transform-img p-0 m-0 next-id" role="listbox">

                <div class="carousel-item carousel-item-gallery  col-1 mobile-hidden col-lg-4  active"
                    style="visibility:hidden">

                    <div class="card">
                        <img class="img-fluid  d-block gallery-img" src="{{ 'images/galleries/logo.png' }}"
                            alt="slide 1">
                    </div>
                </div>
                @php
                $counter ++;
                @endphp

                <div class="carousel-item carousel-item-gallery news-first-slide animation-duration2 fadeInUp col-12  col-lg-4 mobile-first" >

                    <div class="card">
                        <div class="news-first-slide montserrat-regular text-left p-4">
                            <p>01 JAN - 03 FEB 2019</p>
                            <p>
                                <h1 class="montserrat-bold">{{ $article->article_name }} </h1>
                            </p>
                            <p>@ Gallery November, Belgrade, Serbia</p>
                            <p>{{ $article->article_description }}</p>
                        </div>
                    </div>

                    <div class="social-scale pl-4">

                        <img class="" src="/images/social-network/facebook.png">
                        <img class="" src="/images/social-network/pinterest.png">
                        <img class="" src="/images/social-network/twitter.png">
                        <img class="" src="/images/social-network/linkedin.png">
                        <img class=" mt-2" src="/images/social-network/gmail.png">
                    </div>

                </div>
                <div class="carousel-item carousel-item-gallery col-md-4 col-lg-4">
                    @php
                    $counter++;
                    @endphp
                    <div class="card">
                        <img class="img-fluid  d-block gallery-img" src="{{ $article->article_cover }}" alt="slide 2">

                    </div>

                </div>
            </div>
     
        </div>
    </div>
    <div class="carousel-controls-main animation-duration2 fadeInUp">
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
<script>$('.footer').css('display', 'none');</script>

<script src=" {{ asset('assets/js/opened-news.js') }}"></script>
@endsection