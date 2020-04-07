@extends('layout.app')

@section('css')
<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">


@endsection

@section('logo-img')
<img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">

@endsection
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
</div>
<div class="row">
    <div class="col-12">
        <form id="register" action="" enctype="multipart/form-data" method="POST" class="">
            @csrf
            <!--Add event-->
            <div class="row">

                <div class="col-12 border-bottom border-top ">

                    <div class="row elements-mid-align h-80px h-100px border-bottom">
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
                                placeholder="{{__("gallery_name")}}" value="{{ Auth::user()->gallery_name }}">
                        </div>


                        <div class=" col-8 offset-2 col-lg-4 offset-lg-0 text-lg-center">
                            <input type="text" name="city_country" class="form-control text-lg-center border-0"
                                placeholder="City/Country" value="{{ Auth::user()->city_country }}">


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

                <div class="gallery-wraper col-12 ">

                    <!--Currator name -->
                    <div class="row elements-mid-align h-80px h-100px border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="text" class="form-control border-0" name="curator_name"
                                placeholder="{{__("curator")}}" value="{{ Auth::user()->name }}">
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
                    <div class="row elements-mid-align d-none d-lg-flex h-80px h-100px border-bottom">
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
                                <input type="file" name="gallery_cover" id="gallery_cover2" />
                            </div>
                        </div>


                        <div class=" col-7">

                            <textarea class="form-control border-0" name="about_gallery"
                                placeholder="{{__("about_gallery")}}" maxlength="3500" onkeyup="charCount(this)"
                                id="about_gallery">{{ Auth::user()->about_gallery }}</textarea>
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

                    <!--Gallery password -->
                    <div class="row elements-mid-align d-none d-lg-flex h-80px h-100px border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="password" name="password" class="form-control border-0"
                                placeholder="{{__("password")}}">
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
                    <div class="row elements-mid-align d-none d-lg-flex h-80px h-100px border-bottom">
                        <div class="col-2">

                        </div>

                        <div class=" col-8 text-left">
                            <input type="input" class="form-control border-0" name="website"
                                placeholder="{{__("website")}}" value="{{ Auth::user()->website }}">
                        </div>


                        <div class="col-2">

                        </div>
                    </div>



      





                </div>
            </div>




        </form>
    </div>
</div>


<div class="row mt-5">
    <div class="col-12 text-center mt">
        <div class="btn-group" role="group" aria-label="Basic example">

            <button class="my-btn-2 mr-2 update-gallerist">{{__("save_changes")}}</button>


            <a href="{{ route('add.new.event', app()->getLocale()) }}">
                <button class="my-btn-2">{{__("add_event")}}</button>
            </a>
            <a href="{{ route('add.new.article', app()->getLocale()) }}">
                <button class="my-btn-2 ml-2">{{__("add_article")}}</button>
            </a>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src=" {{ asset('plugins/toastr/toastr.min.js') }}"></script>

<script>
    $( ".update-gallerist" ).click(function(e) {
        var form = document.getElementById('register');

        var formData = new FormData(form);
        var gallerist_id = "{{ Auth::user()->id }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('gallerist.dashboard', app()->getLocale()) }}",
            method: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            data:formData,

            success: function(response){
                if (typeof response.message != "undefined" && response.message.length) {
                        toastr[response.message[0]](response.message[1]);
                    }
                //$('#content').html(data.html);
            },
            error: function (request, status, error) {
                alert("error! Contact us!");
            }
        });
    });

</script>

@endsection