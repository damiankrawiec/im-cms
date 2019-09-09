function validation($form){

    $($form + ' .text-danger').remove();

    var $icon = $('#warning-icon').html();

    var $submit = true;
    $($form + ' .validation').each(function(){

        if($(this).attr('class').indexOf(':') > -1){

            var $check = true;

            var $classValidation = $(this).attr('class');

            $typeValidation = $classValidation.split(':')[1];

            //!!!Define type of validation field
            if($typeValidation === 'text')
                $check = text($(this).val());

            if($typeValidation === 'select')
                $check = select($(this).val());

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

    var $modalData = $this.parent().find('.modal-data');

    if($modalData) {

        var $modalDataJson = $modalData.text();

        $modalData = JSON.parse($modalDataJson);

        $('#modal .modal-body').text($modalData.text);

        $('#modal').modal();

        modalButton($this, $modalData.save, $modalData.cancel);

    }

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

                    //Nice select plugin are specify dom structure
                    $this.next().children('.current').text($('#url-system').val());

                    $this.next().children('.list').children('li').each(function(){

                        if($(this).text() === $('#url-system').val()) {

                            $(this).addClass('selected');

                        }else{

                            $(this).removeClass('selected');

                        }

                    });

                }
            }

        }
        if($(this).attr('id') === 'modal-save') {

            if($save !== '') {
                //List of events fix to cancel
                if ($save === 'link-this-val') {

                    window.location = $this.val();

                }
                if ($save === 'submit-next-form') {

                    $this.next().submit();

                }

            }

        }

    });

}

function dataTables() {

    var $arrow = $('#arrow-type').html().split(',');

    $('.data-table').DataTable({
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
function closeAlertTop() {

    if($('.im-alert-top').length > 0) {

        var $alert = $('.im-alert-top');

        setTimeout(function(){

            $alert.slideUp();

        }, 10000);

    }

}
function datepicker() {

    $('.im-datepicker').datepicker();

    $('.im-datepicker').val($('.im-datepicker').next().val());

}
function editor() {

    if($('.editor').length > 0) {

        var $editor = new Jodit(".editor");

    }

}
function switchStatus($this) {

    var $class = $this.children().attr('class');

    if($class.indexOf('-on') > -1) {

        var $switchStatus = 'off';

        var $classNew = $class.replace('on', $switchStatus);

        $classNew = $classNew.replace('info', 'secondary');

    }

    if($class.indexOf('-off') > -1) {

        var $switchStatus = 'on';

        var $classNew = $class.replace('off', $switchStatus);

        $classNew = $classNew.replace('secondary', 'info');

    }

    return [$switchStatus, $classNew];

}
function sortStatus($this) {

    var $currentSwitch = $this.children('span').text();

    var $newSwitch = $this.attr('id');

    $this.children('span').text($newSwitch);

    $this.attr('id', $currentSwitch);

    var $dataTable = $this.parent().find('.table');

    if($dataTable.attr('class').indexOf('dataTable') > -1) {



    }else{



    }

}