$(function(){

    initSection(100, 300);

    currentSystem(3000);

    $('.submit').click(function(){

        $this = $(this);

        processButton($this);

        $targetForm = '.' + $this.attr('id');
        if($this.attr('class').indexOf('validation-run') > -1) {

            if(validation($targetForm)){

                if($this.attr('class').indexOf('collection-run') > -1)
                    collection();

                $($targetForm).submit();

            }else{

                $($targetForm).append($('#validation-error').html());

            }

        }else{

            if($this.attr('class').indexOf('collection-run') > -1)
                collection();

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

    $('#add-cancel').click(function(){

        $(this).parent().slideUp();

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

        $('.filter').change(function() {

            filter($(this).val());

        });

        if($('.collection').length > 0) {

            fix();

            $('.fix-box .order').each(function(){

                fixSort($(this));

            });

        }

        if($('.fix-image').length > 0) {

            imageToOption($('.fix-image').next());

            $('.fix-image').next().on('click', function(){

                imageToOption($('.fix-image').next());

            });

        }

        $('.selected-wrapper').change(function(){

            var $this = $(this);

            var $idArray = [];
            $this.children('a').each(function(){

                $idArray.push($(this).attr('data-value'));

            });

            $this.parent().next().val($idArray.join());

        });

        $('.translation-move').click(function(){

            translationMove($(this).attr('id'));

        });

        currentShow();

        $('select.form-control').chosen();

        scrollEvent();

    }

});