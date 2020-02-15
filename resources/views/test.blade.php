@extends('layout.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />

@endsection

@section('content')
<div class="row">
    <div class="col-md-12 p-0">
        <!--Add event-->
        <div id = "event">
            @include('inc.partial.event-form.add-event-form')
        </div>



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

    $(document).on('click', '.save_event', function(e) {

            e.preventDefault();

            var form = document.getElementById('eventSubmit');
                var formData = new FormData(form);
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "{{ url('/test') }}",
                  method: 'post',
                  contentType: false,
                  processData: false,
                  cache: false,

                  data:formData,
                  success: function(result){
                      if(result.success === false) {
                        $("#event").html(result.html);
                      }
                      if(result.success === true) {
                        $( ".event-wraper" ).animate({
                        left: '-100vw'
                        }, 1000, function() {

                        $('.event-wraper').addClass('d-none');

                        // $('.add_artist').removeClass('d-none');

                        $("#artist").removeClass('d-none').html(result.html).show().addClass('fadeInDRight animation-duration');
                        $('.artist-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

                        });
                      }

                  },
                  error: function(xhr, status, error) {

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
            $('.add_artwork').addClass('d-none');
            $('.done_artwork').addClass('d-none');

            $('.add_artist').addClass('d-none');
            $('.done_event').addClass('d-none');
            $('#artist').removeClass('d-none').show().addClass('fadeInDRight animation-duration');
            $('.artist-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');
            $('.artist-wraper').animate({
                left: '0'
            }, 1000, function() {
                $('.artist-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

            });
        });

        $(document).on('click', '.add_artwork', function(e) {
            var artist_id = $(".artist_id").val();
            var event_id = $(".event_artwork_id").val();
            $('.add_artwork').addClass('d-none');
            $('.done_artwork').addClass('d-none');
            $('#artwork').find(':input').val('');
            $('.artist_id').val(artist_id);
            $('.event_artwork_id').val(event_id);
            e.preventDefault();
            // $('#artist').addClass('d-none');
            $('.add_artist').addClass('d-none');
            $('#artwork').show().removeClass('d-none');
            $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

        });


        $(document).on('click', '.save_artwork', function(e) {


            e.preventDefault();

            var form = document.getElementById('artworkSubmit');
            var formData = new FormData(form);
            // var artist_id
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

                    if(result.success === false) {
                        $("#artwork").html(result.html);
                        $('.artwork-wraper').removeClass('d-none');
                      }
                      if(result.success === true) {
                        $('.add_artwork').removeClass('d-none');
                        $('.done_artwork').removeClass('d-none');
                        $('#artwork').fadeOut('slow','swing')
                      }

                    

                }
            });

            

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

                    if(result.success === false) {
                        $("#artist").html(result.html);
                        $('.artist-wraper').removeClass('d-none');
                    }
                    if(result.success === true) {
                        $( ".artist-wraper" ).animate({
                            left: '-100vw'
                        }, 2000, function() {
                            $('.artist-wraper').addClass('d-none');

                            $("#artwork").removeClass('d-none').html(result.html).show().addClass('fadeInDRight animation-duration');

                            $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

                        });
                      }



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
        var event_id = $('.event_id').val();
        $('#artist').find(':input').val('');
        $('.event_id').val(event_id);
    });

});

</script>
@endsection