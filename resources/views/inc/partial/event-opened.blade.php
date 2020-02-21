@if(isset($data))
    @php
        $counter = 0;
        // $next_id=$next->id;
    @endphp




<div class="carousel-inner carousel-inner-gallery transform-img p-0 m-0 next-id" role="listbox" {{ $next ? 'next-id='.$next->id : '' }}>




    {{-- <div class="carousel-item carousel-item-gallery d-none d-lg-block col-1  col-lg-4 active" style="visibility: hidden">
        
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ 'images/galleries/logo.png' }}" alt="slide 1">
        </div>
    </div> --}}


    <div class="carousel-item carousel-item-gallery  animation-duration2 fadeInUp col-12  col-lg-4 active">
        @php
            $counter ++;
        @endphp
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


    <div class="carousel-item carousel-item-gallery  p-0 p-lg-2 col-12  col-lg-4">
        @php
            $counter++;
        @endphp
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ $data->event_cover }}"
                alt="slide 2">

        </div>

    </div>


    @if(isset($data->event_img_1))
        @php
            $counter++;
        @endphp
    <div class="carousel-item carousel-item-gallery p-0 p-lg-2 col-12  col-lg-4">
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ $data->event_img_1 }}"
                alt="slide 2">

        </div>

    </div>
    @endif

    @if(isset($data->event_img_2))
        @php
            $counter++;
        @endphp
    <div class="carousel-item carousel-item-gallery p-0 p-lg-2  col-12  col-lg-4">
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ $data->event_img_2 }}"
                alt="slide 2">

        </div>

    </div>
    @endif

    @if(isset($data->event_img_3))
        @php
            $counter++;
        @endphp
    <div class="carousel-item carousel-item-gallery p-0 p-lg-2 col-12  col-lg-4">
        <div class="card">
            <img class="img-fluid  d-block gallery-img" src="{{ $data->event_img_3 }}"
                alt="slide 2">

        </div>

    </div>
    @endif

    <div class="carousel-item carousel-item-gallery  col-12  col-lg-4">
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

@section('footer-scripts')
    <script>
        $(document).ready(function() {
            $("#carouselExample2").carousel();
        });
        

    </script>
@endsection