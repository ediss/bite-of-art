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
    @if(isset($data))

    @php
    $counter = 0;
    @endphp

<div class="col-12 p-0">
    <div id="carouselExample2" class="carousel slide" data-ride="carousel" data-interval="900000">
        <div class="carousel-inner carousel-inner-gallery transform-img p-0 m-0 next-id" role="listbox"
        {{ $next ? 'next-id='.$next->id : '' }}>

        <div class="carousel-item carousel-item-gallery  col-1 mobile-hidden col-lg-4  active"
            style="visibility:hidden">

            <div class="card">
                <p>first_slide</p>
            </div>
        </div>
        @php
        $counter ++;
        @endphp
        <div class="carousel-item carousel-item-gallery  animation-duration2 fadeInUp col-12  col-lg-4 mobile-first">

            <div class="card">
                <div class="gallery-first-slide montserrat-regular text-left">
                    <p>{{ strtoupper(date('d M', strtotime($data->event_open))) }} -
                        {{ strtoupper(date('d M Y', strtotime($data->event_closed ))) }}</p>
                    <p>
                        <h1 class="montserrat-bold"> {{ $data->event_name }}</h1>
                    </p>
                    <p>@ {{ $data->event_place }}</p>
                    <p> {{ $data->event_description }} </p>

                </div>
            </div>

            <div class=" social-scale">

                <img class="" src="{{ asset('images/social-network/facebook.png') }}">
                <img class="" src="{{ asset('images/social-network/pinterest.png') }}">
                <img class="" src="{{ asset('images/social-network/twitter.png') }}">
                <img class="" src="{{ asset('images/social-network/linkedin.png') }}">
                <img class="mt-2" src="{{ asset('images/social-network/gmail.png') }}">
            </div>

        </div>


        <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4 ">
            @php
            $counter++;
            @endphp
            <div class="card">
                <img class="img-fluid  d-block gallery-img" src="{{ url( $data->event_cover) }}" alt="slide 2">

            </div>

        </div>


        @if(isset($data->event_img_1))
        @php
        $counter++;
        @endphp
        <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4">
            <div class="card">
                <img class="img-fluid  d-block gallery-img" src="{{ url($data->event_img_1) }}" alt="slide 2">

            </div>

        </div>
        @endif

        @if(isset($data->event_img_2))
        @php
        $counter++;
        @endphp
        <div class="carousel-item carousel-item-gallery p-0   col-12  col-lg-4">
            <div class="card">
                <img class="img-fluid  d-block gallery-img" src="{{ url($data->event_img_2) }}" alt="slide 2">

            </div>

        </div>
        @endif

        @if(isset($data->event_img_3))
        @php
        $counter++;
        @endphp
        <div class="carousel-item carousel-item-gallery p-0  col-12  col-lg-4">
            <div class="card">
                <img class="img-fluid  d-block gallery-img" src="{{ url($data->event_img_3) }}" alt="slide 2">

            </div>

        </div>
       
        @endif
        @php
        $counter++;
        @endphp
        <div class="carousel-item carousel-item-gallery carousel-item-vr p-0  col-12  col-lg-4">
            <div class="card">
                <iframe height="" width="100%" allowfullscreen="true" src="https://momento360.com/e/u/05229c8cb82e4420abdf794b5f7ded1b?utm_campaign=embed&utm_source=other&utm_medium=other&heading=0&pitch=0&field-of-view=75" class="virtual-toure"> </iframe>
                
            </div>

        </div>
        <div class="carousel-item carousel-item-gallery p-0 d-lg-none col-12  col-lg-4">
            <div class="card">
              
                
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
        @for ($i = 0; $i < $counter; $i++)
            <li data-target="#carouselExample2" data-slide-to="{{ $i }}"{{ ($i == 0) ? "class=active" : ""}}></li>
        @endfor

    </ol>
</div>


    @endif
</div>
@endsection

@section('footer-scripts')
<script>$('.footer').css('display', 'none');</script>
<script src=" {{ asset('assets/js/opened-event.js') }}"></script>
@endsection