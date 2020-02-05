@if(isset($data))
    @php
        $counter = 0;
        // $next_id=$next->id;

    @endphp

<div class="carousel-inner carousel-inner-gallery w-140 transform-img p-0 m-0 next-id" role="listbox" next-id = {{ $next->id }}>




    <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4 active" style="visibility: hidden">
        
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ 'images/galleries/logo.png' }}" alt="slide 1">
        </div>
    </div>


    <div class="carousel-item carousel-item-gallery  animation-duration2 fadeInUp col-md-4 col-lg-4">
        @php
            $counter ++;
        @endphp
        <div class="card">
            <div class="gallery-first-slide montserrat-regular">
                <p>{{ strtoupper(date('d M', strtotime($data->gallery_open))) }} -
                    {{ strtoupper(date('d M Y', strtotime($data->gallery_closed ))) }}</p>
                <p>
                    <h1 class="montserrat-bold"> {{ $data->gallery_name }}</h1>
                </p>
                <p>@ {{ $data->gallery_place }}</p>
                <p> {{ $data->gallery_description }} </p>

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


    <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
        @php
            $counter++;
        @endphp
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ 'images/galleries/'.$data->gallery_cover }}"
                alt="slide 2">

        </div>

    </div>


    @if(isset($data->gallery_img))
        @php
            $counter++;
        @endphp
    <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ 'images/galleries/'.$data->gallery_img }}"
                alt="slide 2">

        </div>

    </div>
    @endif

    @if(isset($data->gallery_img_2))
        @php
            $counter++;
        @endphp
    <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ 'images/galleries/'.$data->gallery_img_2 }}"
                alt="slide 2">

        </div>

    </div>
    @endif

    @if(isset($data->gallery_img_3))
        @php
            $counter++;
        @endphp
    <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ 'images/galleries/'.$data->gallery_img_3 }}"
                alt="slide 2">

        </div>

    </div>
    @endif

    <div class="carousel-item carousel-item-gallery  col-md-4 col-lg-4">
        @php 
            $counter++;
        @endphp
        <div class="card">
            {{-- <p>NEXT <b>{{ $counter}}</b></p> --}}

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
            @for ($i = 0; $i < $counter; $i++)
                <li data-target="#carouselExample2" data-slide-to="{{ $i }}" class = "{{ ($i == 0) ? 'active': '' }}"></li>
            @endfor
       
        </ol>
    </div>

@endif