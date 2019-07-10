function getFilteredObject($label = false, $categoryId = false){

    if($label && $categoryId) {

        var $systemName = $('#system-name').val();
        var $sectionId = $('#section-id').val();

        $.ajax({
            method: "POST",
            url: "ajax/getFilteredObject.php",
            data: {
                systemName: $systemName,
                section: $sectionId,
                label: $label,
                category: $categoryId
            },
            beforeSend: function(){
                $('.process').show();
            },
            complete: function(){
                $('.process').fadeOut('slow');
            }
        }).done(function ($data) {

            var $currentLabel = $('.' + $label);

            var $parentLabel = $currentLabel.parent();

            $currentLabel.remove();

            $parentLabel.append($data);

        });

    }

}
function setLanguage($language = false){

    if($language) {

        $.ajax({
            method: "POST",
            url: "ajax/changeLanguage.php",
            data: {
                language: $language
            },
            beforeSend: function(){
                $('.process').show();
            }
        }).done(function () {

            window.location.reload(true);

        });

    }

}