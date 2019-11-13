<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    echo '<div'.$classField.'>';
        echo '<input type="text" class="form-control im-name" placeholder="'.$this->translationSystem['name'].'">';
        echo '<input type="text" class="form-control im-source" placeholder="'.$this->translationSystem['source'].'">';
        echo '<textarea class="editor"></textarea>';
        echo '<input type="button" class="btn btn-light im-send" value="'.$this->translationSystem['send'].'">';
        echo '<input type="hidden" class="im-destination" value="'.$dataDisplay.'">';
    echo '</div>';
    echo '<div>';
        echo '<div class="im-hide alert0">'.$this->translationSystem['form-error'].'</div>';
        echo '<div class="im-hide alert1">'.$this->translationSystem['form-ok'].'</div>';
    echo '</div>';

}