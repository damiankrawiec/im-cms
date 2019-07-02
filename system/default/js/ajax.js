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
            }
        }).done(function ($data) {

            console.log($data);

        });

    }

}