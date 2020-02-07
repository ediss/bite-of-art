@extends('layout.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />

@endsection

@section('content')
<div class="row">
    <div class="col-md-12 p-0">
        <form action="">
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

                            </div>
                        </div>
                    </div>
                    {{-- <button type="button" name="add_artist" class="btn btn-success mt-2 add_artist">Dodaj umetnika</button> --}}

                </div>



                <div class="event-wraper col-12">
                    <div class="col-12 mt-3">
                        <div class="col-md-10 offset-1 ">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Upload Cover</button>
                                        <input type="file" name="event_cover" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="event_cover_description"></textarea>
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
                                        <input type="file" name="event_image_1" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="event_image_1_desc"></textarea>
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
                                        <input type="file" name="event_image_2" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="event_image_2_desc"></textarea>
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
                                        <input type="file" name="event_image_3" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="event_image_3_desc"></textarea>
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
                                    <textarea class="form-control border-0" id="event_note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end event-->

            <!--Add artist-->
            <div class="row d-none" id="artist">
                <div class="col-md-12 border-top h-100px text-center" id="artist-header"
                    style="background-color:#cccccc">
                    <div class="col-md-10 offset-1 mt-5">
                        <div class="row ">
                            <div class="form-group col-1 text-right">
                                <i class="fa fa-floppy-o fa-2x mr-3 save_artist" aria-hidden="true"></i>
                                <i class="fa fa-pencil-square-o fa-2x mt-1 edit_artist" aria-hidden="true"></i>
                            </div>

                            <div class="form-group col-4">
                                <input type="text" name="artist_name" class="form-control border-0"
                                    placeholder="Artist name">
                            </div>

                            <div class="form-group col-2">


                            </div>

                            <div class="form-group col-5 text-right">
                                <button type="button" class="btn btn-outline-dark font-weight-bold add_artwork">ADD
                                    ARTWORK</button>

                            </div>
                        </div>
                    </div>
                    {{-- <button type="button" class="btn btn-success mt-2 save_artist btn-block">Sacuvaj umetnika</button> --}}

                </div>
                <div class="artist-wraper col-12 d-none">
                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Upload Cover</button>
                                        <input type="file" name="artist_cover" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="artist_cover_description"></textarea>
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
                                        <input type="file" name="artist_image_1" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="artist_image_1_desc"></textarea>
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
                                        <input type="file" name="artist_image_2" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="artist_image_2_desc"></textarea>
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
                                        <input type="file" name="artist_image_3" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="artist_image_3_desc"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-4">
                                    <input type="text" name="artist_media"
                                        class="form-control  border-top-0 border-left-0 border-right-0"
                                        placeholder="Paste url">
                                </div>
                            </div>
                            <div class="row">
                                <label for="">Media file description</label>
                                <div class="form-group col-4">
                                    <textarea class="form-control border-0" id="artist_media_description"
                                        name="artist_media_description"></textarea>
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
                                    <textarea class="form-control border-0" id="artist_note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end artist-->


            <!--Add artwork-->
            <div class="row d-none" id="artwork">
                <div class="col-md-12  h-100px text-center" id="artwork-header" style="background-color:#cccccc">
                    <div class="col-md-10 offset-1 mt-5">
                        <div class="row ">
                            <div class="form-group col-1 text-right">
                                <i class="fa fa-floppy-o fa-2x mr-3 save_artwork" aria-hidden="true"></i>
                                <i class="fa fa-pencil-square-o fa-2x mt-1 edit_artwork" aria-hidden="true"></i>
                            </div>

                            <div class="form-group col-4">
                                <input type="text" class="form-control border-0" name="artwork_name"
                                    placeholder="Artwork name">
                            </div>

                            <div class="form-group col-2">


                            </div>

                            <div class="form-group col-5 text-right">


                            </div>
                        </div>
                    </div>
                    {{-- <button type="button" class="btn btn-success mt-2 save_artist btn-block">Sacuvaj umetnika</button> --}}

                </div>
                <div class="artwork-wraper col-12 d-none">
                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Upload Cover</button>
                                        <input type="file" name="artwork_cover" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="artwork_cover_description"
                                        name="artwork_cover_description"></textarea>
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
                                        <input type="file" name="artwork_image_1" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="artwork_image_1_desc"></textarea>
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
                                        <input type="file" name="artwork_image_2" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="artwork_image_2_desc"></textarea>
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
                                        <input type="file" name="artwork_image_3" />
                                    </div>
                                </div>

                                <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="artwork_image_3_desc"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">


                                <div class="form-group col-4">
                                    <input type="text" name="artwork_media"
                                        class="form-control  border-top-0 border-left-0 border-right-0"
                                        placeholder="Paste url">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="">Media file description</label>
                                    <textarea class="form-control border-0" id="artwork_media_desc"></textarea>
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
                                    <textarea class="form-control border-0" id="artwork_note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end artwork-->
            <input type="submit" class="btn btn primary" value="SAVE" name="save" id="ajaxSubmit">
        </form>
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

        jQuery('#ajaxSubmit').click(function(e){
            var event = 
                {
                    "event_name"          : $("input[type=text][name=event_name]").val(),
                    "event_date"          : $("input[type=text][name=daterange]").val(),
                    "event_cover"         : $("input[type=file][name=event_cover]").val(),
                    'event_cover_desc'    : $('textarea#event_cover_description').val(),
                    'event_image_1'       : $("input[type=file][name=event_image_1]").val(),
                    'event_image_2'       : $("input[type=file][name=event_image_2]").val(),
                    'event_image_3'       : $("input[type=file][name=event_image_3]").val(),

                    'event_image_1_desc'  : $('textarea#event_image_1_desc').val(),
                    'event_image_2_desc'  : $('textarea#event_image_2_desc').val(),
                    'event_image_3_desc'  : $('textarea#event_image_3_desc').val(),
                    "event_media"         : $("input[type=text][name=event_media]").val(),
                    'event_media_desc'    : $('textarea#event_media_description').val(),
                    'event_note'          : $('textarea#event_note').val(),

                }
            
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/test/ajax') }}",
                  method: 'post',
                  data: {
                    artists : artists,
                    event   : event 
               
                  },
                  success: function(result){
                    //  jQuery('.alert').show();
                    //  jQuery('.alert').html(result.success);
                  }});
               });


            

    $('.js-datepicker-range').daterangepicker({
            locale: {
            format: 'YYYY.MM.DD'
        },
    });
        
        $( ".save_event" ).click(function() {
            $( ".event-wraper" ).animate({
                left: '-100vw'
            }, 2000, function() {
                $('.event-wraper').addClass('d-none');

                $('.add_artist').removeClass('d-none');
            });
        });

        $( ".edit_event" ).click(function() {
            $('.event-wraper').removeClass('d-none');
            $( ".event-wraper" ).animate({
                left: '0'
            }, 2000, function() {
                $('#artist').addClass('d-none');
                $('.add_artist').addClass('d-none');

                

            });
        });


        $('.add_artist').click(function() {
            $('#artist').removeClass('d-none').show().addClass('fadeInDRight animation-duration');
            $('.artist-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');
        });



        $( ".add_artwork" ).click(function() {
            // $('#artist').addClass('d-none');
                $('.add_artist').addClass('d-none');
            $( ".artist-wraper" ).animate({
                left: '-100vw'
            }, 2000, function() {
                $('.artist-wraper').addClass('d-none');
                $('#artwork').show().removeClass('d-none');
            $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');
                

            });
        });

        $('.save_artwork').click(function() {
            

            artwork.push({
                "artwork_name"          : $("input[type=text][name=artwork_name]").val(),
                "artwork_cover"         : $("input[type=file][name=artwork_cover]").val(),
                'artwork_cover_desc'    : $('textarea#artwork_cover_description').val(),
                'artwork_image_1'       : $("input[type=file][name=artwork_image_1]").val(),
                'artwork_image_2'       : $("input[type=file][name=artwork_image_2]").val(),
                'artwork_image_3'       : $("input[type=file][name=artwork_image_3]").val(),

                'artwork_image_1_desc'  : $('textarea#artwork_image_1_desc').val(),
                'artwork_image_2_desc'  : $('textarea#artwork_image_2_desc').val(),
                'artwork_image_3_desc'  : $('textarea#artwork_image_3_desc').val(),
                "artwork_media"         : $("input[type=text][name=artwork_media]").val(),
                "artwork_media_desc"    : $('textarea#artwork_media_desc').val(),
                'artwork_note'          : $('textarea#artwork_note').val(),



            });

            console.log(artwork);

            $('#artwork').find(':input').val('');

            $('#artwork').fadeOut('slow','swing')







        });

        $( ".save_artist" ).on( "click", function() {
            artists.push({
                "artist_name"               : $("input[type=text][name=artist_name]").val(),
                "artist_cover"              : $("input[type=file][name=artist_cover]").val(),
                'artist_cover_desc'         : $('textarea#artist_cover_description').val(),
                'artist_image_1'            : $("input[type=file][name=artist_image_1]").val(),
                'artist_image_2'            : $("input[type=file][name=artist_image_2]").val(),
                'artist_image_3'            : $("input[type=file][name=artist_image_3]").val(),

                'artist_image_1_desc'       : $('textarea#artist_image_1_desc').val(),
                'artist_image_2_desc'       : $('textarea#artist_image_2_desc').val(),
                'artist_image_3_desc'       : $('textarea#artist_image_3_desc').val(),
                "artist_media"              : $("input[type=text][name=artist_media]").val(),
                'artist_media_desc'         : $('textarea#artist_media_description').val(),
                'artist_note'               : $('textarea#artist_note').val(),
                "artwork"                   : artwork
            });

            artwork = [];
            $('.add_artist').removeClass('d-none');

            //$(':input').val('')

            //artists.push(artist);
            //console.log(artists.length);
            $("#artist").fadeOut('slow', 'swing');

            $("#artist_artworks").empty();
            // $.each(artists, function (i, item) {

            // });
    });

});

</script>
@endsection