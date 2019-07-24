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

    $this.next().remove();

    $this.after($('#process-button').html());

    setTimeout(function () {
        $this.next().fadeOut();
    }, 500);

}