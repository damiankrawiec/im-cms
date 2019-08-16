$(function(){

    initSection(50, 300);

    translation();

    labelProperty('all');

    //Filter object by category in label box of each section
    $('.object-category').change(function(){

        //label, categoryId
        filterObject($(this).attr('id'), $(this).val());

    });

    $('#change-language li').click(function(){

        //system name of selected language
        setLanguage($(this).attr('id'));

    });

    $('.im-move').click(function(){

        //Direction (left, right), paginationData (label, number objects of one page)
        move($(this).attr('id'), $(this).parent().attr('id').split(':'));

    });

    niceSelect();

    gallery();

});