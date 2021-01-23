<?php

if($this->checkDataDisplay($dataDisplay, 'package')) {

    $package = $this->addition->jsonArray($dataDisplay);

    foreach ($package as $event => $pack) {

        $path = '';
        if(isset($pack->name) and $pack->name !== '')
            $path = 'content/package/'.$pack->name;

        if ($this->addition->fileExists($path.'/init.php')) {

            require $path.'/init.php';

        }

        if($event === 'init') {


        }

    }

}