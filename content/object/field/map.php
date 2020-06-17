<?php

if($this->checkDataDisplay($dataDisplay, 'string')) {

    if(isset($this->setting['google-api']) and $this->setting['google-api'] != '' and stristr($dataDisplay, ',')) {

        $mapId = 'map-'.$this->objectCounter;

        echo '<div title="map" id="'.$mapId.'"'.$classField.'></div>';

        $this->mapArray[$mapId] = $dataDisplay;

    }

}