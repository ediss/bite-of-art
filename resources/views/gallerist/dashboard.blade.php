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
    <div class="col-12" id="dashboardForm">
        @include('gallerist.dashboard-form')
      
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
            url: "{{ route('update.gallerist', app()->getLocale()) }}",
            method: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            data:formData,

            success: function(response){
                if(response.success === false) {
                    $("#dashboardForm").html(response.html);
                }

                if (response.message == "password-update") {
                   window.location.href = "{{ route('login', app()->getLocale())}}";
                }
                if (typeof response.message != "undefined" && response.message.length) {
                        toastr[response.message[0]](response.message[1]);
                }
           

            },
            error: function (request, status, error) {
                alert(error);
                //alert("error! Contact us!");
            }
        });
    });

</script>

@endsection