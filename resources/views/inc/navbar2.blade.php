<nav class="navbar navbar-light col-12 lighten-4 h-100px p-0">
  
  <div class="row" style="flex-grow:1">
      <div class="col-4 ">
          <a class="navbar-brand h-10s0px m-auto" href="#">
              <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
            </a>
      </div>
      <div class="col-4 text-center">
          <a class="navbar-brand h-10s0px m-auto text-center" href="#">
              <img src="{{ asset('images/live.png') }}" class="img-fluid" alt="">
            </a>
      </div>
      <div class="col-4">
          {{-- <a class="navbar-brand h-10s0px m-auto text-center" href="#">
              <span class="top"></span>
              <span class="middle"></span>
              <span class="bottom"></span>
            </a> --}}
          <div class="button_container m-auto" id="toggle">
              <span class="top"></span>
              <span class="middle"></span>
              <span class="bottom"></span>
          </div>
      </div>
        
  </div>
  
  <div class="ml-auto bg-dark-mobile overlay " id="overlay">
      <div class="row h-100px">
          <div class="col-4 col-md-6 h-100px">
              <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-8 col-md-6">
              <div class="row m-35px">
                  <div class="col-10 text-right montserrat-regular login">
                      @if (Auth::check())
                      <a href="{{ route('logout') }}" class="">LOGOUT</a>
                      <span class="ml-3 mr-3 menu-span">|</span>
                      <a href="{{ route('gallerist.dashboard') }}" class="">ACCOUNT</a>
                      @else
                      <a href="{{ route('login') }}" class="">LOG IN</a>
                      <span class="ml-3 mr-3 menu-span">|</span>
                      <a href="{{ route('register') }}" class="">BITE MEMBERSHIP</a>
                      @endif


                  </div>
              </div>
          </div>

      </div>


      <div class="menu-links">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link h-100px text-center" href="news.html">
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
                  <a class="nav-link h-100px text-center" href="contact.html">CONTACT</a>
              </li>

          </ul>
      </div>

      <div class="row languages">
          <div class="col-md-4 offset-4 montserrat-regular">
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