@extends('layout.app')



@section('logo-img')
<div class="close-gallery animation-duration2 fadeInDown"></div>
@endsection

@section('content')
<div class="row">
    @if(Session::has('success'))
    <div class="col-12 text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}
    </div>
    @elseif(Session::has('error'))
    <div class="col-12 text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}
    </div>
    @endif
</div>
<div class="row">
    <div class="col-12">
        <form id="register" action="{{ route('register', app()->getLocale()) }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="row">
                <!--Gallery name -->
                <div class="col-12 border-bottom border-top">
                    <div class="row elements-mid-align h-80px h-100px">

                        <div class="col-2">
                            @if ( $validator && $validator->errors()->first('gallery_name') )
                            <div class="alert alert-danger text-center mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $validator->errors()->first('gallery_name') }}
                            </div>
                            @endif
                        </div>

                        <div class=" col-10 col-lg-2 text-left">
                            <input type="text" class="form-control border-0" name="gallery_name"
                                placeholder="{{__("gallery_name")}}" value="{{ Request::get('gallery_name') }}" autofocus>
                        </div>


                        <div class=" col-8 offset-2 col-lg-4 offset-lg-0 text-lg-center">
                            <input type="text" name="city_country" class="form-control text-lg-center border-0"
                                placeholder="City/Country" value="{{ Request::get('city_country') }}">


                        </div>

                        <div class="col-2">
                            @if ( $validator && $validator->errors()->first('city_country') )
                            <div class="alert alert-danger mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $validator->errors()->first('city_country') }}
                            </div>
                            @endif
                        </div>

                    </div>
                </div>



                <div class="gallery-wraper col-12">

                    <!--Currator name -->
                    <div class="row elements-mid-align h-80px h-100px  border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="text" class="form-control border-0" name="curator_name"
                                placeholder="{{__("curator")}}" value="{{ Request::get('curator_name') }}">
                        </div>




                        <div class="col-2">
                            @if ( $validator && $validator->errors()->first('curator_name') )
                            <div class="alert alert-danger text-center mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $validator->errors()->first('curator_name') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <!--About Gallery -->
                    <div class="row elements-mid-align h-80px h-100px  border-bottom">
                        <div class="col-1">
                            @if ( $validator && $validator->errors()->first('gallery_cover') )
                            <div class="alert alert-danger text-center mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $validator->errors()->first('gallery_cover') }}
                            </div>
                            @endif
                        </div>

                        <div class=" col-1 text-left">
                            <div class="upload-btn-wrapper">
                                <button class="my-btn">{{__("upload_cover")}}</button>
                                <input type="file" name="gallery_cover" id="gallery_cover" />
                            </div>
                        </div>


                        <div class=" col-7">

                            <textarea class="form-control border-0" name="about_gallery" placeholder="{{__("about_gallery")}}"
                                maxlength="2000" onkeyup="charCount(this)"
                                id="about_gallery">{{ Request::get('about_gallery') }}</textarea>
                        </div>

                        <div class="col-1">
                            <span class="float-left"></span>
                        </div>

                        <div class="col-2">
                            @if ( $validator && $validator->errors()->first('about_gallery') )
                            <div class="alert alert-danger text-center mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $validator->errors()->first('about_gallery') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <!--Gallery email -->
                    <div class="row elements-mid-align h-80px h-100px border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="email" class="form-control border-0" name="email"
                                placeholder="email@gallery.com" value="{{ Request::get('email') }}">
                        </div>




                        <div class="col-2">
                            @if ( $validator && $validator->errors()->first('email') )
                            <div class="alert alert-danger text-center mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $validator->errors()->first('email') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <!--Gallery password -->
                    <div class="row elements-mid-align h-80px h-100px border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="password" name="password" class="form-control border-0" placeholder="{{__("password")}}">
                        </div>


                        <div class="col-2">
                            @if ( $validator && $validator->errors()->first('password') )
                            <div class="alert alert-danger text-center mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $validator->errors()->first('password') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <!--Gallery website -->
                    <div class="row elements-mid-align h-80px h-100px border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="text" class="form-control border-0" name="website" placeholder="{{__("website")}}"
                                value="{{ Request::get('website') }}">
                        </div>


                        <div class="col-2">

                        </div>
                    </div>

                    <!--Gallery media link -->
                    <div class="row elements-mid-align h-80px h-100px border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="text" class="form-control border-0" name="media_link" placeholder="{{__("media_link")}}"
                                value="{{ Request::get('media_link') }}">
                        </div>


                        <div class="col-2">

                        </div>
                    </div>

                    <!--Gallery  cover-->
                    <div class="row elements-mid-align h-80px h-100px border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-7 text-left">
                            <textarea class="form-control border-0" name="cover_letter" placeholder="{{__("cover_letter")}}"
                                maxlength="3500" onkeyup="charCount(this)"
                                id="cover_letter">{{ Request::get('cover_letter') }}</textarea>
                        </div>

                        <div class="col-1">
                            <span class="float-left"></span>
                        </div>

                        <div class="col-2">
                            @if ( $validator && $validator->errors()->first('cover_letter') )
                            <div class="alert alert-danger text-center mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $validator->errors()->first('cover_letter') }}
                            </div>
                            @endif
                        </div>
                    </div>



                </div>



                <div class="col-12 text-center h-80px h-100px">
                    <div class="next-btn mt-4">
                        <button class="my-btn-2">{{__("submit")}}</button>
                        {{-- <input type="file" name="event_cover" id="event_cover" /> --}}
                    </div>
                </div>


            </div>
        </form>
    </div>
</div>
@endsection

@section('footer-scripts')
<script>

    $(".footer").hide();
    $(".close-gallery").click(function(e) {

      $(this).removeClass('fadeInDown').addClass('fadeOutUp');
      setTimeout(function() {
        window.location.href = "{{url()->previous() }}";
      });
  });
</script>
@endsection