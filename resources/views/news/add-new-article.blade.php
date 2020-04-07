@extends('layout.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
<script src="https://cdn.tiny.cloud/1/6lpj0hls50t5fhszqn1yu17ptqwgc31358a1egzwi0uqx4ni/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector:'textarea#article_cover_description',
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
        var description = tinyMCE.get('article_cover_description').getContent();

        formData.append('desc', description);

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
            tinymce.remove();
            tinymce.init({
                selector:'textarea#article_cover_description',
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