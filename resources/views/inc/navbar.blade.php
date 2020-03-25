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
                        @if(isset($live))
                        <div class="live infinite pulse animated">
                            <a class="navbar-brand m-auto" href="https://www.youtube.com" target="_blank">
                                <img src="{{ asset('images/live.png') }}" class="img-fluid" alt="live" id="flip">
                            </a>
                        </div>
                        @endif
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
                                        <a href="{{ route('logout', app()->getLocale()) }}" class="">LOGOUT <span
                                                class="ml-3 mr-3 d-none d-md-block menu-span">|</span></a>
                                    </div>
                                    <div class="col-6 m-auto p-0"> <a
                                            href="{{ route('gallerist.dashboard', app()->getLocale()) }}"
                                            class="">ACCOUNT</a></div>
                                    @else
                                    <div class="col-6 m-auto p-0">
                                        <a href="{{ route('login', app()->getLocale()) }}" class="">LOG IN <span
                                                class="ml-3 mr-3 d-none d-md-block menu-span">|</span></a>
                                    </div>
                                    <div class="col-6 m-auto p-0"><a href="{{ route('register', app()->getLocale()) }}"
                                            class="">BITE MEMBERSHIP</a></div>

                                    @endif
                                </div>
                                {{-- <div class="col-10 text-right montserrat-regular login">


                                </div> --}}
                            </div>

                            <div class="col-8 d-none d-lg-block">
                                <div class="row m-35px">
                                    @if (Auth::check())
                                    <div class="col-12 text-right montserrat-regular login-membership login">
                                        <a href="{{ route('logout', app()->getLocale()) }}" class="">@lang("logout")</a>
                                        <span class="ml-3 mr-3 menu-span">|</span>
                                        <a href="{{ route('gallerist.dashboard', app()->getLocale()) }}"
                                            class="">@lang("account")</a>
                                    </div>
                                    @else
                                    <div class="col-12 text-right montserrat-regular login-membership login">
                                        <a href="{{ route('login', app()->getLocale()) }}" class="">@lang("login")</a>
                                        <span class="ml-3 mr-3 menu-span">|</span>
                                        <a href="{{ route('register', app()->getLocale()) }}" class="">@lang("bite_membership")</a>
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
                            <a class="nav-link h-100px text-center" href="{{ route('all.news', app()->getLocale()) }}">
                                <span class="sr-only">(current)</span>@lang('news')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link h-100px text-center"
                                href="{{ route('about.bite', app()->getLocale()) }}">@lang('about_bite') </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link h-100px text-center" href="#">@lang('bite_network')</a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link h-100px text-center"
                                href="{{ route('contact', app()->getLocale()) }}">@lang('contact')</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link h-100px text-center"
                                href="{{ route('opened.event', ['language' => app()->getLocale(), 'id' => 25]) }}">TEST</a>
                        </li> --}}

                    </ul>
                </div>

                <div class="row languages">
                    <div class="col-6 offset-3 col-md-4 offset-md-4 montserrat-regular">
                        <div class="menu-footer text-center login">


                            @foreach (config('app.available_languages') as $language)
                            @if(\Illuminate\Support\Facades\Route::currentRouteName() == "opened.event" || \Illuminate\Support\Facades\Route::currentRouteName() == "opened.news")
                            <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['language'=> $language, 'id' => $url_id] ) }}" class=" {{(app()->getLocale() == $language) ? 'active-language' : ''}} ">
                                {{strtoupper($language)}}
                            </a>

                            @else
                            <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $language ) }}" class=" {{(app()->getLocale() == $language) ? 'active-language' : ''}} ">
                                {{strtoupper($language)}}
                            </a>
                            @endif

                            <span class="ml-1 mr-1 menu-span">|</span>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</div>