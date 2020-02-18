@extends('layout.app')

@section('content')

<div class="row">
    @if(Session::has('success'))
        <div class="col-12 text-center alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('success') }}
        </div>

    @elseif(Session::has('error'))
        <div class="col-12 text-center alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('error') }}
        </div>
    @endif
</div>

<form id="register" action="" enctype="multipart/form-data" method="POST" class="">
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
                        value="{{ Auth::user()->gallery_name }}">
                </div>


                <div class=" col-4 text-center">
                    <input type="text" name="city_country" class="form-control text-center border-0"
                        placeholder="City/Country" value="{{ Auth::user()->city_country }}">


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
    </div>



<div class="row p-0">
    <div class="gallery-wraper col-12 p-0">
        <div class="col-12  border-bottom">
            <div class="row elements-mid-align">
                <div class="col-md-2">

                </div>

                <div class=" col-8 text-left">
                    <input type="text" class="form-control border-0" name="curator_name" placeholder="Curator name"
                        value="{{ Auth::user()->name }}">
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
                        id="about_gallery">{{ Auth::user()->about_gallery }}</textarea>
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
                        value="{{ Auth::user()->website }}">
                </div>


                <div class="col-md-2">

                </div>
            </div>



        </div>

    </div>
</div>
</form>

    <div class="row mt-5">
        <div class="col-12 text-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="my-btn mr-2">SAVE CHANGES</button>
                <a href="{{ route('add.new.event') }}">
                    <button class="my-btn">ADD EVENT</button>
                </a> 
                <button class="my-btn ml-2">ADD ARTICLE</button>
            </div>
        </div>
    </div>

    <!--end event-->


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