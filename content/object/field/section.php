<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    $dataDisplayArray = explode('|', $dataDisplay);

    echo '<a href="'.$dataDisplayArray[0].'" title="'.$dataDisplayArray[1].'"'.$classField.'>'.$dataDisplayArray[1].'</a>';

}