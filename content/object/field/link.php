9<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    echo '<a href="'.$dataDisplay.'" title="'.$this->translationSystem['more'].'"'.$classField.'>' . $this->translationSystem['more'] . ' '.$this->icon['link']['external'].'</a>';

}