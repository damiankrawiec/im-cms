<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    if(!isset($this->session['id'])) {

        $currentSectionUrl = $this->getSectionUrl($section);

        $varUrl = $this->addition->varUrl();

        echo '<div' . $classField . '>';
        if ($varUrl != '') {

            //Mail + captcha
            if(stristr($varUrl, 'nowe-haslo')) {

                $captchaData = array('system' => $this->systemName);
                require 'php/script/captcha.php';

                require_once 'content/field/form-auth/new-password.php';

            //Only button to set new password automatically
            }else{

                require_once 'content/field/form-auth/set-password.php';

            }

        } else {

            require_once 'content/field/form-auth/auth.php';

        }
        echo '</div>';

        require_once 'content/field/form-auth/alert.php';

        //At the end of the body tag hook sha1 library
        $GLOBALS['hash'] = true;

    }else{

        echo '<h4 class="text-center">'.$this->makeTranslationSystem('login-current').'</h4>';

    }

}