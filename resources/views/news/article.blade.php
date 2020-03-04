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
                        <p>first_news_slide</p>
                    </div>
                </div>
                @php
                $counter ++;
                $desc = explode('~', $article->article_description);
                @endphp

                <div
                    class="carousel-item carousel-item-gallery news-first-slide animation-duration2 fadeInUp col-12  col-lg-4 mobile-first">


                    <div class="card">
                        <div class="col-10 news-first-slide montserrat-regular text-left">
                            <div class="h-80px h-100px">
                                <h1 class="montserrat-bold">{{ $article->article_name }} </h1>
                                <p>{{date('Y-d-M',strtotime($article->article_open))}}</p>

                            </div>

                            <p>{{ $desc[0] }}</p>
                        </div>
                    </div>

                    <div class="col-10 social-scale">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                            class="fb-xfbml-parse-ignore">
                            <img class="" src="{{ asset('images/social-network/facebook.png') }}">
                        </a>

                        <a target="_blank"
                            href="http://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{ url($article->article_cover) }}"
                            class="pin-it-button" count-layout="horizontal">
                            <img class="" src="{{ asset('images/social-network/pinterest.png') }}">
                        </a>

                        <a target="_blank"
                            href="http://twitter.com/share?&url={{url()->current()}}&hashtags=bite,of,art">
                            <img class="" src="{{ asset('images/social-network/twitter.png') }}">
                        </a>


                        <a target="_blank"
                            href="http://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $article->article_name }}&summary={{ url($article->article_cover) }}">
                            <img class="" src="{{ asset('images/social-network/linkedin.png') }}">
                        </a>

                        <a href="mailto:?subject=I wanted you to see this site&amp;body={{url()->current()}}"
                            title="Event: {{ $article->article_name }}">
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

                <!-- had fadeInRight class -->
                <div class="carousel-item carousel-item-gallery col-md-4 col-lg-4 animation-duration2 ">
                    @php
                    $counter++;
                    @endphp
                    <div class="card">
                        <img class="img-fluid  d-block gallery-img" src="{{ url($article->article_cover) }}"
                            alt="slide 2">

                    </div>

                </div>

                @if(isset($additionals))

                @foreach ($additionals as $article_data)
                <div class="carousel-item carousel-item-gallery col-md-4 col-lg-4 animation-duration2">
                    @php
                    $counter++;
                    @endphp
                    <div class="card">
                        <img class="img-fluid  d-block gallery-img" src="{{ url($article_data->article_img) }}"
                            alt="slide 2">

                    </div>

                </div>
                @endforeach

                @endif
            </div>

        </div>
    </div>
    <div class="carousel-controls-main animation-duration2">
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