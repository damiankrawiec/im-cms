<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    echo '<a href="'.$dataDisplay.'" title="'.$this->translationSystem['more'].'"'.$classField.'>' . $this->translationSystem['more'] . ' '.$this->ico_external_link.'</a>';

}