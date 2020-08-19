<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    $dataDisplayArray = explode('|', $dataDisplay);

    echo '<a href="'.$dataDisplayArray[0].'" title="'.$dataDisplayArray[0].'"'.$classField.'>'. $this->translationMark('im_object-section_name-'.$dataId, $dataDisplayArray[1]).'</a>';

}