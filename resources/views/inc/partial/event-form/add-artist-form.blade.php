<form id="artistSubmit" action="" enctype="multipart/form-data" method="POST" class="w-100">
    @csrf

    <div class="row">

        <div class="col-md-12" id="artist-header" style="background-color:#e6e6e6">

            <div class="row elements-mid-align">
                <div class="col-md-2">
                    <input type="hidden" class="event_id" name="event_id" value="{{$event_id}}">

                </div>

                <div class=" col-2 text-left">
                    <input type="text" name="artist_name" class="form-control border-0" placeholder="Artist name"
                        value="{{ Request::get('artist_name') }}">
                </div>


                <div class=" col-6 text-center">


                </div>

                <div class="col-md-2">
                    @if ( $validator && $validator->errors()->first('artist_name') )
                    <div class="alert alert-danger mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('artist_name') }}
                    </div>
                    @endif
                </div>
            </div>




        </div>



        <div class="artist-wraper row d-none">
            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">
                        @if ( $validator && $validator->errors()->first('artist_cover') )
                        <div class="alert alert-danger mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('artist_cover') }}
                        </div>
                        @endif
                    </div>

                    <div class=" col-1 text-left">
                        <div class="upload-btn-wrapper">
                            <button class="my-btn">Upload Cover</button>
                            <input type="file" name="artist_cover">
                        </div>
                    </div>


                    <div class=" col-8">

                        <textarea class="form-control border-0" name="artist_about" placeholder="About Artist" maxlength="700" onkeyup="charCount(this)"
                            id="artist_about">{{ Request::get('artist_about') }}</textarea>
                            <span class="float-right">700</span>


                    </div>

                    <div class="col-md-2">
                        @if ( $validator && $validator->errors()->first('artist_about') )
                        <div class="alert alert-danger mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('artist_about') }}
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
                            <input type="file" name="artist_image_1">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="artist_image_1_desc" maxlength="700" onkeyup="charCount(this)"
                            placeholder="Additional photo #1 description"
                            id="artist_image_1_desc">{{ Request::get('artist_image_1_desc') }}</textarea>
                            <span class="float-right">700</span>

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
                            <input type="file" name="artist_image_2">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="artist_image_2_desc" maxlength="700" onkeyup="charCount(this)"
                            placeholder="Additional photo #2 description"
                            id="artist_image_2_desc">{{ Request::get('artist_image_2_desc') }}</textarea>
                            <span class="float-right">700</span>
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
                            <input type="file" name="artist_image_3">
                        </div>
                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="artist_image_3_desc" maxlength="700" onkeyup="charCount(this)"
                            placeholder="Additional photo #3 description"
                            id="artist_image_3_desc">{{ Request::get('artist_image_3_desc') }}</textarea>
                            <span class="float-right">700</span>
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
                            name="artist_media" placeholder="Paste url" value="{{ Request::get('artist_media') }}">
                    </div>


                    <div class=" col-5">
                        <textarea class="form-control border-0" name="artist_media_description" maxlength="700" onkeyup="charCount(this)"
                            placeholder="Media file description"
                            id="artist_media_description">{{ Request::get('artist_media_description') }}</textarea>
                            <span class="float-right">700</span>
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>

            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">

                    </div>


                    <div class=" col-9">
                        <textarea class="form-control border-0" name="artist_note" placeholder="Note" maxlength="700" onkeyup="charCount(this)"
                            id="artist_note">{{ Request::get('artist_note') }}</textarea>
                            <span class="float-right">700</span>
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>
            <div class="col-12 text-center mt-3">

                <div class="row w-100">
                    <div class="col-md-6 offset-3">
                        <div class="next-btn">
                            <button class="my-btn save_artist">ADD ARTWORK</button>
                            {{-- <input type="file" name="event_cover" id="event_cover" /> --}}
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</form>