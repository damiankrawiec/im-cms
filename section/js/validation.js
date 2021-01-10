function validation($form){

    $($form + ' .text-danger').remove();

    var $icon = $('#warning-icon').html();

    var $submit = true;
    $($form + ' .validation').each(function(){

        var $this = $(this);

        if($this.attr('class').indexOf(':') > -1){

            var $check = true;

            var $typeValidation = $this.attr('class').split(':')[1];

            //!!!Define type of validation field
            if($typeValidation === 'text')
                $check = text($this.val());

            if($typeValidation === 'select')
                $check = select($this.val());

            if($typeValidation === 'email')
                $check = email($this.val());

            if($typeValidation === 'icon')
                $check = icon($this.val());

            if($typeValidation === 'password')
                $check = password($this.val());

            if($typeValidation === 'file')
                $check = file($this.val());

            if($typeValidation === 'source')
                $check = source($this.val());

            if($typeValidation.indexOf( 'textarea') > -1)
                $check = textarea($this.parent().find('.tox-tinymce').find('.tox-edit-area').html());

            if(!$check){

                $this.after($icon);

                $submit = false;
            }

        }

    });

    $($form + ' .size').each(function(){

        var $this = $(this);

        var $check = true;

        $check = size($this.val(), $this.attr('size'));

        if(!$check){

            $this.after($icon);

            $submit = false;
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

function email($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    if($string.indexOf('@') == -1)
        $check = false;

    return $check;

}
function icon($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    if($string.indexOf('fa-') == -1)
        $check = false;

    return $check;

}
function password($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    return $check;

}
function text($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    return $check;

}
function select($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    if($string == 0)
        $check = false;

    return $check;

}
function file($file = '') {

    var $check = true;

    if($file == '')
        $check = false;

    return $check;

}
function source($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    return $check;

}
function textarea($string = '') {

    var $check = true;

    if($string == '')
        $check = false;

    return $check;

}
function size($string = '', $size = 0) {

    var $check = true;

    if($string.length > parseInt($size))
        $check = false;

    return $check;

}