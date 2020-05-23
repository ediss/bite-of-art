@extends('layout.app')

@section('css')


@section('logo-img')
    <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
@endsection

@section('content')

<div class="row animation-duration2 fadeInLeft" id="mainGallery" data-language="{{ app()->getLocale() }}">

    <div class="col-12 p-0 m-0 h-80px h-100px">
        <h1 class="page-heading text-center montserrat-bold pt-4 mb-0">{{__("events")}}</h1>
    </div>
    <div class="col-12 p-0">
        <div id="carouselExampleIndicators" class="carousel slide d-lg-none" data-ride="carousel">
            <div class="carousel-inner">
                {{-- @php dd($feature_events->count()); @endphp --}}
                @if($feature_events)


                @foreach ($feature_events as $event_in_feature)
                <div class="carousel-item active" data-id="{{ $event_in_feature->id }}" data-href="{{ route('opened.event', ['id'=>$event_in_past->id, app()->getLocale() ]) }}">
                    <div class="card img-opacity-event" data-href="{{ route('opened.event', ['id'=>$event_in_feature->id, app()->getLocale() ]) }}">
                        <div class="">
                            <img class="img-fluid  d-block" src="{{ $event_in_feature->event_cover}}" alt="slide 2">
                        </div>
                    </div>

                    <div class="img-description-event text-center">
                        <h4 class="card-title montserrat-bold">{{ $event_in_feature->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_feature->event_place }}</p>
                    </div>
                </div>
                @endforeach
                @endif


                @if($event_in_past)
                <div class="carousel-item {{ ($feature_events->count() == 0) ?  'active' : ''}}" data-id="{{ $event_in_past->id }}" data-href="{{ route('opened.event', ['id'=>$event_in_past->id, app()->getLocale() ]) }}">

                    <div class="card img-opacity-event" data-href="{{ route('opened.event', ['id'=>$event_in_past->id, app()->getLocale() ]) }}">
                        <div class="">
                            <img class="img-fluid  d-block" src="{{ $event_in_past->event_cover}}" alt="slide 2">

                        </div>
                    </div>

                    <div class="img-description-event text-center">
                        <h4 class="card-title montserrat-bold">{{ $event_in_past->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_past->event_place }}</p>

                    </div>
                </div>
                @endif

                @if($events_in_past)
                @foreach ($events_in_past as $event_in_past)
                @if(!$loop->first)
                <div class="carousel-item" data-id="{{ $event_in_past->id }}" data-href="{{ route('opened.event', ['id'=>$event_in_past->id, app()->getLocale() ]) }}">
                    <div class="card img-opacity-event">
                        <div class="">
                            <img class="img-fluid  d-block" src="{{ $event_in_past->event_cover}}" alt="slide 2">

                        </div>
                    </div>

                    <div class="img-description-event text-center">

                        <h4 class="card-title montserrat-bold">{{ $event_in_past->event_name }}</h4>
                        <p class="card-text montserrat-bold">@ {{ $event_in_past->event_place }}</p>

                    </div>
                </div>
                @endif
                @endforeach
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
                    <div class="card img-opacity-event" data-id="{{ $event_in_past->id }}" >
                        <div class="">
                            <img class="img-fluid  d-block" src="{{ $event_in_past->event_cover}}" alt="slide 2">
                        </div>
                        <div class="img-description-event">
                            <h4 class="card-title montserrat-bold text-center">{{ $event_in_past->event_name }}</h4>
                            <p class="card-text montserrat-bold text-center">@ {{ $event_in_past->event_place }}</p>
                        </div>

                    </div>
                </div>
                @endif


                @if($feature_events)

                @foreach ($feature_events as $event_in_feature)

                <div class="carousel-item carousel-item-main  col-4 p-0">
                    <div class="card img-opacity-event" data-id="{{ $event_in_feature->id }}" data-href="{{ route('opened.event', ['id'=>$event_in_feature->id, app()->getLocale() ]) }}">
                        <div class="">
                            <img class="img-fluid  d-block" src="{{ $event_in_feature->event_cover}}" alt="slide 2">
                        </div>
                        <div class="img-description-event text-center">
                            <h4 class="card-title montserrat-bold text-center">{{ $event_in_feature->event_name }}</h4>
                            <p class="card-text montserrat-bold text-center">@ {{ $event_in_feature->event_place }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

                @if($events_in_past)
                @foreach ($events_in_past as $event_in_past)
                @if(!$loop->last)
                <div class="carousel-item carousel-item-main  col-4 p-0">
                    <div class="card img-opacity-event" data-id="{{ $event_in_past->id }}" data-href="{{ route('opened.event', ['id'=>$event_in_past->id, app()->getLocale() ]) }}">
                        <div class="">
                            <img class="img-fluid  d-block" src="{{ $event_in_past->event_cover}}" alt="slide 2">
                        </div>
                        <div class="img-description-event text-center">
                            <h4 class="card-title montserrat-bold text-center">{{ $event_in_past->event_name }}</h4>
                            <p class="card-text montserrat-bold text-center">@ {{ $event_in_past->event_place }}</p>
                        </div>

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

@endsection

@section('footer-scripts')

<script src=" {{ asset('assets/js/min/custom-carousel-main.min.js') }}"></script>
<script src=" {{ asset('assets/js/opening-event.js') }}"></script>
<script>
    $('#carouselExampleIndicators').find('.active').addClass('mobile-click');
    $('#carouselExample').find('.active').next().find('.card').addClass('click');
</script>
@endsection