<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    if(!isset($this->session['id'])) {

        echo '<div' . $classField . '>';
        echo '<p>' . $dataDisplay . '</p>';
        echo '<form method="post" class="auth">';
        echo '<input type="text" name="form_email" class="form-control validation :email" placeholder="' . $this->makeTranslationSystem('email') . '">';
        echo '<input type="password" class="form-control validation :text" placeholder="' . $this->makeTranslationSystem('password') . '">';
        echo '<input type="hidden" name="form_password">';
        echo '<input type="hidden" name="event" value="auth"> ';
        echo '<input type="hidden" name="transaction" value="' . $this->addition->transaction() . '">';
        echo '</form>';
        echo '<button class="btn btn-secondary submit validation-run" id="auth">' . $this->makeTranslationSystem('login') . '</button>';
        echo '<div class="im-hide alert0">' . $this->makeTranslationSystem('form-error') . '</div>';
        echo '</div>';

        //At the end of body hook sha1 library
        $GLOBALS['hash'] = true;

    }else{

        echo '<p>'.$this->makeTranslationSystem('login-current').'</p>';

    }

}