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
                $langdesc = app()->getLocale();

                
                @endphp
                <div
                    class="carousel-item carousel-item-gallery  animation-duration2 fadeInUp col-12  col-lg-4 mobile-first">

                    <div class="card">
                        <div class="col-lg-10 gallery-first-slide">
                            <div class=" h-100px">
                                <h1 class="montserrat-bold"> {{ $data->event_name }}</h1>
                                <p>{{ strtoupper(date('d M', strtotime($data->event_open))) }} -
                                    {{ strtoupper(date('d M Y', strtotime($data->event_closed ))) }}</p>
                                <p>@ {{ $data->event_place }}</p>
                            </div>

                            @switch(app()->getLocale())
                                @case('slo')
                                @php $desc = explode('~', $data->event_description_slo); @endphp
                                    @break
                                @case('srb')
                                @php $desc = explode('~', $data->event_description_srb  ); @endphp
                                    @break
                                @case('esp')
                                @php $desc = explode('~', $data->event_description_esp); @endphp
                                    @break
                                @default
                                
                                @php $desc = explode('~', $data->event_description_en); @endphp
                                
                            @endswitch
                            <p>{{ $desc[0] }}</p>
                        </div>

                    </div>

                    <div class="col-lg-10 social-scale">
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

                    </div>

                </div>

                @if($desc[1])
                <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4 ">
                    @php
                    $counter++;
                    
                    @endphp
                    <div class="card">
                        <div class="col-10">
                            <div class="h-80px h-100px">

                            </div>
                            <p style="font-size:0.6rem">{{ $desc[1] }}</p>
                        </div>


                    </div>

                </div>
                @endif
                <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4 " id="event_cover">
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

                @if(isset($data->vr_tour))
                <div class="carousel-item carousel-item-gallery carousel-item-vr p-0  col-12  col-lg-4">
                    <div class="card">
                        <iframe height="" width="100%" allowfullscreen="true" src="{{ $data->vr_tour }}"
                            class="virtual-toure"> </iframe>

                    </div>

                </div>
                @endif

                @if(isset($data->img_360))
                <div class="carousel-item carousel-item-gallery carousel-item-vr p-0  col-12  col-lg-4">
                    <div class="card">
                        <iframe height="" width="100%" allowfullscreen="true" src="{{ $data->img_360 }}"
                            class="virtual-toure"> </iframe>

                    </div>

                </div>
                @endif
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
            @for ($i = 0; $i < $counter; $i++) <li data-target="#carouselExample2" data-slide-to="{{ $i }}"
                {{ ($i == 0) ? "class=active" : ""}}>
                </li>
                @endfor

        </ol>
    </div>
    @endif
</div>

@endsection

@section('footer-scripts')
<script>
    $('.footer').css('display', 'none');
</script>
<script src=" {{ asset('assets/js/opened-event.js') }}"></script>

@endsection