$(function(){

    initSection(100, 300);

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

    $('.show-next').click(function() {

        var $this = $(this);

        var $parameter = $this.attr('id').split(':');

        var $next = $this.nextAll('.' + $parameter[0]);

        //if($parameter[1] === 'slide')
            $next.slideToggle();

    });

    $('input[type="password"]').keyup(function(){

        $('input[name="password"]').val(sha1($(this).val()));

    });

    $('.modal-change').change(function(){

        modalInit($(this));

    });

    $('.modal-click').click(function(){

        modalInit($(this));

    });

    if($('#current-system').length > 0) {

        dataTables();

        niceSelect();

        activeMenu();

        closeAlertTop();

        datepicker();

        gallery();

        editor();

        $('.status').click(function() {

            changeStatus($(this));

        });

        $('.sort-status').click(function() {

            sortStatus($(this));

        });

        $('.copy').click(function(){

            copyField($(this).attr('title'))

        });

        currentShow();

        $('select.form-control').chosen();

    }

});