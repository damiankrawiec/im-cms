<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    echo '<div'.$classField.'>'.$this->icon['calendar']['standard'].' ' . $dataDisplay . '</div>';

}