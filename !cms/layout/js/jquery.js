$(function(){

    currentSystem(3000);

    $('.submit').click(function(){

        processButton($(this));

        $targetForm = '.' + $(this).attr('id');
        if($(this).attr('class').indexOf('validation-run') > -1) {

            if(validation($targetForm)){

                $($targetForm).submit();

            }else{

                $($targetForm).append($('#validation-error').html());

            }

        }else{

            $($targetForm).submit();

        }

    });

    $('input[type="password"]').keyup(function(){

        $('input[name="password"]').val(sha1($(this).val()));

    });

    $('#select-system select').change(function(){

        window.location = $(this).val();

    });

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

});