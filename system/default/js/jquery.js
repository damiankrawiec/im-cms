$(function(){

    //Filter object by category in label box of each section
    $('.object-category').change(function(){

        //label, categoryId
        filterObject($(this).attr('id'), $(this).val());

    });

    $('#change-language li').click(function(){

        //system name of selected language
        setLanguage($(this).attr('id'));

    });

    filterObjectStart();

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

});