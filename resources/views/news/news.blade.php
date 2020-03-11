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

<div class="row animation-duration2 fadeInRight" id="smallGallery">

    <div class="col-12 p-0 m-0 h-80px h-100px">
        <h1 class="page-heading text-center montserrat-bold pt-4 mb-0">NEWS</h1>
    </div>
    <div class="col-12 p-0">
        <div id="recipeCarousel" class="carousel slide" data-ride="carousel" data-interval="900000">
            <div class="carousel-inner carousel-inner-news w-100 mini p-0 m-0" role="listbox">

                @foreach ($news as $n)
                <div class="carousel-item carousel-item-news  col-6 col-md-20 p-0 {{ $loop->first ? 'active' : '' }}">
                    <div class="card ">
                        <div class="img-opacity" news-id = {{ $n->id }} data-href="{{ route('opened.event', ['id'=>$n->id, app()->getLocale() ]) }}">
                            <img class="img-fluid  d-block" src="{{ $n->article_cover}}" alt="slide 1">
                        </div>
                        <div class="img-description" >
                            <p class="montserrat-bold text-left">{{$n->article_name}}</p>
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

<script src=" {{ asset('assets/js/custom-carousel-news.js') }}"></script>
<script src=" {{ asset('assets/js/opening-news.js') }}"></script>

@endsection
