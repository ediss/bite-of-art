<form id="eventSubmit" action="" enctype="multipart/form-data" method="POST">
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
                        <input type="text" class="form-control border-0" name="event_name" placeholder="Event name" value="{{ Request::get('event_name') }}">

                        @if ( $validator && $validator->errors()->first('event_name') )
                        <div class="alert alert-danger mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            {{ $validator->errors()->first('event_name') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group col-2">
                        <input type="text" name="daterange" class="form-control2 js-datepicker-range border-0"
                            value="{{ Request::get('daterange') }}">

                        @if ( $validator && $validator->errors()->first('daterange') )
                        <div class="alert alert-danger mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            {{ $validator->errors()->first('daterange') }}
                        </div>
                        @endif

                    </div>

                    <div class="form-group col-5 text-right">
                        <button type="button"
                            class="btn btn-outline-dark font-weight-bold add_artist d-none">ADD
                            ARTIST</button>

                        <button type="button"
                            class="btn btn-outline-dark font-weight-bold done_event d-none">DONE</button>


                    </div>
                </div>
            </div>

        </div>



        <div class="event-wraper col-12">
            <div class="col-12 mt-3">
                <div class="col-md-10 offset-1 ">
                    <div class="row ">
                        <div class="form-group col-2 text-left">
                            <div class="upload-btn-wrapper">
                                <button class="my-btn">Upload Cover</button>
                                <input type="file" name="event_cover" id="event_cover" />
                            </div>

                            @if ( $validator && $validator->errors()->first('event_cover') )
                            <div class="alert alert-danger mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                {{ $validator->errors()->first('event_cover') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-10">
                            <textarea class="form-control border-0" name="event_cover_description"
                                id="event_cover_description">{{ Request::get('event_cover_description') }}</textarea>

                            @if ( $validator && $validator->errors()->first('event_cover_description') )
                            <div class="alert alert-danger mt-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                {{ $validator->errors()->first('event_cover_description') }}
                            </div>
                            @endif
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
                                <input type="file" name="event_image_1" id="event_image_1">
                            </div>
                        </div>

                        <div class="form-group col-10">
                            <textarea class="form-control border-0" name="event_image_1_desc"
                                id="event_image_1_desc">{{ Request::get('event_image_1_desc') }}</textarea>
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
                                <input type="file" name="event_image_2" id="event_image_2">
                            </div>
                        </div>

                        <div class="form-group col-10">
                            <textarea class="form-control border-0" name="event_image_2_desc"
                                id="event_image_2_desc">{{ Request::get('event_image_2_desc') }}</textarea>
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
                                <input type="file" name="event_image_3" id="event_image_3">
                            </div>
                        </div>

                        <div class="form-group col-10">
                            <textarea class="form-control border-0" name="event_image_3_desc"
                                id="event_image_3_desc">{{ Request::get('event_image_3_desc') }}</textarea>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-12 mt-3">
                <div class="col-md-10 offset-1">
                    <div class="row ">
                        <div class="form-group col-4">
                            <input type="text" class="form-control  border-top-0 border-left-0 border-right-0"
                                name="event_media" placeholder="Paste url" value="{{ Request::get('event_media') }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="">Media file description</label>
                        <div class="form-group col-4">
                            <textarea class="form-control border-0" id="event_media_description"
                                name="event_media_description">{{ Request::get('event_media_description') }}</textarea>
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
                            <textarea class="form-control border-0" name="event_note"
                                id="event_note">{{ Request::get('event_note') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end event-->
</form>