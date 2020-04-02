@extends('layout.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('logo-img')
<div class="close-gallery animation-duration2 fadeInDown"></div>
@endsection

@section('content')
<div id = "article">
@include('inc.partial.news-form.add-article-form')
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src=" {{ asset('plugins/toastr/toastr.min.js') }}"></script>

<script src=" {{ asset('assets/js/common/ajaxload.js') }}"></script>
<script src=" {{ asset('assets/js/common/pagination.js') }}"></script>
<script src=" {{ asset('assets/js/common/global.js') }}"></script>

<script>
AjaxLoad.initialize();
</script>


<script>
    $('.js-datepicker-range').daterangepicker({
        opens:"center",
        singleDatePicker: true,    
        locale: {
            format: 'YYYY-MM-DD'
        },
    });
</script>

<script>

    function saveArticle() {
        var form = document.getElementById('articleSubmit');
        var formData = new FormData(form);

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
    
      url: "{{ route('add.new.article', app()->getLocale()) }}",
      method: 'post',
      contentType: false,
      processData: false,
      cache: false,
      data:formData,
      success: function(result){
        if (typeof result.message != "undefined" && result.message.length) {
            toastr[result.message[0]](result.message[1]);
        }

        if(result.success === false) {
            $("#article").html(result.html);
          }
      }
  });
    }
$(document).on('click', '.save_article', function(e) {
    e.preventDefault();
    saveArticle();
});
</script>
<script>
    $(".close-gallery").click(function(e) {
    
    $(this).removeClass('fadeInDown').addClass('fadeOutUp');
    setTimeout(function() {
      window.location.href = "{{url()->previous() }}";
    });
    });
    </script>
@endsection