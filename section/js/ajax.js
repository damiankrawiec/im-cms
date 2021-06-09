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

function attachment($fileData) {

    return $.ajax({
        url: "ajax/attachment.php",
        method: 'post',
        data: $fileData,
        contentType: false,
        processData: false,
        dataType: 'text/html',
        async: false
    }).responseText;

}

function passwordAddress($email, $url, $form, $path) {

    $.ajax({
        method: "POST",
        url: "ajax/set-password-url.php",
        data: {
            system: $('#system').val(),
            email: $email,
            path: $url
        }
    }).done(function($data) {

        if($data != 'false') {

            sendFormEvent($form, $path);

        }else{

            $form.next().children('.alert0').fadeIn();

        }

    });

}

function passwordSet($email, $url, $form, $path) {

    $.ajax({
        method: "POST",
        url: "ajax/set-password.php",
        data: {
            system: $('#system').val(),
            email: $email,
            path: $url
        }
    }).done(function($data) {

        if($data != 'false') {

            sendFormEvent($form, $path, ': ' + $data);

        }else{

            $form.next().children('.alert0').fadeIn();

        }

    });

}