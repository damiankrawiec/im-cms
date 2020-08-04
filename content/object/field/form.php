<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    $dataDisplayArray = explode('|', $dataDisplay);

    $captchaData = array('system' => $this->systemName);
    require_once 'php/script/captcha.php';

    echo '<div'.$classField.'>';
        echo '<input type="text" class="form-control im-name" placeholder="'.$this->makeTranslationSystem('name').'">';
        echo '<input type="text" class="form-control im-source" placeholder="'.$this->makeTranslationSystem('source').'">';
        echo '<textarea class="editor"></textarea>';

        if($dataDisplayArray[1] != '') {
            echo '<form method="post" enctype="multipart/form-data" class="attachment">';
            echo '<label>'.$this->translationMark('im_object-attachment-'.$dataId, $dataDisplayArray[1]).'</label>';
            echo '<input type="file" name="file" class="im-file">';
            echo '<input type="hidden" name="systemName" value="../'.$this->systemName.'/public/file">';
            echo '</form>';
        }

        echo '<input type="text" class="form-control im-captcha-text" placeholder="'.$this->makeTranslationSystem('captcha-text').'">';
        echo '<img src="'.$this->systemName.'/public/captcha/'.$imageStamp.'.png'.'" style="width:auto">';
        echo '<input type="button" class="btn btn-light im-send" value="'.$this->makeTranslationSystem('send').'">';
        echo '<input type="hidden" class="im-destination" value="'.$dataDisplayArray[0].'">';
        echo '<div class="im-hide im-captcha">'.$captcha.'</div>';
    echo '</div>';
    echo '<div>';
        echo '<div class="im-hide alert0">'.$this->makeTranslationSystem('form-error').'</div>';
        echo '<div class="im-hide alert1">'.$this->makeTranslationSystem('form-ok').'</div>';
        echo '<div class="im-hide alert-captcha">'.$this->makeTranslationSystem('captcha-error').'</div>';
    echo '</div>';

}