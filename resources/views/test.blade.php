@extends('layout.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />

@endsection

@section('content')
<div class="row">
    <div class="col-md-12 p-0">
        <form id="eventSubmit" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <!--Add event-->
            <div class="row">

                <div class="col-md-12 border-bottom border-top ">

                    <div class="col-md-10 offset-1 ">
                        <div class="row mt-5">
                            <div class="form-group col-2 ">
                                <i class="fa fa-floppy-o fa-2x mr-3 save_event" aria-hidden="true"></i>
                                <i class="fa fa-pencil-square-o fa-2x mt-1 edit_event" aria-hidden="true"></i>
                            </div>

                            <div class="form-group col-3">
                                <input type="text" class="form-control border-0" name="event_name"
                                    placeholder="Event name">
                            </div>

                            <div class="form-group col-2">
                                <input type="text" name="daterange" class="form-control2 js-datepicker-range border-0"
                                    value="{{ Request::get('daterange') }}">

                            </div>

                            <div class="form-group col-5 text-right">
                                <button type="button"
                                    class="btn btn-outline-dark font-weight-bold add_artist d-none">ADD
                                    ARTIST</button>

                                    <button type="button" class="btn btn-outline-dark font-weight-bold done_event d-none">DONE</button>


                            </div>
                        </div>
                    </div>

                </div>



                <div class="event-wraper col-12">
                    <div class="col-12 mt-3">
                        <div class="col-md-10 offset-1 ">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Upload Cover</button>
                                        <input type="file" name="event_cover" id="event_cover" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" name="event_cover_description"
                                        id="event_cover_description"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Additional photo#1</button>
                                        <input type="file" name="event_image_1" id="event_image_1">
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" name="event_image_1_desc"
                                        id="event_image_1_desc"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Additional photo#2</button>
                                        <input type="file" name="event_image_2" id="event_image_2">
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" name="event_image_2_desc"
                                        id="event_image_2_desc"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Additional photo#3</button>
                                        <input type="file" name="event_image_3" id="event_image_3">
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" name="event_image_3_desc"
                                        id="event_image_3_desc"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-4">
                                    <input type="text" class="form-control  border-top-0 border-left-0 border-right-0"
                                        name="event_media" placeholder="Paste url">
                                </div>
                            </div>
                            <div class="row">
                                <label for="">Media file description</label>
                                <div class="form-group col-4">
                                    <textarea class="form-control border-0" id="event_media_description"
                                        name="event_media_description"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-1">
                                    <label for="">Note:</label>
                                </div>
                                <div class="form-group col-11">
                                    <textarea class="form-control border-0" name="event_note"
                                        id="event_note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end event-->
        </form>


        <!--Add artist-->
        <div class="row d-none" id="artist">

        </div>
        <!--end artist-->

        <!--Add artwork-->
        <div class="row d-none" id="artwork">

        </div>
        <!--end artwork-->


        <div id="artist_artworks" class="row"></div>
    </div>

</div>
@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    var artists = [];
    var artwork = [];

    $(document).ready(function(){

    $('.js-datepicker-range').daterangepicker({
            locale: {
            format: 'YYYY.MM.DD'
        },
    });

        $( ".save_event" ).click(function(e) {

            e.preventDefault();

            var form = document.getElementById('eventSubmit');
                var formData = new FormData(form);
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "{{ url('/submitEvent') }}",
                  method: 'post',
                  contentType: false,
                  processData: false,
                  cache: false,

                  data:formData,
                  success: function(result){
                    $( ".event-wraper" ).animate({
                        left: '-100vw'
                    }, 1000, function() {
                    
                        $('.event-wraper').addClass('d-none');

                        // $('.add_artist').removeClass('d-none');

                        $("#artist").removeClass('d-none').html(result.html).show().addClass('fadeInDRight animation-duration');
                        $('.artist-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

                    });
                }
               });
               

       
        });

        $( ".edit_event" ).click(function() {
            $('.event-wraper').removeClass('d-none');
            $( ".event-wraper" ).animate({
                left: '0'
            }, 1000, function() {
                $('#artist').addClass('d-none');
                $('.add_artist').addClass('d-none');



            });
        });


        $('.add_artist').click(function() {
            $('#artist').removeClass('d-none').show().addClass('fadeInDRight animation-duration');
            $('.artist-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');
        });

        $(document).on('click', '.add_artwork', function(e) {


            e.preventDefault();

            $('#artwork-header .artist_id').css('border:2px solid red');
            // $('#artist').addClass('d-none');
            $('.add_artist').addClass('d-none');
            $('#artwork').show().removeClass('d-none');
            $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');
    
        });


        $(document).on('click', '.save_artwork', function(e) {

        
            e.preventDefault();

            var form = document.getElementById('artworkSubmit');
            var formData = new FormData(form);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/submitArtwork') }}",
                method: 'post',
                contentType: false,
                processData: false,
                cache: false,

                data:formData,
                success: function(result){
                    console.log(result.html);
                    $('.add_artwork').removeClass('d-none');
                    $('.done_artwork').removeClass('d-none');
                    $('.artist_id').val(result.html)
                //     $( ".event-wraper" ).animate({
                //         left: '-100vw'
                //     }, 2000, function() {
                    
                //     $('.event-wraper').addClass('d-none');

                //     $('.add_artist').removeClass('d-none');

                //     $("#artist").removeClass('d-none').html(result.html).show().addClass('fadeInDRight animation-duration');
                //     $('.artist-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

                // });
                }
            });
            


            // artwork.push({
            //     "artwork_name"          : $("input[type=text][name=artwork_name]").val(),
            //     "artwork_cover"         : $("input[type=file][name=artwork_cover]").val(),
            //     'artwork_cover_desc'    : $('textarea#artwork_cover_description').val(),
            //     'artwork_image_1'       : $("input[type=file][name=artwork_image_1]").val(),
            //     'artwork_image_2'       : $("input[type=file][name=artwork_image_2]").val(),
            //     'artwork_image_3'       : $("input[type=file][name=artwork_image_3]").val(),

            //     'artwork_image_1_desc'  : $('textarea#artwork_image_1_desc').val(),
            //     'artwork_image_2_desc'  : $('textarea#artwork_image_2_desc').val(),
            //     'artwork_image_3_desc'  : $('textarea#artwork_image_3_desc').val(),
            //     "artwork_media"         : $("input[type=text][name=artwork_media]").val(),
            //     "artwork_media_desc"    : $('textarea#artwork_media_desc').val(),
            //     'artwork_note'          : $('textarea#artwork_note').val(),



            // });

            console.log(artwork);

            $('#artwork').find(':input').val('');

            $('#artwork').fadeOut('slow','swing')







        });
        
        $(document).on('click', '.save_artist', function(e) {
                
            e.preventDefault();

            var form = document.getElementById('artistSubmit');
            var formData = new FormData(form);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/submitArtist') }}",
                method: 'post',
                contentType: false,
                processData: false,
                cache: false,

                data:formData,
                success: function(result){
                    // $('.add_artist').removeClass('d-none');
                    // $("#artist").fadeOut('slow', 'swing');
                    $( ".artist-wraper" ).animate({
                        left: '-100vw'
                    }, 2000, function() {
                        $('.artist-wraper').addClass('d-none');
                        
                        $("#artwork").removeClass('d-none').html(result.html).show().addClass('fadeInDRight animation-duration');

                        $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

                });
                }
            });
            // artists.push({
            //     "artist_name"               : $("input[type=text][name=artist_name]").val(),
            //     "artist_cover"              : $("input[type=file][name=artist_cover"),
            //     'artist_about'              : $('textarea#artist_about').val(),
            //     'artist_image_1'            : $("input[type=file][name=artist_image_1]"),
            //     'artist_image_2'            : $("input[type=file][name=artist_image_2]"),
            //     'artist_image_3'            : $("input[type=file][name=artist_image_3]"),

            //     'artist_image_1_desc'       : $('textarea#artist_image_1_desc').val(),
            //     'artist_image_2_desc'       : $('textarea#artist_image_2_desc').val(),
            //     'artist_image_3_desc'       : $('textarea#artist_image_3_desc').val(),
            //     "artist_media"              : $("input[type=text][name=artist_media]").val(),
            //     'artist_media_desc'         : $('textarea#artist_media_description').val(),
            //     'artist_note'               : $('textarea#artist_note').val(),
            //     "artwork"                   : artwork
            // });

            artwork = [];
        

            $("#artist_artworks").empty();
    });

    $(document).on('click', '.done_artwork', function(e) {
        $( "#artist" ).hide();
        $(".add_artist").removeClass('d-none');
        $(".done_event").removeClass('d-none');

    });

});

</script>
@endsection