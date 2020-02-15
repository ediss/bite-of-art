<form>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Name</b></label>
                <input type="text" class="form-control" name="new_event_name" value="{{ $event->event_name }}">
            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>Event place</b></label>
                <input type="text" class="form-control" name="new_event_place" value="{{ $event->event_place }}">
            </div>
        </div>

    </div>
    <div class="form-group">

        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Event open</b></label>
                <input type="password" placeholder="Password" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>Event closed</b></label>
                <input type="password" placeholder="Password" class="form-control">
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
                    <p><input type="file" name="event_new_cover" id="event_new_cover" /></p>
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
            </div>
            <div class="col-md-3">
                <label class="form-control-label"><b>Event description(SRB)</b></label>
                <textarea name="new_event_description" id="new_event_description_srb" cols="30" rows="10"
                    class="form-control">{{ $event->srb_event_description }}</textarea>
            </div>
            <div class="col-md-3">
                <label class="form-control-label"><b>Event description(ESP)</b></label>
                <textarea name="new_event_description" id="new_event_description_esp" cols="30" rows="10"
                    class="form-control">{{ $event->esp_event_description }}</textarea>
            </div>
            <div class="col-md-3">
                <label class="form-control-label"><b>Event description(SLO)</b></label>
                <textarea name="new_event_description" id="new_event_description_slo" cols="30" rows="10"
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
                <label class="form-control-label"><b>Event description</b></label>
                <textarea name="new_event_description" id="new_event_description" cols="30" rows="10"
                    class="form-control">{{ $event->event_img_1_desc ? $event->event_img_1_desc : ''  }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Event description(SRB)</b></label>
                <textarea name="new_event_description" id="new_event_description_srb" cols="30" rows="10"
                    class="form-control">{{ $event->event_img_2_desc ? $event->event_img_2_desc : ''  }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Event description(ESP)</b></label>
                <textarea name="new_event_description" id="new_event_description_esp" cols="30" rows="10"
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
                <textarea name="new_event_description" id="new_event_description_slo" cols="10" rows="1"
                    class="form-control">{{ $event->event_media_desc }}</textarea>
            </div>
        </div>



    </div>

    <div class="form-group">
        <label class="form-control-label"><b>Event note</b></label>

        <textarea name="new_event_description" id="new_event_description_slo" cols="30" rows="5"
            class="form-control">{{ $event->event_note }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-control-label"><b>Gallerist</b></label>

        <input type="text" class="form-control" name="new_event_media" value="{{ $event->gallerist_id }}" disable>

    </div>

</form>