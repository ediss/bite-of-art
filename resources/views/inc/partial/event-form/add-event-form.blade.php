<form id="eventSubmit" action="" enctype="multipart/form-data" method="POST">
    @csrf
    <!--Add event-->
    <div class="row">

        <div class="col-md-12 border-bottom border-top ">

            <div class="row elements-mid-align">
                <div class="col-md-2">
                    @if ( $validator && $validator->errors()->first('event_name') )
                    <div class="alert alert-danger text-center mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('event_name') }}
                    </div>
                    @endif
                </div>

                <div class=" col-2 text-left">
                    <input type="text" class="form-control border-0" name="event_name" placeholder="Event name"
                    value="{{ Request::get('event_name') }}">
                </div>


                <div class=" col-4 text-center">
                    <input type="text" name="daterange" class="form-control text-center js-datepicker-range border-0"
                    value="{{ Request::get('daterange') }}">


                </div>

                <div class="col-md-2">
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



        <div class="event-wraper row">
            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">
                        @if ( $validator && $validator->errors()->first('event_cover') )
                        <div class="alert alert-danger text-center mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('event_cover') }}
                        </div>
                        @endif
                    </div>

                    <div class=" col-1 text-left">
                        <div class="upload-btn-wrapper">
                            <button class="my-btn">Upload Cover</button>
                            <input type="file" name="event_cover" id="event_cover" />
                        </div>
                    </div>


                    <div class=" col-8">

                        <textarea class="form-control border-0" name="event_cover_description" placeholder="About Event"
                            id="event_cover_description">{{ Request::get('event_cover_description') }}</textarea>
                        {{-- <span class="float-right" id="event_desc_count">700</span> --}}


                    </div>

                    <div class="col-md-2">
                        @if ( $validator && $validator->errors()->first('event_cover_description') )
                        <div class="alert alert-danger text-center mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('event_cover_description') }}
                        </div>
                        @endif
                    </div>
                </div>



            </div>



            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">

                    </div>

                    <div class=" col-1 text-left">
                        <div class="upload-btn-wrapper">
                            <button class="my-btn">Additional photo#1</button>
                            <input type="file" name="event_image_1" id="event_image_1">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="event_image_1_desc" placeholder="Additional photo #1 description"
                        id="event_image_1_desc">{{ Request::get('event_image_1_desc') }}</textarea>
                        {{-- <span class="float-right" id="event_desc_count">700</span> --}}

                    </div>

                    <div class="col-md-2">

                    </div>
                </div>



            </div>

            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">

                    </div>

                    <div class=" col-1 text-left">
                        <div class="upload-btn-wrapper">
                            <button class="my-btn">Additional photo#2</button>
                            <input type="file" name="event_image_2" id="event_image_2">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="event_image_2_desc" placeholder="Additional photo #2 description"
                        id="event_image_2_desc">{{ Request::get('event_image_2_desc') }}</textarea>
                        {{-- <span class="float-right" id="event_desc_count">700</span> --}}
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>

            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">

                    </div>

                    <div class=" col-1 text-left">
                        <div class="upload-btn-wrapper">
                            <button class="my-btn">Additional photo#3</button>
                            <input type="file" name="event_image_3" id="event_image_3">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="event_image_3_desc" placeholder="Additional photo #3 description"
                        id="event_image_3_desc">{{ Request::get('event_image_3_desc') }}</textarea>
                        {{-- <span class="float-right" id="event_desc_count">700</span> --}}
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>

            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">

                    </div>

                    <div class=" col-4 text-left">
                        <input type="text" class="form-control  border-top-0 border-left-0 border-right-0"
                        name="event_media" placeholder="Paste url" value="{{ Request::get('event_media') }}">
                    </div>


                    <div class=" col-5">
                        <textarea class="form-control border-0" name="event_media_description" placeholder="Media file description"
                        id="event_media_description">{{ Request::get('event_media_description') }}</textarea>
                        {{-- <span class="float-right" id="event_desc_count">700</span> --}}
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>

            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">

                    </div>


                    <div class=" col-9">
                        <textarea class="form-control border-0" name="event_note" placeholder="Note"
                        id="event_note">{{ Request::get('event_note') }}</textarea>
                        {{-- <span class="float-right" id="event_desc_count">700</span> --}}
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>
            <div class="col-12 text-center mt-3">

                <div class="row w-100">
                    <div class="col-md-6 offset-3">
                        <div class="next-btn">
                            <button class="my-btn save_event">NEXT</button>
                            {{-- <input type="file" name="event_cover" id="event_cover" /> --}}
                        </div>
                    </div>
                </div>
                
            </div>
       
        </div>
      
    </div>

    <!--end event-->
</form>