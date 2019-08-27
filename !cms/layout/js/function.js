function validation($form){

    $($form + ' .text-danger').remove();

    var $icon = $('#warning-icon').html();

    var $submit = true;
    $($form + ' .validation').each(function(){

        if($(this).attr('class').indexOf(':') > -1){

            var $check = true;

            var $classValidation = $(this).attr('class');

            $typeValidation = $classValidation.split(':')[1];

            if($typeValidation === 'email')
                $check = email($(this).val());

            if($typeValidation === 'password')
                $check = password($(this).val());

            if(!$check){

                $(this).after($icon);

                $submit = false;
            }

        }

    });

    return $submit;

}
function processButton($this){

    $this.children('i').remove();

    $this.append($('#process-button').html());

    setTimeout(function () {
        $this.children('i').fadeOut();
    }, 500);

}
function currentSystem($interval){

    setInterval(function(){

        $('#current-system .animated').toggleClass('flash');

    }, $interval);

}
function initSection($start, $time) {

    $('#process').show();

    setTimeout(function() {

        $('body').animate({
            opacity: 1
        }, $time, function () {

            $('#process').fadeOut();

        });

    }, $start);

}

function modalInit($this){

    var $modalDataJson = $this.parent().find('.modal-data').text();

    $modalData = JSON.parse($modalDataJson);

    $('#modal .modal-body').text($modalData.text);

    $('#modal').modal();

    modalButton($this, $modalData.save, $modalData.cancel);

}

function modalButton($this, $save, $cancel){

    $('.modal-button').click(function(){

        if($(this).attr('id') === 'modal-cancel') {

            if($cancel !== '') {
                //List of events fix to cancel
                if ($cancel === 'reload') {

                    window.location.reload(true);

                }
                if ($cancel === 'this-option-reset') {

                    $this.children('option[selected=selected]').prop('selected', true);

                }
            }

        }
        if($(this).attr('id') === 'modal-save') {

            if($save !== '') {
                //List of events fix to cancel
                if ($save === 'link-this-val') {

                    window.location = $this.val();

                }

            }

        }

    });

}
function dataTables() {

    var $arrow = $('#arrow-type').html().split(',');

    $('.table').DataTable({
        'pagingType': 'full_numbers',
        'stateSave': true,
        'language': {
            'url': 'content/box/table/polish.json',
            'oPaginate': {
                'sFirst': $arrow[0],
                'sPrevious': $arrow[1],
                'sNext': $arrow[2],
                'sLast': $arrow[3]
            }
        }
    });

}
function niceSelect() {

    $('.select').niceSelect();

}
function gallery() {

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

}
function activeMenu() {

    if($('.navbar li.active').length === 0) {

        $('.navbar').find($('#' + $('#url-section').val())).parents('.nav-item').addClass('active');

    }
}