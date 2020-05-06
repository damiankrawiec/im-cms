$(function(){

    translation();

    labelProperty('all');

    //Filter object by category in label box of each section
    $('.object-category').change(function(){

        //label, categoryId
        filterObject($(this).attr('id'), $(this).val());

    });

    $('.change-language ul li').click(function(){

        //system name of selected language
        setLanguage($(this).attr('id'));

    });

    $('#cookie button').click(function(){

        setCookie();

    });

    $('.im-move').click(function(){

        //Direction (left, right), paginationData (label, number objects of one page)
        move($(this).attr('id'), $(this).parent().attr('id').split(':'));

    });

    $('.im-send').click(function() {

        var $this = $(this).parent();

        var $name = $this.find('.im-name').val();
        var $source = $this.find('.im-source').val();
        var $destination = $this.find('.im-destination').val();
        var $content = tinyMCE.activeEditor.getContent();

        $this.next().children('.im-hide').hide();

        if ($name !== '' && $source !== '' && $destination !== '' && $content !== '') {

            var $captcha = $this.find('.im-captcha').text();
            $captcha = $captcha.toLowerCase();

            var $captchaText = $this.find('.im-captcha-text').val();
            $captchaText = $captchaText.toLowerCase();

            if($captcha === $captchaText) {

                var $sendData = {
                    "name": $name,
                    "source": $source,
                    "destination": $destination,
                    "content": $content,
                    "system": $('#system-name').val(),
                    "captcha": $captcha,
                    "captchaText": $captchaText
                };

                sendForm($sendData, $this);

            }else{

                $this.next().children('.alert-captcha').fadeIn();

            }

        }else{

            $this.next().children('.alert0').fadeIn();

        }

    });

    editor();

    scrollEvent();

    niceSelect();

    datepicker();

    gallery();

    popup();

    $('.no-data').hide();

});