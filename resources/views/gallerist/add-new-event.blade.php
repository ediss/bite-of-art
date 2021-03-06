@extends('layout.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">

<script src="https://cdn.tiny.cloud/1/6lpj0hls50t5fhszqn1yu17ptqwgc31358a1egzwi0uqx4ni/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector:'textarea#event_cover_description',
        menubar:false,
        branding: false,
        plugins: "link wordcount",
        default_link_target: "_blank",
        toolbar: "undo redo | underline bold italic|alignjustify| link ",
        
        //toolbar:"styleselect",

        // style_formats: [
        //     {title: 'Headers', items: [
        //         {title: 'Header 1', format: 'h1'},
        //         {title: 'Header 2', format: 'h2'},
        //         {title: 'Header 3', format: 'h3'},
        //         {title: 'Header 4', format: 'h4'},
        //         {title: 'Header 5', format: 'h5'},
        //         {title: 'Header 6', format: 'h6'}
        //     ]}
        // ],
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
            @include('inc.partial.event-form.add-event-form')
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 p-0">
        <!--Add artist-->
        <div class="d-none" id="artist">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 p-0">
        <!--Add artwork-->
        <div class="d-none" id="artwork">
        </div>
    </div>
</div>
<div class="row">
    <div id="artowrk-button" class="col-12 d-none">
        <div class="col-12 text-center mt-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="my-btns-new mr-2 add_artwork">ADD MORE ARTWORKS</button>
                <button class="my-btns-new next-buttons">NEXT</button>
            </div>
        </div>
    </div>

    <div id="artist-button" class="col-12 d-none">
        <div class="col-12 text-center mt-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="my-btns-new mr-2 submit_event">SUBMIT EVENT</button>
                <button class="my-btns-new add_artist">ADD MORE ARTISTS</button>
            </div>
        </div>
    </div>
</div>
{{-- <button class="my-btn add_artist">ADD MORE ARTISTS</button> --}}

@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src=" {{ asset('assets/js/event/add-event.js') }}"></script>
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


    $(document).on('click', '.save_event', function(e) {
        e.preventDefault();

        var route = "{{route('add.new.event', app()->getLocale())}}";
        saveEvent(route);
    });

    $(document).on('click', '.save_artist', function(e) {
        e.preventDefault();
        var route = "{{route('add.artist', app()->getLocale())}}";
        saveArtist(route);
    });

    $(document).on('click', '.save_artwork', function(e) {
        e.preventDefault();
        var route = "{{route('add.artwork', app()->getLocale())}}";
        saveArtwork(route);
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
        window.location.href = "{{ route('gallerist.dashboard', app()->getLocale()) }}";
    });

});

var ww = document.body.clientWidth;
if (ww < 760) {
    window.location.href = "{{ route('warning',['mobile'=>true, 'language'=> app()->getLocale()]) }}";
}

</script>
@endsection