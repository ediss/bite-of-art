@extends('layout.dashboard')
@section('css')

<script src="https://cdn.tiny.cloud/1/6lpj0hls50t5fhszqn1yu17ptqwgc31358a1egzwi0uqx4ni/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
       tinymce.init({
              selector:'textarea',
              menubar:false,
              branding: false,
              plugins: "link wordcount",
              default_link_target: "_blank",
              toolbar: "undo redo | underline bold italic|alignjustify| link ",
              
              //toolbar:"styleselect",

              // style_formats: [
              //     {title: 'Headers', items: [
              //         {title: 'Header 1', format: 'h1'},
              //         {title: 'Header 2', format: 'h2'},
              //         {title: 'Header 3', format: 'h3'},
              //         {title: 'Header 4', format: 'h4'},
              //         {title: 'Header 5', format: 'h5'},
              //         {title: 'Header 6', format: 'h6'}
              //     ]}
              // ],
          });
</script>
@endsection

@section('content')

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
                <input type="text" name="new_daterange" id="new_daterange" class="form-control text-center js-datepicker-range"
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
    </div>
<hr>
    <div class="form-group">
        <div class="row">

            <div class="col-12 text-center">
                <h1>Additional images</h1>
            </div>
            
            @foreach ($article_additional as $item)
                <div class="col-md-3">
                    <p><img src="{{ url($item->article_img) }}" class="img-fluid"></p>
                    <label class="form-control-label"><b>Change image </b></label>
                    <p><input type="file" name="new_article_image_{{ $item->id }}" /> </p>
                    <p><input type="checkbox" name="which_img[]" value="{{ $item->id }}">Change</p>
                    
                </div>
            @endforeach


        </div>
    </div>
    <div class="form-group">
    <div class="row">
        <div class="col-8 offset-2 text-center">
            <input type="submit" class="btn btn-lg btn-primary" value="Update article">
        </div>
    </div>
    </div>

</form>
@endsection



@section('footer-scripts')
<script>
        $('.js-datepicker-range').daterangepicker({
        opens:"center",
        singleDatePicker: true,

        locale: {
            format: 'YYYY-MM-DD'
        },
    });
</script>

@endsection