@extends('layout.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}" />

<script src="https://cdn.tiny.cloud/1/6lpj0hls50t5fhszqn1yu17ptqwgc31358a1egzwi0uqx4ni/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector:'textarea#event_cover_description',
        plugins: "link wordcount",
        menubar: false,
        default_link_target: "_blank",
        toolbar: "undo redo | underline bold italic|alignjustify| link "
    });
</script>

@endsection

@section('logo-img')
    <div class="close-gallery animation-duration2 fadeInDown"></div>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12 p-0">
        <!--Add event-->
        <div id="event">
        <form id="eventSubmit2" action="{{route('add.new.event', app()->getLocale())}}" enctype="multipart/form-data" method="POST" class="mb-0">
                @csrf
                <!--Add event-->
                <div class="row">

                    <!--Event Name Event Date-->
                    <div class="col-12 border-bottom border-top ">
                        <div class="row elements-mid-align h-80px h-100px border-bottom">
                            <div class="col-2 d-md-none d-lg-block d-md-none">
                                @if ( $validator && $validator->errors()->first('event_name') )
                                <div class="alert alert-danger text-center mt-2">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $validator->errors()->first('event_name') }}
                                </div>
                                @endif
                            </div>

                            <div class=" col-2 offset-md-1 offset-lg-0 text-left">
                                <input type="text" class="form-control border-0" name="event_name" placeholder="{{__("event_name") }}"
                                    value="{{ Request::get('event_name') }}">
                            </div>


                            <div class=" col-4 text-center">
                                <input type="text" name="daterange" class="form-control text-center js-datepicker-range border-0"
                                    value="{{ Request::get('daterange') }}">


                            </div>

                            <div class="col-2 d-md-none d-lg-block">
                                @if ( $validator && $validator->errors()->first('daterange') )
                                <div class="alert alert-danger mt-2">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $validator->errors()->first('daterange') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="event-wraper col-12">

                        <!--About Event -->
                        <div class="row elements-mid-align  border-bottom">
                            <div class="col-1 d-md-none d-lg-block">
                                @if ( $validator && $validator->errors()->first('event_cover') )
                                <div class="alert alert-danger text-center mt-2">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $validator->errors()->first('event_cover') }}
                                </div>
                                @endif
                            </div>

                            <div class=" col-1 col-md-2 offset-md-1 offset-lg-0 col-lg-1 text-left">
                                    <div class="upload-btn-wrapper">
                                    <button class="my-btn">{{__("upload_cover") }}</button>
                                    <input type="file" name="event_cover" id="event_cover" />
                                </div>
                            </div>


                            <div class="col-7">
                                <textarea class="form-control border-0" name="event_cover_description" placeholder="{{__("about_event") }}"
                                    maxlength="2000" onkeyup="charCount(this)"
                                    id="event_cover_description">{{ Request::get('event_cover_description') }}</textarea>
                            </div>
                            <div class="col-1">
                                <span class="float-left"></span>
                            </div>

                            <div class="col-2 d-md-none d-lg-block">
                                @if ( $validator && $validator->errors()->first('event_cover_description') )
                                <div class="alert alert-danger text-center mt-2">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $validator->errors()->first('event_cover_description') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <!--Event Additional Photos -->
                        <div class="row elements-mid-align h-80px h-100px border-bottom">
                            <div class="col-1">

                            </div>

                            <div class=" col-1 col-md-2  col-lg-1 text-left">
                                    <div class="upload-btn-wrapper">
                                    <button class="my-btn">{{__("additional_photo") }}#1</button>
                                    <input type="file" name="event_image_1" id="event_image_1">
                                </div>
                            </div>


                            <div class="col-7">
                                <textarea class="form-control border-0" name="event_image_1_desc"
                                    placeholder="{{__("additional_photo") }}#1 {{__("description") }}" maxlength="2000" onkeyup="charCount(this)"
                                    id="event_image_1_desc">{{ Request::get('event_image_1_desc') }}</textarea>
                            </div>
                            <div class="col-1">
                                <span class="float-left"></span>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>


                        <div class="row elements-mid-align h-80px h-100px border-bottom">
                            <div class="col-1">

                            </div>

                            <div class=" col-1 col-md-2  col-lg-1 text-left">
                                    <div class="upload-btn-wrapper">
                                    <button class="my-btn">{{__("additional_photo") }}#2</button>
                                    <input type="file" name="event_image_2" id="event_image_2">
                                </div>
                            </div>


                            <div class=" col-7">
                                <textarea class="form-control border-0" name="event_image_2_desc"
                                    placeholder="{{__("additional_photo") }}#2 {{__("description") }}" maxlength="2000" onkeyup="charCount(this)"
                                    id="event_image_2_desc">{{ Request::get('event_image_2_desc') }}</textarea>
                            </div>
                            <div class="col-1">
                                <span class="float-left"></span>
                            </div>
                            <div class="col-2"></div>
                        </div>


                        <div class="row elements-mid-align h-80px h-100px border-bottom">
                            <div class="col-1">

                            </div>

                            <div class=" col-1 col-md-2  col-lg-1 text-left">
                                    <div class="upload-btn-wrapper">
                                    <button class="my-btn">{{__("additional_photo") }}#3</button>
                                    <input type="file" name="event_image_3" id="event_image_3">
                                </div>
                            </div>


                            <div class="col-7">
                                <textarea class="form-control border-0" name="event_image_3_desc"
                                    placeholder="{{__("additional_photo") }}#3 {{__("description") }}" maxlength="2000" onkeyup="charCount(this)"
                                    id="event_image_3_desc">{{ Request::get('event_image_3_desc') }}</textarea>
                            </div>
                            <div class="col-1">
                                <span class="float-left"></span>
                            </div>
                            <div class="col-2"></div>
                        </div>

                        <!--Event Media Link -->
                        <div class="row elements-mid-align h-80px h-100px border-bottom">
                            <div class="col-1">

                            </div>

                            <div class=" col-4 text-left">
                                <input type="text" class="form-control  border-top-0 border-left-0 border-right-0"
                                    name="event_media" placeholder="Paste url" value="{{ Request::get('event_media') }}">
                            </div>


                            <div class="col-4">
                                <textarea class="form-control border-0" name="event_media_description"
                                placeholder="{{__("media_file")}} {{__("description") }}" maxlength="2000" onkeyup="charCount(this)"
                                    id="event_media_description">{{ Request::get('event_media_description') }}</textarea>
                            </div>
                            <div class="col-1">
                                <span class="float-left"></span>
                            </div>
                            <div class="col-2"></div>
                        </div>

                        <!--Event Note -->
                        <div class="row elements-mid-align h-80px h-100px border-bottom">
                            <div class="col-1">

                            </div>


                            <div class="col-8">
                                <textarea class="form-control border-0" name="event_note" placeholder="{{__("note")}}" maxlength="2000"
                                    onkeyup="charCount(this)" id="event_note">{{ Request::get('event_note') }}</textarea>
                            </div>
                            <div class="col-1">
                                <span class="float-left"></span>
                            </div>
                            <div class="col-2"></div>
                        </div>

                        <div class="row text-center mt-3">
                            <div class="col-12">
                                <div class="next-btn">
                                    <input type="submit" value="sacuvaj">
                                    <button class="my-btn save_event">{{__("next")}}</button>
                                    {{-- <input type="file" name="event_cover" id="event_cover" /> --}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="errors d-lg-none">



                    @if ( $validator && $validator->errors())


                    @foreach($validator->errors()->messages() as $error)
                        <div class="alert alert-danger text-center mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $error[0] }}
                        </div>

                    @endforeach


                    @endif
                </div>
                <!--end event-->
            </form>
        </div>

        <!--Add artist-->
        <div class="d-none" id="artist">

        </div>
        <!--end artist-->

        <!--Add artwork-->
        <div class="d-none" id="artwork">

        </div>
        <!--end artwork-->

        {{-- <button class="my-btn add_artist">ADD MORE ARTISTS</button> --}}
        <div id="artowrk-button" class="row d-none">
            <div class="col-12 text-center mt-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="my-btns-new mr-2 add_artwork">ADD MORE ARTWORKS</button>
                    <button class="my-btns-new next-buttons">NEXT</button>
                </div>
            </div>
        </div>

        <div id="artist-button" class="row d-none">
            <div class="col-12 text-center mt-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="my-btns-new mr-2 submit_event">SUBMIT EVENT</button>
                    <button class="my-btns-new add_artist">ADD MORE ARTISTS</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

{{-- <script src=" {{ asset('assets/js/event/add-event.js') }}"></script> --}}
<script src=" {{ asset('plugins/toastr/toastr.min.js') }}"></script>


<script>
$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

$(document).ready(function(){


    $(".close-gallery")
        .removeClass("d-none")
        .addClass(" animation-duration2 fadeInDown");

    $(".close-gallery").click(function(e) {

      $(this).removeClass('fadeInDown').addClass('fadeOutUp');
      setTimeout(function() {
        window.location.href = "{{url()->previous() }}";
      });
  });


    $(".page-footer").hide();



    $('.js-datepicker-range').daterangepicker({
            timePicker: true,
            locale: {
            format: 'YYYY.MM.DD hh:mm:ss'
        },
    });



});

var ww = document.body.clientWidth;
if (ww < 760) {
    window.location.href = "{{ route('warning', app()->getLocale()) }}";
}

</script>
@endsection