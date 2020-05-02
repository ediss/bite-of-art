<form id="updateGallerist" method="POST"
    enctype="multipart/form-data" data-url ="{{ route('update.gallerist', ['id' => $gallerist->id, 'language' =>app()->getLocale()]) }}" >
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label class="form-control-label"><b>Curator Name</b></label>
                <input type="text" class="form-control" name="curator_name" value=" {{ $gallerist->name }} ">

            </div>

            <div class="col-md-4">
                @if ( $validator && $validator->errors()->first('gallery_name') )
                
                <div class="alert alert-danger text-center mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $validator->errors()->first('gallery_name') }}
                </div>
                @endif
                <label class="form-control-label"><b>Gallery Name</b></label>
                <input type="text" class="form-control" name="gallery_name" value="{{ $gallerist->gallery_name }}">
            </div>

            <div class="col-md-4">
                <label class="form-control-label"><b>Gallerist City</b></label>
                <input type="text" class="form-control" name="city_country" value="{{ $gallerist->city_country }}">
            </div>

        </div>

    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <label class="form-control-label"><b>About Gallery</b></label>

                <textarea name="about_gallery"  class="form-control">
                    {{$gallerist->about_gallery}}
                </textarea>

            </div>
        </div>
    </div>


    <div class="form-group">

        <div class="row">
            <div class="col-md-3">
                <label class="form-control-label"><b>Cover image</b></label>
                <p><img src="{{ $gallerist->gallery_cover }}" class="img-fluid"></p>
                
                <label class="form-control-label"><b>New cover image </b></label>
                <p><input type="file" name="gallery_cover" id="new_event_cover" /></p>
            </div>
            <div class="col-md-3">

                
            </div>
        </div>

    </div>


    <script>

$(document).on('click', '.my-js-submit', function(e) {
    e.preventDefault();
    var form = document.getElementById('updateGallerist');
        var formData = new FormData(form);
        var data_url = $("#updateGallerist").attr("data-url")


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      url: data_url,
      method: 'post',
      contentType: false,
      processData: false,
      cache: false,
      data:formData,
      success: function(result){

        // if(response.success === false) {
        //     $("#updateGallerist").html(response.html);
        // }
        if (typeof result.message != "undefined" && result.message.length) {
            toastr[result.message[0]](result.message[1]);
        }

        if(result.success) {
            $('.modal').modal('hide');

        }


      }
  });
});

    </script>
</form>



@section('footer-scripts')


@endsection