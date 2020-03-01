<form id="updateEventAll" method="POST" action={{ route('moderator.event.artist.update', ['id' => $event_id]) }}
    enctype="multipart/form-data">

  


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
                <label class="form-control-label"><b>Event place</b></label>
                <input type="text" class="form-control" name="new_event_place" value="{{ $event->event_place }}"
                    disabled>
            </div>
        </div>

    </div>
    <div class="form-group">

        <div class="row">
            <div class="col-12">
                <input type="text" name="new_daterange" class="form-control text-center js-datepicker-range"
                    value="{{ $event->event_open }} - {{ $event->event_closed }}">
            </div>
        </div>

    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Cover image</b></label>
                <p><img src="{{ $event->event_cover }}" class="img-fluid"></p>
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
            <div class="col-md-3">
                <label class="form-control-label"><b>Event description</b></label>
                <textarea name="new_event_description" id="new_event_description" cols="30" rows="10"
                    class="form-control">{{ $event->event_description }}</textarea>
                @if ( $validator && $validator->errors()->first('new_event_description') )
                <div class="alert alert-danger mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $validator->errors()->first('new_event_description') }}
                </div>
                @endif
            </div>
            <div class="col-md-3">
                <label class="form-control-label"><b>Event description(SRB)</b></label>
                <textarea name="new_event_description_srb" id="new_event_description_srb" cols="30" rows="10"
                    class="form-control">{{ $event->srb_event_description }}</textarea>
            </div>
            <div class="col-md-3">
                <label class="form-control-label"><b>Event description(ESP)</b></label>
                <textarea name="new_event_description_esp" id="new_event_description_esp" cols="30" rows="10"
                    class="form-control">{{ $event->esp_event_description }}</textarea>
            </div>
            <div class="col-md-3">
                <label class="form-control-label"><b>Event description(SLO)</b></label>
                <textarea name="new_event_description_slo" id="new_event_description_slo" cols="30" rows="10"
                    class="form-control">{{ $event->slo_event_description }}</textarea>
            </div>
        </div>

    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label class="form-control-label"><b>Event image 1</b></label>
                @if($event->event_img_1)
                <p> <img src="{{ $event->event_img_1 }}" class="img-fluid"></p>
                @else
                <p class="text-primary"> Not set</p>
                @endif


                <input type="file" name="event_new_image_1" id="event_new_image_1" />

            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Event image 2</b></label>
                @if($event->event_img_2)
                <p><img src="{{ $event->event_img_2 }}" class="img-fluid"></p>
                @else
                <p class="text-primary"> Not set</p>
                @endif
                <input type="file" name="event_new_image_2" id="event_new_image_2" />
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Event image 3</b></label>
                @if($event->event_img_3)
                <p><img src="{{ $event->event_img_3 }}" class="img-fluid"></p>
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
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Event media</b></label>
                <input type="text" class="form-control" name="new_event_media" value="{{ $event->event_media }}">
            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>Event media description</b></label>
                <textarea name="new_media_description" id="new_media_description" cols="10" rows="1"
                    class="form-control">{{ $event->event_media_desc }}</textarea>
            </div>
        </div>



    </div>

    <div class="form-group">
        <label class="form-control-label"><b>Event note</b></label>

        <textarea name="new_event_note" id="new_event_note" cols="30" rows="5"
            class="form-control">{{ $event->event_note }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-control-label"><b>Gallerist</b></label>

        <input type="text" class="form-control" name="gallerist_id" value="{{ $event->gallerist_id }}" disable>

    </div>
    <script>
        $('.js-datepicker-range').daterangepicker({
            opens:"center",
            timePicker: true,
            locale: {
            format: 'YYYY.MM.DD hh:mm:ss'
        },
        });  
    </script>
</form>



@section('footer-scripts')


@endsection