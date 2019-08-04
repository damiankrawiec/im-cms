function setLanguage($language = false){

    if($language) {

        $.ajax({
            method: "POST",
            url: "ajax/setLanguage.php",
            data: {
                language: $language
            },
            beforeSend: function(){
                $('.process').show();
            }
        }).done(function () {

            document.location.reload(true);

        });

    }

}
function setFilter($label, $category) {

    $.ajax({
        method: "POST",
        url: "ajax/setFilter.php",
        data: {
            label: $label,
            category: $category
        },
        beforeSend: function(){
            $('.process').show();
        },
        complete: function(){
            $('.process').fadeOut('slow');
        }
    }).done(function () {

        labelProperty();

        // if($category > 0) {
        //
        //     filterObjectDisplay($label, $category);
        //
        // }else{
        //
        //     $('.' + $label + ' .object').each(function(){
        //
        //         $(this).removeClass('im-hide-category');
        //
        //     });
        //
        // }

    });

}