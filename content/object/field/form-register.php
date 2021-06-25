<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    if(!isset($this->session['id'])) {

        echo '<div' . $classField . '>';

            $captchaData = array('system' => $this->systemName);
            require 'php/script/captcha.php';

            require_once 'content/field/form-register/form.php';

        echo '</div>';

        //require_once 'content/field/form-auth/alert.php';

    }else{

        echo '<h4 class="text-center">'.$this->makeTranslationSystem('login-current').'</h4>';

    }

}