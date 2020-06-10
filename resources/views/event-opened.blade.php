@extends('layout.app')



@section('logo-img')
<div class="close-gallery animation-duration2 fadeInDown"></div>
@endsection

@section('content')
<div class="row">
    @if(isset($data))

    @php
    $counter = 1;
    //dd($data);
    @endphp

    <div class="col-12 p-0">




        <div id="carouselExample2" class="carousel slide" data-ride="carousel" data-interval="900000">
            <div class="carousel-inner carousel-inner-gallery  p-0 m-0 next-id" role="listbox"
                {{ $next ? 'next-id='.$next->id : 'next-id=#' }}

                data-route={{route('opened.event', ['language'=>app()->getLocale(), 'id'=> ($next) ? $next->id : $data->id ])}}>

                <div class="carousel-item carousel-item-gallery  col-1 mobile-hidden col-lg-4  active"
                    style="visibility:hidden" >

                    <div class="card">
                        <p>first_slide</p>
                    </div>
                </div>
                @php
                $counter ++;
                $langdesc = app()->getLocale();


                @endphp
                <div class="carousel-item carousel-item-gallery  animated slow fadeInUp col-12  col-lg-4 mobile-first" data-slide-id= "{{$counter}}">
                    <div class="card">
                        <div class="col-lg-9 gallery-first-slide text-justify w-100">
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
        
                                @if($data->event_description_esp != '')
                                    @php $desc = explode('~', $data->event_description_esp); @endphp
                                    @break
        
                                @endif
        
                                @default
        
                                @php $desc = explode('~', $data->event_description_en); @endphp
        
                            @endswitch
        
                            @if(strip_tags($desc[0] == ''))
                                @php $desc = explode('~', $data->event_description_en); @endphp
                            @endif
                                <p>{!! $desc[0] !!}</p>
        
                        </div>
        
                    </div>
        
                    <div class="col-lg-10 social-scale">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                            class="fb-xfbml-parse-ignore">
                            <img class="social-fb"
                            src="{{ asset('images/social-network/facebook.png') }}"
                            data-src="{{ asset('images/social-network/facebook.png') }}"
                            data-hover="{{ asset('images/social-network/fb-black.png') }}" alt="slide 2">
                        </a>
        
                        <a target="_blank"
                            href="http://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{ url($data->event_cover) }}"
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
                            href="http://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $data->event_name }}&summary={{ url($data->event_cover) }}">
                            <img class="social-linkedin"
                            src="{{ asset('images/social-network/linkedin.png') }}"
                            data-src="{{ asset('images/social-network/linkedin.png') }}"
                            data-hover="{{ asset('images/social-network/linked-black.png') }}" alt="slide 2">
                        </a>
        
                        <a href="mailto:?subject=I wanted you to see this site&amp;body={{url()->current()}}"
                            title="Event: {{ $data->event_name }}">
                            <img class="social-gmail"
                            src="{{ asset('images/social-network/gmail.png') }}"
                            data-src="{{ asset('images/social-network/gmail.png') }}"
                            data-hover="{{ asset('images/social-network/gmail-black.png') }}" alt="slide 2">
                        </a>
        
                    </div>

                </div>

                {{-- @if(strip_tags($desc[1]) != "")
                @php
                  dd(strip_tags($desc[1]));
                $counter++;
                @endphp
                <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4 " data-slide-id= "{{$counter}}">

                    <div class="card">
                        <div class="col-10">
                            {!! $desc[1] !!}
                        </div>


                    </div>

                </div>
                @endif --}}

                @php
                $counter++;
                @endphp
                <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4 " id="event_cover" data-slide-id= "{{$counter}}">

                    <div class="card">
                        <img class="img-fluid  d-block gallery-img" src="{{ url( $data->event_cover) }}" alt="slide 2">

                    </div>
                    {{-- <h5 class="montserrat-bold text-center"> {{ $data->event_name }}</h5> --}}


                </div>


                @if(isset($data->event_img_1))
                @php
                $counter++;
                @endphp
                <div class="carousel-item carousel-item-gallery p-0 col-12  col-lg-4" data-slide-id= "{{$counter}}">
                    <div class="card">
                        <img class="img-fluid  d-block gallery-img" src="{{ url($data->event_img_1) }}" alt="slide 2">
                        <p class="montserrat-bold text-center"> {{ $data->event_img_1_desc }}</p>
                    </div>


                </div>
                @endif

                @if(isset($data->event_img_2))
                @php
                $counter++;
                @endphp
                <div class="carousel-item carousel-item-gallery p-0   col-12  col-lg-4" data-slide-id= "{{$counter}}">
                    <div class="card">
                        <img class="img-fluid  d-block gallery-img" src="{{ url($data->event_img_2) }}" alt="slide 2">
                        <p class="montserrat-bold text-center"> {{ $data->event_img_2_desc }}</p>
                    </div>

                </div>
                @endif

                @if(isset($data->event_img_3))
                @php
                $counter++;
                @endphp
                <div class="carousel-item carousel-item-gallery p-0  col-12  col-lg-4" data-slide-id= "{{$counter}}">
                    <div class="card">
                        <img class="img-fluid  d-block gallery-img" src="{{ url($data->event_img_3) }}" alt="slide 2">
                        <p class="montserrat-bold text-center"> {{ $data->event_img_3_desc }}</p>
                    </div>
                </div>

                @endif


                @if(isset($data->vr_tour))
                @php
                $counter++;
                @endphp
                <div class="carousel-item carousel-item-gallery carousel-item-vr p-0  col-12  col-lg-4" data-slide-id= "{{$counter}}">
                    <div class="card">
                        <iframe height="" width="100%" allowfullscreen="true" src="{{ $data->vr_tour }}"
                            class="virtual-toure"> </iframe>

                    </div>

                </div>
                @endif

                @if(isset($data->img_360))
                @php
                $counter++;
                @endphp
                <div class="carousel-item carousel-item-gallery carousel-item-vr p-0  col-12  col-lg-4" data-slide-id= "{{$counter}}">
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

    
    <div class="carousel-controls-main " id="event-news">
        <a class="carousel-control-prev" href="#carouselExample2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators">
            @for ($i = 1; $i < $counter; $i++)
            <li data-target="#carouselExample2" data-slide-to="{{ $i }}"
                {{ ($i == 1) ? "class=active" : ""}}>
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