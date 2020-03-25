@extends('layout.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
@endsection

@section('logo-img')
<div class="close-gallery animation-duration2 fadeInDown"></div>
@endsection

@section('content')
<div class="row">


    @php
    $counter = 0;
    @endphp

    <div class="col-12 p-0">
        <div id="myCarouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item  active  col-lg-8 offset-lg-2 animation-duration2 fadeInUp about-first">
                    @php
                    $counter++;
                    @endphp
                    <div class="row">
                        <div class="col-12  text-justify">
                            <h1 class="montserrat-bold text-center">About BITE of art</h1>

                            <p class="montserrat-regular mt-5">The <b>BITE of Art </b> initiative represents a joint
                                vision
                                of cultural and artistic institutions and organizations coming from Spain, Slovenia and
                                Serbia to bring innovative practices into work of cultural operators, and indirectly to
                                contemporary artists, shaping a path for mainstreaming contemporary art among young
                                citizens. Our aim is to transform promotion and attractiveness of the contemporary art
                                among audience by application of the digital communication technologies and the new
                                approaches in informing and attracting audience, as well as in enhancing artwork
                                presentation.
                            </p>
                            <p class="montserrat-regular">Under the <i>BITE of Art </i> umbrella, we are gathering all
                                those who can contribute to this goal, on the first place cultural operators,
                                individuals, various organisations and companies. We started from Serbia, Spain and
                                Slovenia, with the strong intention to further expand this initiative in Europe.</p>
                            <p class="montserrat-regular">The European Union supported BITE of Art initiative by
                                co-financing project for development and piloting unique BITE communication model
                                through the Creative Europe 2019 programme.</p>

                        </div>

                    </div>
                </div>

                <div class="carousel-item  col-6 offset-3 ">
                    @php
                    $counter++;
                    @endphp

                    <div class="row">
                        <div class="col-12">
                            <a target="_blank" href="https://ec.europa.eu/programmes/creative-europe/node_en">
                                <img class="img-fluid  d-block gallery-img about-europe"
                                    src="{{ asset('images/about/partners-cb/creative_europe.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/creative_europe.png') }}"
                                    data-hover="{{ asset('images/about/partners/creative_europe.png') }}" alt="slide 2">
                            </a>



                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-4">
                            <a target="_blank" href="http://bum.org.rs/">
                                <img class="img-fluid  d-block gallery-img about-bum"
                                    src="{{ asset('images/about/partners-cb/BUM.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/BUM.png') }}"
                                    data-hover="{{ asset('images/about/partners/BUM.png') }}" alt="slide 2">
                            </a>

                        </div>

                        <div class="col-4"></div>

                        <div class="col-4">
                            <a target="_blank" href="https://www.tipovej.org/">
                                <img class="img-fluid  d-block gallery-img about-tripovej"
                                    src="{{ asset('images/about/partners-cb/Tipovej_Slovenia.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/Tipovej_Slovenia.png') }}"
                                    data-hover="{{ asset('images/about/partners/Tipovej_Slovenia.png') }}"
                                    alt="slide 2">
                            </a>

                            <a target="_blank" href="https://www.mladizmaji.si/en/">
                                <img class="img-fluid  d-block gallery-img about-zmaji"
                                    src="{{ asset('images/about/partners-cb/mladi_zmaji.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/mladi_zmaji.png') }}"
                                    data-hover="{{ asset('images/about/partners/mladi_zmaji.png') }}" alt="slide 2">
                            </a>



                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-4 ">
                            <a target="_blank" href="http://www.backslash.es/">
                                <img class="img-fluid  d-block gallery-img about-blackslash"
                                    src="{{ asset('images/about/partners-cb/Backslash.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/Backslash.png') }}"
                                    data-hover="{{ asset('images/about/partners/Backslash.png') }}" alt="slide 2">
                            </a>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <a target="_blank" href="http://communications.rs/">
                                <img class="img-fluid  d-block gallery-img about-colormedia"
                                    src="{{ asset('images/about/partners-cb/color_media.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/color_media.png') }}"
                                    data-hover="{{ asset('images/about/partners/color_media.png') }}" alt="slide 2">
                            </a>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-4 ">
                            <a target="_blank" href="http://connect-international.org/en/">
                                <img class="img-fluid  d-block gallery-img about-connect"
                                    src="{{ asset('images/about/partners-cb/Connect_logo.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/Connect_logo.png') }}"
                                    data-hover="{{ asset('images/about/partners/Connect_logo.png') }}" alt="slide 2">
                            </a>

                            <a target="_blank" href="https://www.kcb.org.rs/">
                                <img class="img-fluid  d-block gallery-img about-kcb"
                                    src="{{ asset('images/about/partners-cb/Kulturni_centar_BGD.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/Kulturni_centar_BGD.png') }}"
                                    data-hover="{{ asset('images/about/partners/Kulturni_centar_BGD.png') }}"
                                    alt="slide 2">
                            </a>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <a target="_blank" href="https://www.consorcimuseus.gva.es/">
                                <img class="img-fluid  d-block gallery-img about-valencia"
                                    src="{{ asset('images/about/partners-cb/Valencia_Museums.png') }}"
                                    data-src="{{ asset('images/about/partners-cb/Valencia_Museums.png') }}"
                                    data-hover="{{ asset('images/about/partners/Valencia_Museums.png') }}"
                                    alt="slide 2">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item  col-8 offset-2 about-last">
                    @php
                    $counter++;
                    @endphp

                    <img class="img-fluid  d-block gallery-img" src="{{ asset('images/about/BITEAB.jpg') }}"
                        alt="slide 2">



                </div>

            </div>

        </div>

        <!-- UNDER FOR COMMENT ONLY FOR PRESENTATION -->


    </div>

    <div class="carousel-controls-main">
        <a class="carousel-control-prev" href="#myCarouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators">

            @for ($i = 0; $i < $counter; $i++) <li data-target="#myCarouselExampleIndicators" data-slide-to="{{ $i }}"
                {{ ($i == 0) ? "class=active" : ""}}>
                </li>
                @endfor

        </ol>
    </div>
</div>




@endsection

@section('footer-scripts')


<script src=" {{ asset('assets/js/about.js') }}"></script>

<script>
    $('.footer').css('display', 'none');
</script>

@endsection