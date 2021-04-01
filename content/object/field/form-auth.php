<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    if(!isset($this->session['id'])) {

        $currentSectionUrl = $this->getSectionUrl($section);

        $varUrl = $this->addition->varUrl();

        echo '<div' . $classField . '>';
        if ($varUrl != '') {

            //Mail + captcha
            if(stristr($varUrl, 'nowe-haslo')) {

                //$captchaData = array('system' => $this->systemName);
                //require 'php/script/captcha.php';

                $passwordUrl = $this->addition->transaction();

                echo '<h4>' . $this->makeTranslationSystem('system-address') . '</h4>';
                echo '<input type="text" class="form-control im-destination" placeholder="'.$this->makeTranslationSystem('email').'">';
                //echo '<input type="text" class="form-control im-captcha-text" placeholder="'.$this->makeTranslationSystem('captcha-text').'">';
                //echo '<img src="'.$this->systemName.'/public/captcha/'.$imageStamp.'.png'.'" style="width:auto">';
                echo '<input type="button" class="btn btn-secondary im-password-address" value="'.$this->makeTranslationSystem('send').'">';

                echo '<input type="hidden" class="im-name" value="'.$this->makeTranslationSystem('new-password').'">';
                echo '<input type="hidden" class="im-source" value="'.$this->domain.'">';
                echo '<div class="im-content im-hide" id="'.$passwordUrl.'">'.$this->makeTranslationSystem('new-password-address').': <a href="http://'.$this->domain.'/'.$currentSectionUrl.','.$passwordUrl.'">'.$this->domain.'/'.$currentSectionUrl.'</a></div>';
                //echo '<div class="im-hide im-captcha">'.$captcha.'</div>';
                echo '<a href="'.$currentSectionUrl.'" class="btn btn-light">' . $this->makeTranslationSystem('back') . '</a>';
                echo '<input type="hidden" class="hide-form">';

            //Only button to set new password automatically
            }else{

                $varUrlArray = explode(',', $varUrl);

                $passwordUrl = $varUrlArray[1];

                $sql = 'select email from im_user where password_url like :url';

                $this->db->prepare($sql);

                $parameter = array(
                    array('name' => ':url', 'value' => $passwordUrl, 'type' => 'string')
                );

                $this->db->bind($parameter);

                $userUrl = $this->db->run('one');

                if($userUrl) {

                     echo '<h4>' . $this->makeTranslationSystem('set-password') . '</h4>';
                     echo '<input type="hidden" class="im-destination" value="'.$userUrl->email.'">';
                     echo '<input type="button" class="btn btn-danger im-password" value="'.$this->makeTranslationSystem('set-password').'">';
                     echo '<input type="hidden" class="im-name" value="'.$this->makeTranslationSystem('new-password-set').'">';
                     echo '<input type="hidden" class="im-source" value="'.$this->domain.'">';
                     echo '<div class="im-content im-hide" id="'.$passwordUrl.'">'.$this->makeTranslationSystem('new-password-set').'</div>';
                     echo '<input type="hidden" class="hide-form">';

                }else echo $this->makeTranslationSystem('no-data');

            }

        } else {

            echo '<h4>' . $dataDisplay . '</h4>';
            echo '<form method="post" class="auth">';
            echo '<div class="form-group">';
                echo '<label for="email">'.$this->makeTranslationSystem('email').'</label>';
                echo '<input type="text" name="form_email" id="email" class="form-control validation :email" placeholder="' . $this->makeTranslationSystem('email') . '">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label for="password">'.$this->makeTranslationSystem('password').'</label>';
                echo '<input type="password" id="password" class="form-control validation :text" placeholder="' . $this->makeTranslationSystem('password') . '">';
            echo '</div>';
            echo '<input type="hidden" name="form_password">';
            echo '<input type="hidden" name="event" value="auth"> ';
            echo '<input type="hidden" name="transaction" value="' . $this->addition->transaction() . '">';
            echo '</form>';
            echo '<button class="btn btn-secondary submit validation-run" id="auth">' . $this->makeTranslationSystem('login') . '</button>';
            echo '<a href="'.$currentSectionUrl.',nowe-haslo" class="btn btn-light">' . $this->makeTranslationSystem('new-password') . '</a>';

        }
        echo '</div>';

        echo '<div>';
            echo '<div class="im-hide alert0">'.$this->makeTranslationSystem('form-error').'</div>';
            echo '<div class="im-hide alert1">'.$this->makeTranslationSystem('form-ok').'</div>';
            echo '<div class="im-hide alert-captcha">'.$this->makeTranslationSystem('captcha-error').'</div>';
        echo '</div>';

        //At the end of body hook sha1 library
        $GLOBALS['hash'] = true;

    }else{

        echo '<h4 class="text-center">'.$this->makeTranslationSystem('login-current').'</h4>';

    }

}