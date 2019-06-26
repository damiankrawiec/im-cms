$(function(){

    //Init slider engine when dom exists
    if($('.pgwSlider').length > 0) {

        var $pgwSlider = $('.pgwSlider').pgwSlider();

        if($('#slider-setting').length > 0) {

            var $sliderSetting = $('#slider-setting').text();

            console.log($sliderSetting);
            $pgwSlider.reload({

            });

        }

    }

});