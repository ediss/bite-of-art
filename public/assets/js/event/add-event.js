function saveEvent() {
    var form = document.getElementById('eventSubmit');
    var formData = new FormData(form);
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
   $.ajax({
      url: "/test",
      method: 'post',
      contentType: false,
      processData: false,
      cache: false,

      data:formData,
      success: function(result){
          if(result.success === false) {
            $("#event").html(result.html);
          }
          if(result.success === true) {
            $( ".event-wraper" ).animate({
            left: '-100vw'
            }, 1000, function() {

            $('.event-wraper').addClass('d-none');

            // $('.add_artist').removeClass('d-none');

            $("#artist").removeClass('d-none').html(result.html).show().addClass('fadeInDRight animation-duration');
            $('.artist-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

            });
          }

      },
      error: function(xhr, status, error) {

      }

   });
}

function saveArtist() {

  var form = document.getElementById('artistSubmit');
  var formData = new FormData(form);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      url: "/submitArtist",
      method: 'post',
      contentType: false,
      processData: false,
      cache: false,

      data:formData,
      success: function(result){

          if(result.success === false) {
              $("#artist").html(result.html);
              $('.artist-wraper').removeClass('d-none');
          }
          if(result.success === true) {
              $( ".artist-wraper" ).animate({
                  left: '-100vw'
              }, 2000, function() {
                  $('.artist-wraper').addClass('d-none');

                  $("#artwork").removeClass('d-none').html(result.html).show().addClass('fadeInDRight animation-duration');

                  $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

              });
            }



      }
  });
}

function saveArtwork() {
  var form = document.getElementById('artworkSubmit');
  var formData = new FormData(form);

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      url: "/submitArtwork",
      method: 'post',
      contentType: false,
      processData: false,
      cache: false,
      data:formData,
      success: function(result){

          if(result.success === false) {
              $("#artwork").html(result.html);
              $('.artwork-wraper').removeClass('d-none');
            }
            if(result.success === true) {
              $('.add_artwork').removeClass('d-none');
              $('.done_artwork').removeClass('d-none');
              $('#artwork').fadeOut('slow','swing')
            }



      }
  });
}