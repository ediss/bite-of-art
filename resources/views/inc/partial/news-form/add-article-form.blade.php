<form id="articleSubmit" action="{{ route('add.new.article', app()->getLocale()) }}" enctype="multipart/form-data" method="POST">
    @csrf
    <!--Add article-->
    <div class="row">

        <div class="col-12 border-bottom border-top ">

            <div class="row elements-mid-align h-80px h-100px">
                <div class="col-2">
                    @if ( $validator && $validator->errors()->first('article_name') )
                    <div class="alert alert-danger text-center mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('article_name') }}
                    </div>
                    @endif
                </div>

                <div class=" col-2 offset-md-1 offset-lg-0 text-left">
                    <input type="text" class="form-control border-0" name="article_name" placeholder="article name"
                        value="{{ Request::get('article_name') }}">
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

    </div>

    <div class="article-wraper col-12 ">


        <div class="row elements-mid-align h-80px h-100px border-bottom">

            <div class="col-1 d-md-none d-lg-block">
                @if ( $validator && $validator->errors()->first('article_cover') )
                <div class="alert alert-danger text-center mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $validator->errors()->first('article_cover') }}
                </div>
                @endif
            </div>

            <div class=" col-1 col-md-2 offset-md-1 offset-lg-0 col-lg-1 text-left">
                <div class="upload-btn-wrapper">
                    <button class="my-btn">Upload Cover</button>
                    <input type="file" name="article_cover" id="article_cover" />
                </div>
            </div>


            <div class=" col-7">
                <textarea class="form-control border-0" name="article_cover_description" placeholder="About article"
                    maxlength="2000" onkeyup="charCount(this)"
                    id="article_cover_description">{{ Request::get('article_cover_description') }}</textarea>

            </div>
            <div class="col-1">
                <span class="float-left"></span>
            </div>

            <div class="col-2 d-md-none d-lg-block">
                @if ( $validator && $validator->errors()->first('article_cover_description') )
                <div class="alert alert-danger text-center mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $validator->errors()->first('article_cover_description') }}
                </div>
                @endif
            </div>
        </div>




        <div class="row elements-mid-align h-80px h-100px border-bottom">

            <div class="col-1">


            </div>

            <div class=" col-4 text-left">
                <input type="text" class="form-control  border-top-0 border-left-0 border-right-0" name="article_media"
                    placeholder="Paste url" value="{{ Request::get('article_media') }}">
            </div>


            <div class=" col-4">
                <textarea class="form-control border-0" name="article_media_description"
                    placeholder="Media file description" maxlength="2000" onkeyup="charCount(this)"
                    id="article_media_description">{{ Request::get('article_media_description') }}</textarea>
            </div>
            <div class="col-1">
                <span class="float-left"></span>
            </div>
            <div class="col-md-2"></div>
        </div>




        <div class="row elements-mid-align h-80px h-100px border-bottom">
            <div class="col-1">

            </div>

            
            <div class=" col-8">
                @if(Auth::user()->role_id == 2)
                <textarea class="form-control border-0" name="article_note" placeholder="Note" maxlength="2000"
                    onkeyup="charCount(this)" id="article_note">{{ Request::get('article_note') }}</textarea>
                @elseif(Auth::user()->role_id == 1)
                <input type="file" class="form-control" name="article_images[]" placeholder="address" multiple>
                @endif
            </div>
            

            
            <div class="col-1">
                <span class="float-left"></span>
            </div>
            <div class="col-2"></div>

        </div>

        <div class="row text-center mt-3">
                <div class="col-12">
                    <div class="next-btn">
                        <button class="my-btn save_article">SUBMIT ARTICLE</button>
                        {{-- <input type="file" name="event_cover" id="event_cover" /> --}}
                    </div>
                </div>
            </div>
    

    </div>

    <!--end article-->
</form>