<form id="artworkSubmit" action="" enctype="multipart/form-data" method="POST" class="w-100">
    @csrf
    <div class="row">

        <div class="col-md-12  h-100px text-center" id="artwork-header" style="background-color:#cccccc">
            <div class="col-md-10 offset-1 mt-5">
                <div class="row ">
                    <div class="form-group col-1 text-right">
                        <i class="fa fa-floppy-o fa-2x mr-3 save_artwork" aria-hidden="true"></i>
                        <i class="fa fa-pencil-square-o fa-2x mt-1 edit_artwork" aria-hidden="true"></i>
                        <input type="hidden" name="artist_id" class="artist_id" value="{{ $artist_id }}">
                    </div>

                    <div class="form-group col-4">
                        <input type="text" class="form-control border-0" name="artwork_name" placeholder="Artwork name">
                    </div>

                    <div class="form-group col-2">


                    </div>

                    <div class="form-group col-5 text-right">


                    </div>
                </div>
            </div>
            {{-- <button type="button" class="btn btn-success mt-2 save_artist btn-block">Sacuvaj umetnika</button> --}}

        </div>
        <div class="artwork-wraper col-12 d-none">
            <div class="col-md-12 mt-3">
                <div class="col-md-10 offset-1">
                    <div class="row ">
                        <div class="form-group col-2 text-left">
                            <div class="upload-btn-wrapper">
                                <button class="my-btn">Upload Cover</button>
                                <input type="file" name="artwork_cover" />
                            </div>
                        </div>

                        <div class="form-group col-10">
                            <textarea class="form-control border-0" id="artwork_cover_description"
                                name="artwork_cover_description"></textarea>
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
                                <input type="file" name="artwork_image_1" />
                            </div>
                        </div>

                        <div class="form-group col-10">
                            <textarea class="form-control border-0" name="artwork_image_1_desc"
                                id="artwork_image_1_desc"></textarea>
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
                                <input type="file" name="artwork_image_2" />
                            </div>
                        </div>

                        <div class="form-group col-10">
                            <textarea class="form-control border-0" name="artwork_image_2_desc"
                                id="artwork_image_2_desc"></textarea>
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
                                <input type="file" name="artwork_image_3" />
                            </div>
                        </div>

                        <div class="form-group col-10">
                            <textarea class="form-control border-0" name="artwork_image_3_desc"
                                id="artwork_image_3_desc"></textarea>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-12 mt-3">
                <div class="col-md-10 offset-1">
                    <div class="row ">


                        <div class="form-group col-4">
                            <input type="text" name="artwork_media"
                                class="form-control  border-top-0 border-left-0 border-right-0" placeholder="Paste url">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">Media file description</label>
                            <textarea class="form-control border-0" name="artwork_media_desc"
                                id="artwork_media_desc"></textarea>
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
                            <textarea class="form-control border-0" name="artwork_note" id="artwork_note"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>