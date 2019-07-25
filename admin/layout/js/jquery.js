$(function(){

    $('.submit').click(function(){

        $targetForm = '.' + $(this).attr('id');
        if($(this).attr('class').indexOf('validation-run') > -1) {

            if(validation($targetForm)){

                $($targetForm).submit();

            }else{

                $($targetForm).append('<p class="text-danger">' + $('#validation-error').val() + '</p>');

            }

        }else{

            $($targetForm).submit();

        }

    });

    $('input[type="password"]').keyup(function(){

        $('input[name="password"]').val(sha1($(this).val()));

    });

    $('.submit').click(function(){

        processButton($(this));

    });

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

});