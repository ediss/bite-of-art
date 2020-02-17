@extends('layout.app')

@section('content')
<div class="row">
    @if(Session::has('success'))
        <div class="col-12 text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</div>
    @elseif(Session::has('error'))
        <div class="col-12 text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</div>
    @endif
    <form id="register" action="{{ route('register') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <!--Add event-->
        <div class="row">

            <div class="col-md-12 border-bottom border-top ">

                <div class="row elements-mid-align">
                    <div class="col-md-2">
                        @if ( $validator && $validator->errors()->first('gallery_name') )
                        <div class="alert alert-danger text-center mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('gallery_name') }}
                        </div>
                        @endif
                    </div>

                    <div class=" col-2 text-left">
                        <input type="text" class="form-control border-0" name="gallery_name" placeholder="Gallery name"
                        value="{{ Request::get('gallery_name') }}">
                    </div>


                    <div class=" col-4 text-center">
                        <input type="text" name="city_country" class="form-control text-center border-0" placeholder="City/Country"
                        value="{{ Request::get('city_country') }}">


                    </div>

                    <div class="col-md-2">
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



            <div class="gallery-wraper row">
                <div class="col-12  border-bottom">
                    <div class="row elements-mid-align">
                        <div class="col-md-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="text" class="form-control border-0" name="curator_name" placeholder="Curator name"
                            value="{{ Request::get('curator_name') }}">
                        </div>




                        <div class="col-md-2">
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



                </div>
                <div class="col-12  border-bottom">
                    <div class="row elements-mid-align">
                        <div class="col-md-1">
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
                                <button class="my-btn">Upload Cover</button>
                                <input type="file" name="gallery_cover" id="gallery_cover" />
                            </div>
                        </div>


                        <div class=" col-8">

                            <textarea class="form-control border-0" name="about_gallery" placeholder="About gallery"
                                id="about_gallery">{{ Request::get('about_gallery') }}</textarea>
                            {{-- <span class="float-right" id="event_desc_count">700</span> --}}


                        </div>

                        <div class="col-md-2">
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



                </div>

                <div class="col-12  border-bottom">
                    <div class="row elements-mid-align">
                        <div class="col-md-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="email" class="form-control border-0" name="email" placeholder="email@gallery.com"
                            value="{{ Request::get('email') }}">
                        </div>




                        <div class="col-md-2">
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



                </div>
                <div class="col-12  border-bottom">
                    <div class="row elements-mid-align">
                        <div class="col-md-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="password" name="password" class="form-control border-0" placeholder="Password">
                        </div>


                        <div class="col-md-2">
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



                </div>
                <div class="col-12  border-bottom">
                    <div class="row elements-mid-align">
                        <div class="col-md-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="input" class="form-control border-0" name="website" placeholder="Website"
                            value="{{ Request::get('website') }}">
                        </div>


                        <div class="col-md-2">
                  
                        </div>
                    </div>



                </div>

                <div class="col-12  border-bottom">
                    <div class="row elements-mid-align">
                        <div class="col-md-2">

                        </div>

                        <div class=" col-8 text-left">
                            <textarea class="form-control border-0" name="cover_letter" placeholder="Cover letter"
                            id="cover_letter">{{ Request::get('cover_letter') }}</textarea>
                        </div>


                        <div class="col-md-2">
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

           


                <div class="col-12 text-center mt-3">

                    <div class="row w-100">
                        <div class="col-md-6 offset-3">
                            <div class="next-btn">
                                <button class="my-btn">SUBMIT</button>
                                {{-- <input type="file" name="event_cover" id="event_cover" /> --}}
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!--end event-->
    </form>
</div>
@endsection

@section('footer-scripts')
<script>
    $('.logo').hide();

    $(".close-gallery")
        .removeClass("d-none")
        .addClass(" animation-duration2 fadeInDown");

    $(".close-gallery").click(function(e) {

      $(this).removeClass('fadeInDown').addClass('fadeOutUp');
      setTimeout(function() {
        window.location.href = "{{url()->previous() }}";
      });
  });
</script>
@endsection