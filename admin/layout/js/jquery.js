$(function(){

    $('.submit').click(function(){

        var $thisForm = '.' + $(this).attr('id');

        var $submit = true;
        $($thisForm + ' .validation').each(function(){

            if($(this).attr('class').indexOf(':') > -1){

                var $classValidation = $(this).attr('class');

                $typeValidation = $classValidation.split(':');

                if(!validation($typeValidation[1], $(this).val())){

                    $(this).next().show();

                    $submit = false;

                }

                if($submit){

                    $($thisForm).submit();

                }

            }

        });

    });

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

});