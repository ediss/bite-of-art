@extends('layout.dashboard')
@section('css')

<script src="https://cdn.tiny.cloud/1/6lpj0hls50t5fhszqn1yu17ptqwgc31358a1egzwi0uqx4ni/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector:'textarea',
        plugins: "link wordcount",
        menubar: false,
        default_link_target: "_blank",
        toolbar: "undo redo | underline bold italic|alignjustify| link "
    });
</script>
@endsection

@section('content')
@if(session()->has('message-success'))
    <div class="alert alert-success">
        {{ session()->get('message-success') }}
    </div>
@elseif(session()->has('message-error'))
<div class="alert alert-danger">
    {{ session()->get('message-success') }}
</div>
@endif
<h1>{{ $article->article_name }}</h1>
<form method="POST"
    action={{ route('moderator.article.update', ['id' => $article->id, app()->getLocale()]) }}
    enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Name</b></label>
                <input type="text" class="form-control" name="new_article_name" value="{{ $article->article_name }}">


                @if ( $validator && $validator->errors()->first('new_article_name') )
                <div class="alert alert-danger mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $validator->errors()->first('new_article_name') }}
                </div>
                @endif

            </div>

            <div class="col-md-6">
                <label class="form-control-label"><b>Date</b></label>
                <input type="text" name="new_daterange" class="form-control text-center js-datepicker-range"
                    value="{{ $article->article_open }}">
            </div>

        </div>

    </div>
    <div class="form-group">

        <div class="row">
            <div class="col-12">

            </div>
        </div>

    </div>


    <div class="form-group mt-4">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Article text(EN)</b></label>
                <textarea name="new_article_text" id="new_article_text" cols="30" rows="10"
                    class="form-control">{{ $article->article_description }}</textarea>
                @if ( $validator && $validator->errors()->first('new_article_text') )
                <div class="alert alert-danger mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $validator->errors()->first('new_article_text') }}
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>Article text(SRB)</b></label>
                <textarea name="new_article_text_srb" id="new_article_text_srb" cols="30" rows="10"
                    class="form-control">{{ $article->srb_article_description }}</textarea>
            </div>
            <div class="col-md-6 mt-4">
                <label class="form-control-label"><b>Article text(ESP)</b></label>
                <textarea name="new_article_text_esp" id="new_article_text_esp" cols="30" rows="10"
                    class="form-control">{{ $article->esp_article_description }}</textarea>
            </div>
            <div class="col-md-6 mt-4">
                <label class="form-control-label"><b>Article text(SLO)</b></label>
                <textarea name="new_article_text_slo" id="new_article_text_slo" cols="30" rows="10"
                    class="form-control">{{ $article->slo_article_description }}</textarea>
            </div>
        </div>

    </div>


    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label class="form-control-label"><b>Cover image</b></label>
                <p><img src="{{ url($article->article_cover) }}" class="img-fluid"></p>
                <label class="form-control-label"><b>New cover image </b></label>
                <p><input type="file" name="new_article_cover" id="new_article_cover" /></p>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>


        </div>



        {{-- <input type="password" placeholder="Password" class="form-control"> --}}
    </div>
    <div class="form-group">
    <div class="row">
        <div class="col-8 offset-2 text-center">
            <input type="submit" class="btn btn-lg btn-primary" value="Update article">
        </div>
    </div>
    </div>

    
    <script>
        $('.js-datepicker-range').daterangepicker({
                opens:"center",
                singleDatePicker: true,
                locale: {
                format: 'YYYY.MM.DD'
            },
            });
    </script>
</form>
@endsection



@section('footer-scripts')


@endsection