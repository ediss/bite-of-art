function saveEvent(route) {
    var form = document.getElementById('eventSubmit');
    var formData = new FormData(form);
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
   $.ajax({
      // url: language+"/gallerist/add-new-event",
      url: route,
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
      error: function(request, status, error) {
        alert("error! Call developer! Email: skenderi.e94@gmail.com");
    
        alert(request.responseText);
      }

   });
}

function saveArtist(route) {

  var form = document.getElementById('artistSubmit');
  var formData = new FormData(form);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      url: route,
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
              $("#artist").html(result.html);
              $('.artist-wraper').removeClass('d-none');
          }
          if(result.success === true) {
              $( ".artist-wraper" ).animate({
                  left: '-100vw'
              }, 1000, function() {
                  $('.artist-wraper').addClass('d-none');

                  $("#artwork").removeClass('d-none').html(result.html).show().addClass('fadeInDRight animation-duration');

                  $('.artwork-wraper').removeClass('d-none').addClass('fadeInRight animation-duration');

              });
            }



      },
      error: function (request, status, error) {
        alert("error! Call developer! Email: skenderi.e94@gmail.com");
        alert(request.responseText);
    }

  });
}

//get locale

function saveArtwork(route) {
  var form = document.getElementById('artworkSubmit');
  var formData = new FormData(form);

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      url: route,
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
              $("#artwork").html(result.html);
              $('.artwork-wraper').removeClass('d-none');
            }
            if(result.success === true) {
              $('#artowrk-button').removeClass('d-none');
              $('#artwork').fadeOut('slow','swing')
            }



      },
      error: function (request, status, error) {
        alert("error! Call developer! Email: skenderi.e94@gmail.com");
        alert(request.responseText);
    }
  });
}