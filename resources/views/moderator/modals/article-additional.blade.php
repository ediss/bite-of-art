<form id="articleAdditional" method="POST" action={{ route('moderator.article.additional', ['id' => $article_id, 'language' =>app()->getLocale()]) }}
    enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <input type="hidden" value="{{ $article_id }}" class="hidden_article_id">
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label"><b>Video link</b></label>
                <input type="text" class="form-control" name="video_url">

            </div>

            <div class="col-md-6">
                <label class="form-control-label"><b>360&#176; image</b></label>
                <input type="text" class="form-control" name="img_360">
            </div>

        </div>

    </div>
    <div class="form-group">

        <div class="row">
            <div class="col-12">
                <label for=""><b>Additional images</b></label>
                <input type="file" class="form-control" name="new_article_images[]" placeholder="address"
                    multiple="true">
            </div>
        </div>

    </div>


    <script>
        function saveArticleAdditionalData() {
        var form = document.getElementById('articleAdditional');
        var formData = new FormData(form);
        
        var new_article_id = $('.hidden_article_id').val();

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      url: "/en/moderator/article-additional/"+new_article_id,
      method: 'post',
      contentType: false,
      processData: false,
      cache: false,
      data:formData,
      success: function(result){
        if (typeof result.message != "undefined" && result.message.length) {
            toastr[result.message[0]](result.message[1]);
        }

        if(result.success) {
            $('.modal').modal('hide');

        }


      }
  });
    }
$(document).on('click', '.my-js-submit', function(e) {
    e.preventDefault();
    saveArticleAdditionalData();
});

    </script>
</form>



@section('footer-scripts')


@endsection