@extends('layout.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('logo-img')
    <div class="close-gallery"></div>
@endsection

@section('content')
<form id="articleSubmit" action="" enctype="multipart/form-data" method="POST">
    @csrf
    <!--Add article-->
    <div class="row">

        <div class="col-md-12 border-bottom border-top ">

            <div class="row elements-mid-align">
                <div class="col-md-2">
                    @if ( $validator && $validator->errors()->first('article_name') )
                    <div class="alert alert-danger text-center mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $validator->errors()->first('article_name') }}
                    </div>
                    @endif
                </div>

                <div class=" col-2 text-left">
                    <input type="text" class="form-control border-0" name="article_name" placeholder="article name"
                        value="{{ Request::get('article_name') }}">
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

    </div>

    <div class="row p-0">

        <div class="article-wraper col-12 p-0">
            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">
                        @if ( $validator && $validator->errors()->first('article_cover') )
                        <div class="alert alert-danger text-center mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('article_cover') }}
                        </div>
                        @endif
                    </div>

                    <div class=" col-1 text-left">
                        <div class="upload-btn-wrapper">
                            <button class="my-btn">Upload Cover</button>
                            <input type="file" name="article_cover" id="article_cover" />
                        </div>
                    </div>


                    <div class=" col-7">
                        <textarea class="form-control border-0" name="article_cover_description"
                            placeholder="About article" maxlength="700" onkeyup="charCount(this)"
                            id="article_cover_description">{{ Request::get('article_cover_description') }}</textarea>

                    </div>
                    <div class="col-1">
                        <span class="float-left">700</span>
                    </div>

                    <div class="col-md-2">
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
            </div>


            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">

                    </div>

                    <div class=" col-4 text-left">
                        <input type="text" class="form-control  border-top-0 border-left-0 border-right-0"
                            name="article_media" placeholder="Paste url" value="{{ Request::get('article_media') }}">
                    </div>


                    <div class=" col-4">
                        <textarea class="form-control border-0" name="article_media_description"
                            placeholder="Media file description" maxlength="700" onkeyup="charCount(this)"
                            id="article_media_description">{{ Request::get('article_media_description') }}</textarea>
                    </div>
                    <div class="col-1">
                        <span class="float-left">700</span>
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>

            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class="col-md-1">

                    </div>


                    <div class=" col-8">
                        <textarea class="form-control border-0" name="article_note" placeholder="Note" maxlength="700"
                            onkeyup="charCount(this)" id="article_note">{{ Request::get('article_note') }}</textarea>

                    </div>
                    <div class="col-1">
                        <span class="float-left">700</span>
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>
            <div class="col-12 text-center mt-3">

                <div class="row w-100">
                    <div class="col-md-6 offset-3">
                        <div class="next-btn">
                            <button class="my-btns-new save_news" style="padding: 10px 5px !important;">SUBMIT
                                ARTICLE</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!--end article-->
</form>
@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $('.js-datepicker-range').daterangepicker({
        singleDatePicker: true,    
        locale: {
            format: 'YYYY-MM-DD'
        },
    });
</script>
@endsection