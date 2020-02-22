// /campaigns/index changing dom row after status click
function changeCampaingStatusClick(response,additional_data) {
    var row = $('#row-container-' + response.campaign_id);
    var button = row.find('.js-status-change')
    row.removeClass();
    row.addClass(response.class);
    button.removeClass();
    button.addClass('js-elem-submit js-status-change btn btn-'+response.class+' btn-xs');
    button.text(response.state);
}


// /campaigns/index changing dom row after status click
function casinoEnableDisableClick(response,additional_data) {
    var buttons = $('button[data-game_id=' + response.game_id + '][js-callbacks="casinoEnableDisableClick"]');
    buttons.removeClass();
    buttons.closest('tr').removeClass();
    if (response.state){
        buttons.addClass('btn-success');
        buttons.text('Enabled');
        buttons.closest('tr').addClass('success');
    }
    else{
        buttons.addClass('btn-warning');
        buttons.text('Disabled');
    }

    buttons.addClass('js-elem-submit btn btn-xs');
}

function changeStatusText(response, additional_data) {
    if (response.msg == "enabled") {
        $('#casinoAccountStatus').html('<b>Enabled</b>').removeClass('text-danger').addClass('text-success');
    } else {
        $('#casinoAccountStatus').html('<b>Blocked</b>').removeClass('text-success').addClass('text-danger');
    }
}
