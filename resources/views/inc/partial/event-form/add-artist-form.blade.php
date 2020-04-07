<form id="artistSubmit" action="" enctype="multipart/form-data" method="POST" class="mb-0">
    @csrf

    <div class="row">

        <!--Artist Name -->
        <div class="col-12" id="artist-header" style="background-color:#e6e6e6">
            <div class="row elements-mid-align h-80px h-100px">
                <div class="col-2">
                    <input type="hidden" class="event_id" name="event_id" value="{{$event_id}}">

                </div>

                <div class=" col-2 text-left">
                    <input type="text" name="artist_name" class="form-control border-0" placeholder="{{__("artist_name")}}"
                        value="{{ Request::get('artist_name') }}">
                </div>


                <div class=" col-6 text-center">


                </div>

                <div class="col-2 d-md-none d-lg-block">
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



        <div class="artist-wraper col-12 d-none">
            <!--About Artist -->

            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1 d-md-none d-lg-block">
                    @if ( $validator && $validator->errors()->first('artist_cover') )
                    <div class="alert alert-danger mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('artist_cover') }}
                    </div>
                    @endif
                </div>

                <div class=" p-0 col-1 col-md-2 offset-md-1 offset-lg-0 col-lg-1 text-left">
                        <div class="upload-btn-wrapper">
                        <button class="my-btn">{{__("upload_cover")}}</button>
                        <input type="file" name="artist_cover">
                    </div>
                </div>


                <div class="col-7">
                    <textarea class="form-control border-0" name="artist_about" placeholder="{{__("about_artist")}}"
                        maxlength="3500" onkeyup="charCount(this)"
                        id="artist_about">{{ Request::get('artist_about') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>

                <div class="col-2 d-md-none d-lg-block">
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
            <!--Artist Additional Photos -->

            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>

                <div class=" p-0 col-1 col-md-2 col-lg-1 text-left">
                        <div class="upload-btn-wrapper">
                        <button class="my-btn">{{__("additional_photo") }}#1</button>
                        <input type="file" name="artist_image_1">
                    </div>
                </div>
 

                <div class="col-7">
                    <textarea class="form-control border-0" name="artist_image_1_desc" maxlength="3500"
                        onkeyup="charCount(this)" placeholder="{{__("additional_photo") }}#1 {{__("description") }}"
                        id="artist_image_1_desc">{{ Request::get('artist_image_1_desc') }}</textarea>
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

                <div class=" p-0 col-1 col-md-2  col-lg-1 text-left">
                        <div class="upload-btn-wrapper">
                        <button class="my-btn">{{__("additional_photo") }}#2</button>
                        <input type="file" name="artist_image_2">
                    </div>
                </div>


                <div class="col-7">
                    <textarea class="form-control border-0" name="artist_image_2_desc" maxlength="2000"
                        onkeyup="charCount(this)" placeholder="{{__("additional_photo") }}#2 {{__("description") }}"
                        id="artist_image_2_desc">{{ Request::get('artist_image_2_desc') }}</textarea>
                </div>

                <div class="col-1">
                    <span class="float-left"></span>
                </div>

                <div class="col-2"></div>
            </div>

            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>

                <div class=" p-0 col-1 col-md-2  col-lg-1 text-left">
                        <div class="upload-btn-wrapper">
                        <button class="my-btn">{{__("additional_photo") }}#3</button>
                        <input type="file" name="artist_image_3">
                    </div>
                </div>


                <div class="col-7">
                    <textarea class="form-control border-0" name="artist_image_3_desc" maxlength="2000"
                        onkeyup="charCount(this)" placeholder="{{__("additional_photo") }}#3 {{__("description") }}"
                        id="artist_image_3_desc">{{ Request::get('artist_image_3_desc') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>
                <div class="col-2"></div>
            </div>
            <!--Artist Media Link -->

            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>

                <div class=" col-4 text-left">
                    <input type="text" class="form-control  border-top-0 border-left-0 border-right-0"
                        name="artist_media" placeholder="Paste url" value="{{ Request::get('artist_media') }}">
                </div>


                <div class=" col-5">
                    <textarea class="form-control border-0" name="artist_media_description" maxlength="2000"
                        onkeyup="charCount(this)" placeholder="{{__("media_file")}} {{__("description") }}"
                        id="artist_media_description">{{ Request::get('artist_media_description') }}</textarea>
                    <span class="float-left"></span>
                </div>
                <div class="col-2"></div>
            </div>
            <!--Artist Note -->

            <div class="row elements-mid-align h-80px h-100px border-bottom">
                <div class="col-1">

                </div>


                <div class=" col-8">
                    <textarea class="form-control border-0" name="artist_note" placeholder="{{__("note")}}" maxlength="2000"
                        onkeyup="charCount(this)" id="artist_note">{{ Request::get('artist_note') }}</textarea>
                </div>
                <div class="col-1">
                    <span class="float-left"></span>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row text-center mt-3">
                <div class="col-12">
                    <div class="next-btn">
                        <button class="my-btn-2 save_artist">{{__("add_artwork")}}</button>
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
</form>