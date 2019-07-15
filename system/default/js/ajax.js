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