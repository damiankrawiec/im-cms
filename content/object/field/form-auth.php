<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    echo '<div' . $classField . '>';
    echo '<p>'.$dataDisplay.'</p>';
    echo '<form method="post" class="auth">';
    echo '<input type="text" class="form-control validation :email" placeholder="' . $this->makeTranslationSystem('email') . '">';
    echo '<input type="password" class="form-control validation :text" placeholder="' . $this->makeTranslationSystem('password') . '">';
    echo '<input type="hidden" name="password">';
    echo '</form>';
    echo '<button class="btn btn-secondary submit validation-run" id="auth">' . $this->makeTranslationSystem('login') . '</button>';
    echo '<div class="im-hide alert0">'.$this->makeTranslationSystem('form-error').'</div>';
    echo '</div>';

    //At the end of body hook sha1 library
    $GLOBALS['hash'] = true;

}