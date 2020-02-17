@extends('layout.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 p-0">
        <!--Add event-->
        <div id="event">
            @include('inc.partial.event-form.add-event-form')
        </div>

        <!--Add artist-->
        <div class="d-none" id="artist">

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

<script src=" {{ asset('assets/js/event/add-event.js') }}"></script>
<script src=" {{ asset('plugins/toastr/toastr.min.js') }}"></script>


<script>
$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

$(document).ready(function(){

    $(".page-footer").hide();

    i = 700;
    $("#event_cover_description").keypress(function(){
        $("#event_desc_count").text(i -= 1);
    });

    $('.js-datepicker-range').daterangepicker({
            timePicker: true,
            locale: {
            format: 'YYYY.MM.DD hh:mm:ss'
        },
    });


    $(document).on('click', '.save_event', function(e) {
        e.preventDefault();
        saveEvent();
    });

    $(document).on('click', '.save_artist', function(e) {
        e.preventDefault();
        saveArtist();
    });

    $(document).on('click', '.save_artwork', function(e) {
        e.preventDefault();
        saveArtwork();
    });

    $(document).on('click', '.add_artist', function(e) {

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
        e.preventDefault();

        var artist_id = $(".artist_id").val();
        var event_id = $(".event_artwork_id").val();
        $('.add_artwork').addClass('d-none');
        $('.done_artwork').addClass('d-none');
        $('#artwork').find(':input').val('');
        $('.artist_id').val(artist_id);
        $('.event_artwork_id').val(event_id);
        $('.add_artist').addClass('d-none');
        $('#artwork').show().removeClass('d-none');
        $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');
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