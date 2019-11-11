<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    if($classField == '') {

        $dataDisplay = ' class="'.$dataDisplay.'"';

    }else{

        $classField = substr($classField, 0, -1);

        $dataDisplay = $classField.' '.$dataDisplay.'"';

    }

    echo '<i'.$dataDisplay.'></i>';

}