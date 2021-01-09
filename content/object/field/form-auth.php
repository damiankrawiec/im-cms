<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    $captchaData = array('system' => $this->systemName);
    require 'php/script/captcha.php';

    echo '<div' . $classField . '>';
    echo '<p>'.$dataDisplay.'</p>';
    echo '<form method="post" class="auth">';
    echo '<input type="text" class="form-control" placeholder="' . $this->makeTranslationSystem('email') . '">';
    echo '<input type="password" class="form-control" placeholder="' . $this->makeTranslationSystem('password') . '">';
    echo '<input type="text" class="form-control im-captcha-text" placeholder="' . $this->makeTranslationSystem('captcha-text') . '">';
    echo '<img src="' . $this->systemName . '/public/captcha/' . $imageStamp . '.png' . '" style="width:auto">';
    echo '<div class="im-hide im-captcha">' . $captcha . '</div>';
    echo '</form>';
    echo '</div>';
    echo '<button class="btn btn-secondary submit" id="auth">' . $this->makeTranslationSystem('login') . '</button>';

}