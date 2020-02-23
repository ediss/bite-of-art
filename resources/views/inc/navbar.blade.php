<div class="row h-80px h-100px m-auto">
    <div class="col-12 p-0">
        <nav class="navbar navbar-light  lighten-4  w-100 p-0">
            <div class="col-12 p-0">
                <div class="row">
                    <div class="col-4 p-0">
                        <div class="logo">
                            <a class="navbar-brand m-auto p-0 h-80px h-100px" href="{{ url('/') }}">
                                @yield('logo-img')
                            </a>
                        </div>
                    </div>

                    <div class="col-4 text-center m-auto">
                        <div class="live infinite pulse animated">
                            <a class="navbar-brand m-auto" href="https://www.youtube.com" target="_blank">
                                <img src="{{ asset('images/live.png') }}" class="img-fluid" alt="live" id="flip">
                            </a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="button_container" id="toggle">
                            <span class="top"></span>
                            <span class="middle"></span>
                            <span class="bottom"></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="ml-auto bg-dark-mobile overlay " id="overlay">
                <div class="row h-100px m-auto">
                    <div class="col-12">
                        <div class="row h-80px">
                            <div class="col-4 m-auto p-0">
                                <div class="logo">
                                    <a class="navbar-brand m-auto p-0 h-80px h-100px" href="{{ url('/') }}">
                                        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 text-center m-auto d-lg-none">
                                    <div class="row montserrat-regular login">
                                        @if (Auth::check())
                                            <div class="col-6 m-auto p-0">
                                                <a href="{{ route('logout') }}" class="">LOGOUT <span class="ml-3 mr-3 d-none d-md-block menu-span">|</span></a>
                                            </div>
                                            <div class="col-6 m-auto p-0"> <a href="{{ route('gallerist.dashboard') }}" class="">ACCOUNT</a></div>
                                        @else
                                            <div class="col-6 m-auto p-0">
                                                <a href="{{ route('login') }}" class="">LOG IN <span class="ml-3 mr-3 d-none d-md-block menu-span">|</span></a>
                                            </div>
                                            <div class="col-6 m-auto p-0"><a href="{{ route('register') }}" class="">BITE MEMBERSHIP</a></div>

                                        @endif
                                    </div>
                                {{-- <div class="col-10 text-right montserrat-regular login">


                                </div> --}}
                            </div>

                            <div class="col-8 d-none d-lg-block">
                                <div class="row m-35px">
                                    @if (Auth::check())
                                        <div class="col-12 text-right montserrat-regular login">
                                            <a href="{{ route('logout') }}" class="">LOGOUT</a>
                                                <span class="ml-3 mr-3 menu-span">|</span>
                                            <a href="{{ route('gallerist.dashboard') }}" class="">ACCOUNT</a>
                                        </div>
                                    @else
                                        <div class="col-12 text-right montserrat-regular login-membership login">
                                            <a href="{{ route('login') }}" class="">LOG IN</a>
                                                <span class="ml-3 mr-3 menu-span">|</span>
                                            <a href="{{ route('register') }}" class="">BITE MEMBERSHIP</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-2"></div>



                        </div>
                    </div>


                </div>


                <div class="menu-links">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link h-100px text-center" href="{{ route('all.news') }}">
                                <span class="sr-only">(current)</span>NEWS
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link h-100px text-center" href="about-bite.html">ABOUT BITE </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link h-100px text-center" href="bitenetwork.html">BITE NETWORK</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link h-100px text-center" href="{{ route('contact') }}">CONTACT</a>
                        </li>

                    </ul>
                </div>

                <div class="row languages">
                    <div class="col-6 offset-3 col-md-4 offset-md-4 montserrat-regular">
                        <div class="menu-footer text-center login">
                            <a href="#" class=" active-language">ENG</a> <span class="ml-1 mr-1 menu-span">|</span>
                            <a href="#" class="">SPAN</a> <span class="ml-1 mr-1 menu-span">|</span>
                            <a href="#" class="">SERB</a> <span class="ml-1 mr-1 menu-span">|</span>
                            <a href="#" class="">SLN</a> <span class="ml-1 mr-1 menu-span">|</span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</div>