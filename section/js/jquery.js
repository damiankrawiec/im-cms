$(function(){

    loadingPage();

    translation();

    dataTables();

    $('.data-table').DataTable();

    closeAlertTop();

    setTimeout(optimizeImage, 2000);

    setTimeout(gallery, 3000);

    hashPage();

    labelProperty('all');

    $('select.form-control').chosen();

    //Filter object by category in label box of each section
    $('.object-category').change(function(){

        //label, categoryId
        filterObject($(this).attr('id'), $(this).val());

    });

    $('.change-language ul li').click(function(){

        //system name of selected language
        setLanguage($(this).attr('id'));

    });

    $('.navbar-toggler').click(function() {

        let $this = $(this);

        let $children = $this.children();

        if($this.attr('aria-expanded') === 'false') {

            $children.hide();

            $children.next().fadeIn();

        }else{

            $children.fadeIn();

            $children.next().hide();

        }


    });

    $('.cookie').on('click', 'button', function(){

        setCookie();

    });

    $('.im-move').click(function(){

        //Direction (left, right), paginationData (label, number objects of one page)
        move($(this).attr('id'), $(this).parent().attr('id').split(':'));

    });

    $('.run-package').click(function(){

        $(this).next().show();

    });


    $('body').on('click', '.im-send', function () {

        sendFormEvent($(this).parent(), '');

    });
    $('body').on('click', '.im-password-address', function () {

        let $parent = $(this).parent();

        passwordAddress($parent.find('.im-destination').val(), $parent.find('.im-content').attr('id'), $parent, '');

    });
    $('body').on('click', '.im-password', function () {

        let $parent = $(this).parent();

        passwordSet($parent.find('.im-destination').val(), $parent.find('.im-content').attr('id'), $parent, '');

    });

    validationRun();

    editor();

    scrollEvent();

    niceSelect();

    datepicker();

    popup();

    $('.no-data').hide();

});