<form id="eventSubmit" action="" enctype="multipart/form-data" method="POST" class="mb-0">
    @csrf
    <!--Add event-->
    <div class="row">

        <!--Event Name Event Date-->
        <div class="col-12 border-bottom border-top ">
            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-2 d-md-none d-lg-block d-md-none">
                    @if ( $validator && $validator->errors()->first('event_name') )
                    <div class="alert alert-danger text-center mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('event_name') }}
                    </div>
                    @endif
                </div>

                <div class=" col-2 offset-md-1 offset-lg-0 text-left">
                    <input type="text" class="form-control border-0" name="event_name" placeholder="{{__("event_name") }}"
                        value="{{ Request::get('event_name') }}">
                </div>


                <div class=" col-4 text-center">
                    <input type="text" name="daterange" class="form-control text-center js-datepicker-range border-0"
                        value="{{ Request::get('daterange') }}">


                </div>

                <div class="col-2 d-md-none d-lg-block">
                    @if ( $validator && $validator->errors()->first('daterange') )
                    <div class="alert alert-danger mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('daterange') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>



        <div class="event-wraper col-12">

            <!--About Event -->
            <div class="row elements-mid-align  border-bottom">
                <div class="col-1 d-md-none d-lg-block">
                    @if ( $validator && $validator->errors()->first('event_cover') )
                    <div class="alert alert-danger text-center mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('event_cover') }}
                    </div>
                    @endif
                </div>

                <div class="p-0 col-1 col-md-2 offset-md-1 offset-lg-0 col-lg-1 text-left">
                        <div class="upload-btn-wrapper">
                        <button class="my-btn">{{__("upload_cover") }}</button>
                        <input type="file" name="event_cover" id="event_cover" />
                    </div>
                </div>


                <div class="col-7">
                    <textarea class="form-control border-0" name="event_cover_description" placeholder="{{__("about_event") }}"
                        maxlength="3500" onkeyup="charCount(this)"
                        id="event_cover_description">{{ Request::get('desc') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>

                <div class="col-2 d-md-none d-lg-block">
                    @if ( $validator && $validator->errors()->first('desc') )
                    <div class="alert alert-danger text-center mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('desc') }}
                    </div>
                    @endif
                </div>
            </div>

            <!--Event Additional Photos -->
            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>

                <div class="p-0 col-1 col-md-2  col-lg-1 text-left">
                        <div class="upload-btn-wrapper">
                        <button class="my-btn">{{__("additional_photo") }}#1</button>
                        <input type="file" name="event_image_1" id="event_image_1">
                    </div>
                </div>


                <div class="col-7">
                    <textarea class="form-control border-0" name="event_image_1_desc"
                        placeholder="{{__("additional_photo") }}#1 {{__("description") }}" maxlength="2000" onkeyup="charCount(this)"
                        id="event_image_1_desc">{{ Request::get('event_image_1_desc') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>
                <div class="col-2">

                </div>
            </div>


            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>

                <div class="p-0 col-1 col-md-2  col-lg-1 text-left">
                        <div class="upload-btn-wrapper">
                        <button class="my-btn">{{__("additional_photo") }}#2</button>
                        <input type="file" name="event_image_2" id="event_image_2">
                    </div>
                </div>


                <div class=" col-7">
                    <textarea class="form-control border-0" name="event_image_2_desc"
                        placeholder="{{__("additional_photo") }}#2 {{__("description") }}" maxlength="2000" onkeyup="charCount(this)"
                        id="event_image_2_desc">{{ Request::get('event_image_2_desc') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>
                <div class="col-2"></div>
            </div>


            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>

                <div class="p-0 col-1 col-md-2  col-lg-1 text-left">
                        <div class="upload-btn-wrapper">
                        <button class="my-btn">{{__("additional_photo") }}#3</button>
                        <input type="file" name="event_image_3" id="event_image_3">
                    </div>
                </div>


                <div class="col-7">
                    <textarea class="form-control border-0" name="event_image_3_desc"
                        placeholder="{{__("additional_photo") }}#3 {{__("description") }}" maxlength="2000" onkeyup="charCount(this)"
                        id="event_image_3_desc">{{ Request::get('event_image_3_desc') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>
                <div class="col-2"></div>
            </div>

            <!--Event Media Link -->
            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>

                <div class=" col-4 text-left">
                    <input type="text" class="form-control  border-top-0 border-left-0 border-right-0"
                        name="event_media" placeholder="Paste url" value="{{ Request::get('event_media') }}">
                </div>


                <div class="col-4">
                    <textarea class="form-control border-0" name="event_media_description"
                    placeholder="{{__("media_file")}} {{__("description") }}" maxlength="2000" onkeyup="charCount(this)"
                        id="event_media_description">{{ Request::get('event_media_description') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>
                <div class="col-2"></div>
            </div>

            <!--Event Note -->
            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>


                <div class="col-8">
                    <textarea class="form-control border-0" name="event_note" placeholder="{{__("note")}}" maxlength="2000"
                        onkeyup="charCount(this)" id="event_note">{{ Request::get('event_note') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row text-center mt-3">
                <div class="col-12">
                    <div class="next-btn">
                        <button class="my-btn-2 save_event">{{__("next")}}</button>
                        {{-- <input type="file" name="event_cover" id="event_cover" /> --}}
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="errors d-lg-none">

         

        @if ( $validator && $validator->errors()) 
        

        @foreach($validator->errors()->messages() as $error)
            <div class="alert alert-danger text-center mt-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $error[0] }}
            </div>
            
        @endforeach
        

        @endif
    </div>
    <!--end event-->
</form>