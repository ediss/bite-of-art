@extends('layout.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />

{{-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}" /> --}}
{{-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style2.css')}}" /> --}}
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
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner p-5 ml-4">
                <div class="carousel-item  ">
                    <h1 class="montserrat-bold pl-4">About BITE of art</h1>
                    <div class="row mt-5">
                        <div class="col-8">
                            <p class="montserrat-regular  pl-4 pr-4" style="font-size:25px; text-align: justify;
                            text-justify: inter-word;">
                                The BITE of Art initiative represents a joint vision of cultural and artistic
                                institutions and organizations coming from Spain, Slovenia and Serbia to bring
                                innovative practices into
                                work of
                                cultural operators, and indirectly to contemporary artists, shaping a path for
                                mainstreaming
                                contemporary art among young citizens. Our aim is to transform promotion and
                                attractiveness
                                of the contemporary art among audience by application of the digital communication
                                technologies and the new approaches in informing and attracting audience, as well as in
                                enhancing artwork presentation.
                            </p>
                            <p class="montserrat-regular pl-4" style="font-size:25px">
                                Under the BITE of Art umbrella, we are gathering all those who can contribute to this
                                goal, on
                                the rst place cultural operators, individuals, various organisations and companies. We
                                started
                                from Serbia, Spain and Slovenia, with the strong intention to further expand this
                                initiative in
                                Europe.
                            </p>
                        </div>
                    </div>

                    <div class=" social-scale2 p-4">

                        <img class="" src="{{ asset('images/social-network/facebook.png') }}">
                        <img class="ml-4" src="{{ asset('images/social-network/pinterest.png') }}">
                        <img class="ml-4" src="{{ asset('images/social-network/twitter.png') }}">
                        <img class="ml-4" src="{{ asset('images/social-network/linkedin.png') }}">
                        <img class=" ml-4" src="{{ asset('images/social-network/gmail.png') }}">
                    </div>


                </div>
                <div class="carousel-item">

                    <div class="row mt-5">
                        <div class="col-8">
                            <p class="montserrat-regular  pl-4 pr-4" style="font-size:25px; text-align: justify;
                            text-justify: inter-word;">
                                BITE of Art project is running by the consortium of organization and companies from 4
                                countries:
                            </p>
                            <p class="montserrat-regular pl-4" style="font-size:25px">
                                The European Union supported BITE of Art initiative by co-nancing project for
                                development
                                and piloting unique BITE communication model through the Creative Europe 2019 programme.

                                <ul class="montserrat-regular" style="font-size:20px">
                                    <li>Balkan Urban Movement (RS) (lead organization),</li>
                                    <li>Color Media Communications (RS),</li>
                                    <li>Belgrade Cultural Center (RS),</li>
                                    <li>Consorci de Museus de la Comunitat Valenciana (ES),</li>
                                    <li>Backslash (ES),</li>
                                    <li>Javni Zavod Mladi Zmaji (SL),</li>
                                    <li>TiPovej! (SL),</li>
                                    <li>CONNECT International (BE).</li>
                                </ul>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="carousel-item active text-center">
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h3 class="montserrat-bold">Experience unique BITE of Art content:</h3>
                        </div>
                    </div>

                    <div class="row mt-5 montserrat-bold">
                        <div class="col-8 offset-2 mt-5">
                            <div class="row text-center mt-5">
                                <div class="col-3">
                                    <img src="{{ asset('images/about/virtual_curator.png') }}" alt="">
                                    <h3>Your private virtual curator</h3>
                                </div>
                                <div class="col-3 text-center">
                                    <img src="{{ asset('images/about/virtual_tour.png') }}" alt="">
                                    <h3 class="ml-3">360&#176; <br> virtual tour</h3>
                                </div>
                                <div class="col-3">
                                    <img src="{{ asset('images/about/events.png') }}" alt="">
                                    <h3>Events</h3>
                                </div>
                                <div class="col-3">
                                    <img src="{{ asset('images/about/news.png') }}" alt="">
                                    <h3>News</h3>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-5 montserrat-bold">
                            <div class="col-8 offset-2 mt-5 text-center">
                                    <div class="row text-center mt-5">
                                        <div class="col-12">
                                                <h3>Instagram @biteof.art</h3>
                                        </div>
                                        
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-12">
                                                <h3>Facebook @biteofartofficial</h3>
                                        </div>
                                        
                                    </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

</div>

<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>

<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
</div>
@endsection

@section('footer-scripts')
<script>
    $('.footer').css('display', 'none');
</script>
<script src=" {{ asset('assets/js/opened-event.js') }}"></script>
@endsection