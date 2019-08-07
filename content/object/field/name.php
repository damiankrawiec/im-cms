<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    echo '<div'.$classField.'>' . $this->translationMark('im_object-name-'.$dataId, $dataDisplay) . '</div>';

}