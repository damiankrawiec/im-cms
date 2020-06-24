function setLanguage($language = false){

    if($language) {

        $.ajax({
            method: "POST",
            url: "ajax/set-session.php",
            data: {
                session: {
                    "name": "language",
                    "value": $language
                }
            },
            beforeSend: function(){
                $('#process').show();
            }
        }).done(function () {

            window.location = $('#url').val();

        });

    }

}
function setCookie(){

    $.ajax({
        method: "POST",
        url: "ajax/set-session.php",
        data: {
            session: {
                "name": "cookie",
                "value": "true"
            }
        },
        beforeSend: function(){
            $('#process').show();
        }

    }).done(function () {

        $('#process').hide();

        $('#cookie').slideUp();

    });

}
function setFilter($label, $category) {

    $.ajax({
        method: "POST",
        url: "ajax/set-filter.php",
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
        url: "ajax/get-session.php"
    }).done(function ($data) {

        $('#session').text($data);

        hideNoData($label);

        labelProperty($label, $type);

    });

}

function sendForm($dataJson, $form) {

    $.ajax({
        method: "POST",
        url: "ajax/send-form.php",
        data: {
            sendForm: $dataJson
        },
        beforeSend: function(){

            $('#process').show();

        },
        complete: function(){

            $('#process').fadeOut(1000);

        }
    }).done(function() {

        $form.next().children('.alert1').fadeIn();

        $form.addClass('animated zoomOutUp');

        setTimeout(function(){$form.slideUp()}, 700);

    });

}

function baseDecode($object, $data) {

     $.ajax({
        method: "POST",
        url: "ajax/base-decode.php",
        data: {
            string: $data
        }
    }).done(function($dataOut) {

         $object.html($dataOut);

    });

}