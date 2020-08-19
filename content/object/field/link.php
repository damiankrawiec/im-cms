<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    if(!stristr($dataDisplay, 'http'))
        $dataDisplay = 'http://'.$dataDisplay;

    $dataDisplayArray = explode('|', $dataDisplay);

    echo '<a href="'.$dataDisplayArray[0].'" target="_blank" title="'.$dataDisplayArray[0].'"'.$classField.'>' . $this->translationMark('im_object-link_name-'.$dataId, $dataDisplayArray[1]) . '</a>';

}