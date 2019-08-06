function setLanguage($language = false){

    if($language) {

        $.ajax({
            method: "POST",
            url: "ajax/setLanguage.php",
            data: {
                language: $language
            },
            beforeSend: function(){
                $('#process').show();
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

            $('#process').show();

        },
        complete: function(){

            $('#process').fadeOut(1000);

        }
    }).done(function() {

        refreshSession($label, $category);

    });

}

function refreshSession($label, $type) {

    $.ajax({
        method: "POST",
        url: "ajax/getSession.php"
    }).done(function ($data) {

        $('#session').text($data);

        hideNoData($label);

        labelProperty($label, $type);

    });

}