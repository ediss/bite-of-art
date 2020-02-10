<form id="artistSubmit" action="" enctype="multipart/form-data" method="POST" class="w-100">
    @csrf
    <div class="row">
    <div class="col-md-12 border-top h-100px text-center" id="artist-header" style="background-color:#cccccc">
        <div class="col-md-10 offset-1 mt-5">
            <div class="row ">
                <div class="form-group col-1 text-right">
                    <i class="fa fa-floppy-o fa-2x mr-3 save_artist" aria-hidden="true"></i>
                    <i class="fa fa-pencil-square-o fa-2x mt-1 edit_artist" aria-hidden="true"></i>
                    <input type="hidden" name="event_id" value="{{$event_id}}">
                    <input type="hidden" class="artist_id" name="artist_id" value="">
                </div>

                <div class="form-group col-4">
                    <input type="text" name="artist_name" class="form-control border-0"
                        placeholder="Artist name">
                </div>

                <div class="form-group col-2">


                </div>

                <div class="form-group col-5 text-right">
                    <button type="button" class="btn btn-outline-dark font-weight-bold add_artwork d-none">ADD
                        ARTWORK</button>

                </div>
            </div>
        </div>
        {{-- <button type="button" class="btn btn-success mt-2 save_artist btn-block">Sacuvaj umetnika</button> --}}

    </div>
    <div class="artist-wraper col-12 d-none">
        <div class="col-md-12 mt-3">
            <div class="col-md-10 offset-1">
                <div class="row ">
                    <div class="form-group col-2 text-left">
                        <div class="upload-btn-wrapper">
                            <button class="my-btn">Upload Cover</button>
                            <input type="file" name="artist_cover" />
                        </div>
                    </div>

                    <div class="form-group col-10">
                        <textarea class="form-control border-0" name="artist_about"
                            id="artist_about"></textarea>
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
                            <input type="file" name="artist_image_1" />
                        </div>
                    </div>

                    <div class="form-group col-10">
                        <textarea class="form-control border-0" name="artist_image_1_desc"
                            id="artist_image_1_desc"></textarea>
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
                            <input type="file" name="artist_image_2" />
                        </div>
                    </div>

                    <div class="form-group col-10">
                        <textarea class="form-control border-0" name="artist_image_2_desc"
                            id="artist_image_2_desc"></textarea>
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
                            <input type="file" name="artist_image_3" />
                        </div>
                    </div>

                    <div class="form-group col-10">
                        <textarea class="form-control border-0" name="artist_image_3_desc"
                            id="artist_image_3_desc"></textarea>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-12 mt-3">
            <div class="col-md-10 offset-1">
                <div class="row ">
                    <div class="form-group col-4">
                        <input type="text" name="artist_media"
                            class="form-control  border-top-0 border-left-0 border-right-0"
                            placeholder="Paste url">
                    </div>
                </div>
                <div class="row">
                    <label for="">Media file description</label>
                    <div class="form-group col-4">
                        <textarea class="form-control border-0" id="artist_media_description"
                            name="artist_media_description"></textarea>
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
                        <textarea class="form-control border-0" name="artist_note"
                            id="artist_note"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>