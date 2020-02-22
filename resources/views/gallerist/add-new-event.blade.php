@extends('layout.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('logo-img')
    <div class="close-gallery"></div>
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

<script src=" {{ asset('assets/js/event/add-event.js') }}"></script>
<script src=" {{ asset('plugins/toastr/toastr.min.js') }}"></script>


<script>
$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

$(document).ready(function(){


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


    $(".page-footer").hide();

    

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

        $('#artist-button').addClass('d-none');
        var event_id = $(".event_id").val();
        $('#artist').find(':input').val('');
        $('.event_id').val(event_id);

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


        $('#artowrk-button').addClass('d-none');
        $('#artwork').find(':input').val('');
        $('.artist_id').val(artist_id);
        $('.event_artwork_id').val(event_id);
        $('#artwork').show().removeClass('d-none');
        $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');
    });

    $(document).on('click', '.next-buttons', function(e) {
        $('#artowrk-button').addClass('d-none');
        $('#artist-button').removeClass('d-none');

    });

    $(document).on('click', '.submit_event', function(e) {
        window.location.href = "{{ route('gallerist.dashboard') }}"; 
    });

});

</script>
@endsection