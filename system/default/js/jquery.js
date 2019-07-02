$(function(){

    //Filter object by category in label box of each section
    $('.object-category').change(function(){

        var $label = $(this).attr('id');

        var $categoryId = $(this).val();

        getFilteredObject($label, $categoryId);

    });

    //At the end init gallery effect
    $('a[data-rel^=lightcase]').lightcase();

});