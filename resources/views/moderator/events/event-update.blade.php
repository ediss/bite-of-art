@extends('layout.dashboard')
@section('css')

<script src="https://cdn.tiny.cloud/1/6lpj0hls50t5fhszqn1yu17ptqwgc31358a1egzwi0uqx4ni/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
        tinymce.init({
              selector:'textarea#new_event_description, textarea#new_event_description_srb, textarea#new_event_description_esp, textarea#new_event_description_slo',
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

@section('content')
@if(session()->has('message-success'))
    <div class="alert alert-success">
        {{ session()->get('message-success') }}
    </div>
@elseif(session()->has('message-error'))
<div class="alert alert-danger">
    {{ session()->get('message-success') }}
</div>
@endif
<div class="row mb-4">
    <div class="col-12 text-center">
        <h1>
            Update Event
        </h1>
        <h3>({{ $event->event_name }})</h3>
    </div>
</div>


<form id="updateEvent" method="POST" action={{ route('moderator.event.update', ['id' => $event->id,  app()->getLocale()]) }}
    enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Virtual tour link</b></label>
                <input type="text" class="form-control" name="virtual_tour" value="{{ $event->vr_tour }}">

            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>360&#176; image</b></label>
                <input type="text" class="form-control" name="img_360" value="{{ $event->img_360 }}">
            </div>
        </div>

    </div>


    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Name</b></label>
                <input type="text" class="form-control" name="new_event_name" value="{{ $event->event_name }}">

                <input type="hidden" name="event_id" id="event_id" class="event_id" value="{{ $event->id }}">

                @if ( $validator && $validator->errors()->first('new_event_name') )
                <div class="alert alert-danger mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $validator->errors()->first('new_event_name') }}
                </div>
                @endif

            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>Event date</b></label>
                <input type="text" name="new_daterange" class="form-control text-center js-datepicker-range"
                value="{{ $event->event_open }} - {{ $event->event_closed }}">
            </div>
        </div>

    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Cover image</b></label>
                <p><img src="{{ url($event->event_cover) }}" class="img-fluid"></p>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>New cover image </b></label>
                <p><input type="file" name="new_event_cover" id="new_event_cover" /></p>
            </div>
            <div class="col-md-4">

            </div>
        </div>



        {{-- <input type="password" placeholder="Password" class="form-control"> --}}
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Event description</b></label>
                <textarea name="new_event_description" id="new_event_description" cols="30" rows="10"
                    class="form-control">{{ $event->event_description_en }}</textarea>
                @if ( $validator && $validator->errors()->first('new_event_description') )
                <div class="alert alert-danger mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $validator->errors()->first('new_event_description') }}
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>Event description(SRB)</b></label>
                <textarea name="new_event_description_srb" id="new_event_description_srb" cols="30" rows="10"
                    class="form-control">{{ $event->event_description_srb }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>Event description(ESP)</b></label>
                <textarea name="new_event_description_esp" id="new_event_description_esp" cols="30" rows="10"
                    class="form-control">{{ $event->event_description_esp }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>Event description(SLO)</b></label>
                <textarea name="new_event_description_slo" id="new_event_description_slo" cols="30" rows="10"
                    class="form-control">{{ $event->event_description_slo }}</textarea>
            </div>
        </div>

    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label class="form-control-label"><b>Event image 1</b></label>
                @if($event->event_img_1)
                <p> <img src="{{ url($event->event_img_1) }}" class="img-fluid"></p>
                @else
                <p class="text-primary"> Not set</p>
                @endif


                <input type="file" name="event_new_image_1" id="event_new_image_1" />

            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Event image 2</b></label>
                @if($event->event_img_2)
                <p><img src="{{ url($event->event_img_2) }}" class="img-fluid"></p>
                @else
                <p class="text-primary"> Not set</p>
                @endif
                <input type="file" name="event_new_image_2" id="event_new_image_2" />
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Event image 3</b></label>
                @if($event->event_img_3)
                <p><img src="{{ url($event->event_img_3) }}" class="img-fluid"></p>
                @else
                <p class="text-primary"> Not set</p>
                @endif
                <input type="file" name="event_new_image_3" id="event_new_image_3" />
            </div>

        </div>

    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label class="form-control-label"><b>Event img 1 description</b></label>
                <textarea name="new_event_image_1_desc" id="new_event_image_1_desc" cols="30" rows="10"
                    class="form-control">{{ $event->event_img_1_desc ? $event->event_img_1_desc : ''  }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Event img 2 description(SRB)</b></label>
                <textarea name="new_event_image_2_desc" id="new_event_image_2_desc_srb" cols="30" rows="10"
                    class="form-control">{{ $event->event_img_2_desc ? $event->event_img_2_desc : ''  }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Event img 3 description(ESP)</b></label>
                <textarea name="new_event_image_3_desc" id="new_event_image_3_desc_esp" cols="30" rows="10"
                    class="form-control">{{ $event->event_img_3_desc ? $event->event_img_3_desc : ''  }}</textarea>
            </div>

        </div>

    </div>




    <div class="form-group">
        <label class="form-control-label"><b>Gallerist:</b></label>
            <h3>{{ $event->user->name }}</h3>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input type="submit" class="btn btn-lg text-white dashbg-1" value="Update event">
            </div>
        </div>
        </div>
</form>

@endsection

@section('footer-scripts')
<script>
    $('.js-datepicker-range').daterangepicker({
        opens:"center",
        timePicker: true,
        locale: {
        format: 'YYYY.MM.DD hh:mm:ss'
    },
    });  
</script>
@endsection