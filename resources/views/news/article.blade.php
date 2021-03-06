@extends('layout.app')

@section('page-title')

{{$article->article_name}}
    
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


            <div class="carousel-inner carousel-inner-gallery p-0 m-0 next-id" role="listbox">

                <div class="carousel-item carousel-item-gallery  col-1 mobile-hidden col-lg-4  active"
                    style="visibility:hidden">

                    <div class="card">
                        <p>first_news_slide</p>
                    </div>
                </div>
                @php
                    $counter ++;
                    $article_contents = explode('~', $article->article_description);
                @endphp


                <div class="carousel-item carousel-item-gallery news-first-slide animated fast fadeInUp col-12  col-lg-4 mobile-first">
                    <div class="card">
                        <div class="col-9 montserrat-regular text-left">
                            <div class="h-80kpx">
                                <h1 class="montserrat-bold">{{ $article->article_name }} </h1>
                                <p>{{date('Y-d-M',strtotime($article->article_open))}}</p>

                            </div>

                            <p> {!! $article_contents[0] !!}</p>
                        </div>
                    </div>

                    <div class="col-9 social-scale">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                            class="fb-xfbml-parse-ignore">
                            <img class="social-fb"
                            src="{{ asset('images/social-network/facebook.png') }}"
                            data-src="{{ asset('images/social-network/facebook.png') }}"
                            data-hover="{{ asset('images/social-network/fb-black.png') }}" alt="slide 2">
                        </a>

                        <a target="_blank"
                            href="http://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{ url($article->article_cover) }}"
                            class="pin-it-button" count-layout="horizontal">
                            <img class="social-pinterest"
                            src="{{ asset('images/social-network/pinterest.png') }}"
                            data-src="{{ asset('images/social-network/pinterest.png') }}"
                            data-hover="{{ asset('images/social-network/pinterest-black.png') }}" alt="slide 2">

                        </a>

                        <a target="_blank"
                            href="http://twitter.com/share?&url={{url()->current()}}&hashtags=bite,of,art">
                            <img class="social-twitter"
                            src="{{ asset('images/social-network/twitter.png') }}"
                            data-src="{{ asset('images/social-network/twitter.png') }}"
                            data-hover="{{ asset('images/social-network/twitter-black.png') }}" alt="slide 2">
                        </a>


                        <a target="_blank"
                            href="http://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $article->article_name }}&summary={{ url($article->article_cover) }}">
                            <img class="social-linkedin"
                            src="{{ asset('images/social-network/linkedin.png') }}"
                            data-src="{{ asset('images/social-network/linkedin.png') }}"
                            data-hover="{{ asset('images/social-network/linked-black.png') }}" alt="slide 2">
                        </a>

                        <a href="mailto:?subject=I wanted you to see this site&amp;body={{url()->current()}}"
                            title="Event: {{ $article->article_name }}">
                            <img class="social-gmail"
                            src="{{ asset('images/social-network/gmail.png') }}"
                            data-src="{{ asset('images/social-network/gmail.png') }}"
                            data-hover="{{ asset('images/social-network/gmail-black.png') }}" alt="slide 2">
                        </a>

                    </div>

                </div>

                

                @if(count($article_contents)> 1) 
                    @foreach($article_contents as $key => $value)

                        @if(strip_tags($value) != "" && $key != 0)
                        <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4 additional-text">
                            @php
                            $counter++;
                            @endphp
                            <div class="card">
                                <div class="col-9 montserrat-regular">
                                    
                                    <p>
                                        {!! $value !!}
                                    </p>
                                    
                                </div>
        
        
                            </div>
        
                        </div>
                        @endif
                    @endforeach
                @endif


                <!-- had fadeInRight class -->
                <div class="carousel-item carousel-item-gallery col-md-4 p-0 col-lg-4 animation-duration2 last-slide">
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
                <div class="carousel-item carousel-item-gallery p-0 col-md-4 col-lg-4 animation-duration2">
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
    <div class="carousel-controls-main animation-duration2" id="event-news">
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
<script src=" {{ asset('assets/js/hover.js') }}"></script>
<script>


$(".close-gallery").click(function(e) {

$(this).removeClass('fadeInDown').addClass('fadeOutUp');
setTimeout(function() {
  window.location.href = "{{url()->previous() }}";
});
});
</script>
@endsection