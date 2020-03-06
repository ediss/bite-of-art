@extends('layout.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />

<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}" />
{{-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style2.css')}}" /> --}}
@endsection

@section('logo-img')
<img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
@endsection
@section('content')

{{-- @php dd(app()->getLocale()); @endphp --}}
<div class="row animation-duration2 fadeInLeft" id="mainGallery">

    <div class="col-12 p-0">
        <div id="carouselExampleIndicators" class="carousel slide d-lg-none" data-ride="carousel">
            <div class="carousel-inner">
                
                @if($feature_events)


                @foreach ($feature_events as $event_in_feature)
                <div class="carousel-item active" data-id="{{ $event_in_feature->id }}">
                    <div class="card">
                        <img class="img-fluid  d-block" src="{{ $event_in_feature->event_cover}}" alt="slide 2">
                    </div>

                    <div class="card-body text-center h-80px h-100px">
                        <h4 class="card-title montserrat-bold">{{ $event_in_feature->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_feature->event_place }}</p>

                    </div>
                </div>
                @endforeach
                @endif



                @if($events_in_past)
                @foreach ($events_in_past as $event_in_past)
                @if(!$loop->first)
                <div class="carousel-item {{ !$fefeature_events ?  'active' : ''}}" data-id="{{ $event_in_past->id }}">
                    <div class="card">
                        <img class="img-fluid  d-block" src="{{ $event_in_past->event_cover}}" alt="slide 2">
                    </div>

                    <div class="card-body text-center h-80px h-100px">
                        <h4 class="card-title montserrat-bold">{{ $event_in_past->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_past->event_place }}</p>

                    </div>
                </div>
                @endif
                @endforeach
                @endif
                
                @if($event_in_past)
                <div class="carousel-item" data-id="{{ $event_in_past->id }}">

                    <div class="card">
                        <img class="img-fluid  d-block" src="{{ $event_in_past->event_cover}}" alt="slide 2">
                    </div>

                    <div class="card-body text-center h-80px h-100px">
                        <h4 class="card-title montserrat-bold">{{ $event_in_past->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_past->event_place }}</p>

                    </div>
                </div>
                @endif



            </div>

            <!-- UNDER FOR COMMENT ONLY FOR PRESENTATION -->

            {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> --}}
        </div>


        <div id="carouselExample" class="carousel slide d-none d-lg-block " data-ride="carousel" data-interval="900000">
            <div class="carousel-inner carousel-inner-main w-120 p-0 m-0" role="listbox">
                @if($event_in_past)

                <div class="carousel-item carousel-item-main  col-4 p-0 active">
                    <div class="card" data-id="{{ $event_in_past->id }}">
                        <img class="img-fluid  d-block" src="{{ $event_in_past->event_cover}}" alt="slide 2">
                    </div>

                    <div class="card-body text-center h-100px">
                        <h4 class="card-title montserrat-bold">{{ $event_in_past->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_past->event_place }}</p>

                    </div>
                </div>
                @endif


                @if($feature_events)

                @foreach ($feature_events as $event_in_feature)

                <div class="carousel-item carousel-item-main  col-4 p-0">
                    <div class="card" data-id="{{ $event_in_feature->id }}">
                        <img class="img-fluid  d-block" src="{{ $event_in_feature->event_cover}}" alt="slide 2">
                    </div>

                    <div class="card-body text-center h-100px">
                        <h4 class="card-title montserrat-bold">{{ $event_in_feature->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_feature->event_place }}</p>

                    </div>
                </div>
                @endforeach
                @endif

                @if($events_in_past)
                @foreach ($events_in_past as $event_in_past)
                @if(!$loop->last)
                <div class="carousel-item carousel-item-main  col-4 p-0">
                    <div class="card" data-id="{{ $event_in_past->id }}">
                        <img class="img-fluid  d-block" src="{{ $event_in_past->event_cover}}" alt="slide 2">
                    </div>

                    <div class="card-body text-center h-100px">
                        <h4 class="card-title montserrat-bold">{{ $event_in_past->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_past->event_place }}</p>

                    </div>
                </div>
                @endif
                @endforeach
                @endif


            </div>

            <!-- UNDER FOR COMMENT ONLY FOR PRESENTATION -->
            {{-- <div class="carousel-controls-main">
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div> --}}
        </div>

    </div>

</div>

<div class="row animation-duration2 fadeInRight" id="smallGallery">
    <div class="col-12 p-0">
        <div id="recipeCarousel" class="carousel slide" data-ride="carousel" data-interval="900000">
            <div class="carousel-inner carousel-inner-news w-100 mini p-0 m-0" role="listbox">

                @foreach ($news as $n)
                <div
                    class="carousel-item carousel-item-news  col-6 col-md-20 p-0 {{ $loop->first ? 'active first-news' : '' }}">
                    <div class="card ">
                        <div class="img-opacity" news-id={{ $n->id }}>
                            <img class="img-fluid  d-block" src="{{ $n->article_cover}}" alt="slide 1">
                        </div>
                        <div class="img-description">
                            <p class="montserrat-bold text-left"> {{$n->article_name}}</p>
                        </div>

                    </div>

                </div>
                @endforeach

            </div>
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
    {{-- <div class="carousel-controls">
       
    </div> --}}
</div>

<!-- div for animation for opening news-->
<div class="row overlay-news" id="openedNews"></div>


@endsection


@section('footer-scripts')
<script src=" {{ asset('assets/js/custom-carousel-main.js') }}"></script>
<script src=" {{ asset('assets/js/custom-carousel-news.js') }}"></script>
<script src=" {{ asset('assets/js/opening-event.js') }}"></script>
<script src=" {{ asset('assets/js/opening-news.js') }}"></script>


<script>
    $('#carouselExampleIndicators').find('.active').addClass('mobile-click');
    $('#carouselExample').find('.active').next().find('.card').addClass('click');
</script>

<!------ JS CODE ---------->
@endsection