<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    if(!stristr($dataDisplay, 'http'))
        $dataDisplay = 'http://'.$dataDisplay;

    echo '<a href="'.$dataDisplay.'" target="_blank" title="'.$this->translationSystem['more'].'"'.$classField.'>' . $this->translationSystem['more'] . ' '.$this->icon['link']['external'].'</a>';

}