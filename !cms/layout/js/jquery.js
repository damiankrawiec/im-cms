$(function(){

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

        if($parameter[0] === 'add-new') {

            $this.hide();

            $('.sort-status').hide();

        }

    });

    $('.show-next-row').click(function() {

        var $this = $(this);

        var $currentRow = $this.parents('tr');

        if($currentRow.next('.next-row').length > 0) {

            $this.removeClass('btn-secondary');

            $this.addClass('btn-light');

            $currentRow.next('.next-row').remove();

        }else {

            $this.removeClass('btn-light');

            $this.addClass('btn-secondary');

            var $column = $this.attr('title');

            var $nextRow = '<tr class="next-row"><td colspan="' + $column + '">' + $this.next().html() + '</td></tr>';

            $($nextRow).insertAfter($currentRow);

        }

        //What i have to do after fire event (kinds of events)
        //if($parameter[1] === 'slide')
        //  $next.slideToggle();
        //
        //if($parameter[0] === 'add-new')
        //  $this.hide();

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

        $(this).parent().slideUp(500, function() {

            $('.show-next').show();

            $('.sort-status').show();

        });

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

            var $nextImage = $('.fix-image').next();

            insertToOption($nextImage, 'image');

            $nextImage.on('click', function(){

                insertToOption($nextImage, 'image');

            });

            $nextImage.children('input').on('keyup', function(){

                insertToOption($nextImage, 'image');

            });

        }

        if($('.fix-file').length > 0) {

            var $nextFile = $('.fix-file').next();

            insertToOption($nextFile, 'file');

            $nextFile.on('click', function(){

                insertToOption($nextFile, 'file');

            });

            $nextFile.children('input').on('keyup', function(){

                insertToOption($nextImage, 'file');

            });

        }

        if($('.fix-movie').length > 0) {

            var $nextMovie = $('.fix-movie').next();

            insertToOption($nextMovie, 'movie');

            $nextMovie.on('click', function(){

                insertToOption($nextMovie, 'movie');

            });

            $nextMovie.children('input').on('keyup', function(){

                insertToOption($nextMovie, 'movie');

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
        $('.object-move').click(function(){

            objectMove($(this).attr('id'));

        });

        if($('.validation-run').length > 0) {

            inputLength($('.validation-run'));

        }

        $('.size').on('keyup click focusout', function() {

            inputLengthOneField($(this));

        });

        currentShow();

        checkSubmenuIsEmpty()

        $('select.form-control').chosen();

        scrollEvent();

        fileDelete();

        if($('.copy-url').length > 0)
            copyUrl();

        if($('.edit').length > 0)
            fileCheckbox($('.edit').find('input[type="file"]'));

        if($('#update').length)
            system('update');

        if($('#backup').length > 0)
            system('backup');

        if($('#restore').length > 0)
            system('restore');

        $('[data-toggle="tooltip"]').tooltip();

        //Wait until editor has loaded
        setTimeout(function() {

            iconToEditor();

        }, 1200);

    }

});