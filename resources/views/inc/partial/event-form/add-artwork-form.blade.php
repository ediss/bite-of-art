<form id="artworkSubmit" action="" enctype="multipart/form-data" method="POST" class="w-100">
    @csrf

    <div class="row">

        <div class="col-md-12" id="artwork-header" style="background-color:#e6e6e6">

            <div class="row elements-mid-align">
                <div class="col-md-2">
                    <input type="hidden" name="artist_id" class="artist_id" value="{{ $artist_id }}">
                    <input type="hidden" name="event_artwork_id" class="event_artwork_id" value="{{ $event_id }}">
                </div>

                <div class=" col-2 text-left">
                    <input type="text" class="form-control border-0" name="artwork_name" placeholder="Artwork name"
                        value="{{ Request::get('artwork_name') }}">
                </div>


                <div class=" col-6 text-center">


                </div>

                <div class="col-md-2">
                    @if ( $validator && $validator->errors()->first('artwork_name') )
                    <div class="alert alert-danger mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('artwork_name') }}
                    </div>
                    @endif
                </div>
            </div>




        </div>



        <div class="artwork-wraper row d-none">
            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">
                        @if ( $validator && $validator->errors()->first('artwork_cover') )
                        <div class="alert alert-danger mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('artwork_cover') }}
                        </div>
                        @endif
                    </div>

                    <div class=" col-1 text-left">
                        <div class="upload-btn-wrapper">
                            <button class="my-btn">Upload Cover</button>
                            <input type="file" name="artwork_cover" />
                        </div>
                    </div>


                    <div class=" col-8">

                        <textarea class="form-control border-0" name="artwork_cover_description"
                            placeholder="About Artwork"
                            id="artwork_cover_description">{{ Request::get('artwork_cover_description') }}</textarea>
                        {{-- <span class="float-right" id="event_desc_count">700</span> --}}


                    </div>

                    <div class="col-md-2">
                        @if ( $validator && $validator->errors()->first('artwork_cover_description') )
                        <div class="alert alert-danger mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('artwork_cover_description') }}
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
                            <input type="file" name="artwork_image_1">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="artwork_image_1_desc"
                            placeholder="Additional photo #1 description"
                            id="artwork_image_1_desc">{{ Request::get('artwork_image_1_desc') }}</textarea>
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
                            <input type="file" name="artwork_image_2">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="artwork_image_2_desc"
                            placeholder="Additional photo #2 description"
                            id="artwork_image_2_desc">{{ Request::get('artwork_image_2_desc') }}</textarea>
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
                            <input type="file" name="artwork_image_3">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="artwork_image_3_desc"
                            placeholder="Additional photo #3 description"
                            id="artwork_image_3_desc">{{ Request::get('artwork_image_3_desc') }}</textarea>
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
                            name="artwork_media" placeholder="Paste url" value="{{ Request::get('artwork_media') }}">
                    </div>


                    <div class=" col-5">
                        <textarea class="form-control border-0" name="artwork_media_desc"
                            placeholder="Media file description"
                            id="artwork_media_desc">{{ Request::get('artwork_media_desc') }}</textarea>
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
                        <textarea class="form-control border-0" name="artwork_note" placeholder="Note"
                            id="artwork_note">{{ Request::get('artwork_note') }}</textarea>
                        {{-- <span class="float-right" id="event_desc_count">700</span> --}}
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>
            <div class="col-12 text-center mt-3">

                <div class="row w-100">
                    <div class="col-md-6 offset-3">
                        <div class="next-btn">
                            <button class="my-btn save_artwork">NEXT</button>
                            {{-- <input type="file" name="event_cover" id="event_cover" /> --}}
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</form>