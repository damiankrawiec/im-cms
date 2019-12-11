<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    $dataDisplayArray = explode('|', $dataDisplay);

    echo '<a href="'.$dataDisplayArray[0].'" title="'.$this->translationSystem['more'].'"'.$classField.'>'.$dataDisplayArray[1].'</a>';

}