function sendFormEvent($this, $path) {

    let $name = $this.find('.im-name').val();
    let $source = $this.find('.im-source').val();
    let $destination = $this.find('.im-destination').val();

    let $content = '';
    if($this.find('textarea').length)
        $content = tinyMCE.activeEditor.getContent();

    if($this.find('.im-content').length)
        $content = $('.im-content').html();

    $this.next().children('.im-hide').hide();

    if ($name !== '' && $source !== '' && $destination !== '' && $content !== '') {

        let $captcha = $this.find('.im-captcha').text();
        $captcha = $captcha.toLowerCase();

        let $captchaText = $this.find('.im-captcha-text').val();
        $captchaText = $captchaText.toLowerCase();

        let $hideForm = $this.find('.hide-form').length;
        if ($hideForm > 0 || ($hideForm === 0 && $captcha === $captchaText)) {

            let $systemName = $('#system-name').val();

            let $sendData = {
                "name": $name,
                "source": $source,
                "destination": $destination,
                "content": $content,
                "system": $systemName,
                "captcha": $captcha,
                "captchaText": $captchaText
            };

            let $attachment = $this.find('.attachment');
            if ($attachment.length) {

                if ($attachment.children('input[type="file"]').prop('files').length) {

                    let $formData = new FormData();

                    let $file = $attachment.children('input[type="file"]').prop('files')[0];

                    $formData.append('file', $file);

                    $formData.append('systemName', $attachment.children('input[type="hidden"]').val());

                    $sendData['file'] = attachment($formData);

                    $sendData['path'] = $attachment.children('input[type="hidden"]').val();

                }

            }

            sendForm($sendData, $this, $path);

        }
        if($hideForm === 0 && $captcha !== $captchaText) {

            $this.next().children('.alert-captcha').fadeIn();

        }

    } else {

        $this.next().children('.alert0').fadeIn();

    }

}

function sendForm($dataJson, $form, $path) {

    $.ajax({
        url: $path + 'ajax/send-form.php',
        method: 'post',
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

        setTimeout(function () {
            $form.slideUp()
        }, 700);

    });

}

/*
$.ajax({
    method: "POST",
    url: $path + "ajax/form-password.php",
    data: {
        id: $(this).attr('id')
    }
}).done(function ($data) {

    console.log($data);

});*/
