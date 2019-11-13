<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    $captchaData = array('system' => $this->systemName);
    require_once 'php/script/captcha.php';

    echo '<div'.$classField.'>';
        echo '<input type="text" class="form-control im-name" placeholder="'.$this->translationSystem['name'].'">';
        echo '<input type="text" class="form-control im-source" placeholder="'.$this->translationSystem['source'].'">';
        echo '<textarea class="editor"></textarea>';
        echo '<input type="text" class="form-control im-captcha-text" placeholder="'.$this->translationSystem['captcha-text'].'">';
        echo '<img src="'.$this->systemName.'/public/captcha/'.$imageStamp.'.png'.'" style="width:auto"><br>';
        echo '<input type="button" class="btn btn-light im-send" value="'.$this->translationSystem['send'].'">';
        echo '<input type="hidden" class="im-destination" value="'.$dataDisplay.'">';
        echo '<div class="im-hide im-captcha">'.$captcha.'</div>';
    echo '</div>';
    echo '<div>';
        echo '<div class="im-hide alert0">'.$this->translationSystem['form-error'].'</div>';
        echo '<div class="im-hide alert1">'.$this->translationSystem['form-ok'].'</div>';
        echo '<div class="im-hide alert-captcha">'.$this->translationSystem['captcha-error'].'</div>';
    echo '</div>';

}