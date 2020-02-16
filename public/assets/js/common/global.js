    $.blockUI.defaults.message = '<h3>Please wait</h3><img src="/images/loader.gif" alt="Please wait..." class="centerLoader">';

$.blockUI.defaults.css = {
    padding:        0,
    margin:         0,
    width:          '40%',
    top:            '40%',
    left:           '30%',
    textAlign:      'center',
    color:          '#ccc',
    cursor:         'wait',
    'background-color': 'transparent',
    border: 'none'
 };

// function initializeDatepickerRange() {
    
//         $('.js-datepicker-range').daterangepicker({
//             // opens: 'left',
//             locale: {
//             format: 'YYYY-MM-DD'
//         },

//         }, function(start, end, label) {
//             start.format('YYYY-MM-DD');
//         });
    
// }

// function initializeDatepicker(){
//     $('.js-datepicker').datepicker({
//         dateFormat: 'yy-mm-dd',
//         onSelect: function(datetext){
//             var d = new Date(); // for now
//             datetext=datetext+" 00:00:00";
//             $(this).val(datetext);
//         }
//     });

//     $('.js-datepicker-to').datepicker({
//         dateFormat: 'yy-mm-dd',
//         onSelect: function(datetext){
//             var d = new Date(); // for now
//             datetext=datetext+" 23:59:59";
//             $(this).val(datetext);
//         }
//     });
    
// }

// $(document).ready(function () {

//     $('.js-select2').select2({
//         theme: 'bootstrap4',
//         placeholder: '  -- Please select -- ',
//     });

    



//     initializeDatepicker();

// });

/*Copy to clipboard*/
// $(document).on('click', "a[data-action='copytoclipboard']", function (e) {
//     e.preventDefault();
//     var copyText = $(this).data('value');
//     var div_succes=$("#success");
//     clipboard.writeText(copyText);

//     div_succes.removeClass('d-none');
//     div_succes.html("Cashiertoken copied to clipboard"+ " "+ "<b>"+copyText+"<b/>");;

// });

function reloadPage(){
    location.reload();
}


// AjaxLoad.initialize();
