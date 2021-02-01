<?php

if($this->checkDataDisplay($dataDisplay, 'package')) {

    $package = $this->addition->jsonArray($dataDisplay);

    $packageName = 'init';
    if($packageData['name'])
        $packageName = $packageData['name'];

    if(isset($package->$packageName)) {

        //Run event to next package (with object full width - $objectId), protect package form to resend (e.g. back in browser)
        $stop = false;
        $nextPackage = '';
        foreach ($package as $i => $p) {

            $nextPackage = $i;

            if($stop)
                break;

            if($i == $packageName)
                $stop = true;

        }

        $pack = $package->$packageName;

        $path = $pathName = 'content/package';
        if(isset($pack->name) and $pack->name !== '')
            $pathName = $path.'/'.$pack->name;

        if ($this->addition->fileExists($pathName.'/init.php')) {

            require $pathName.'/init.php';

        }

        if (!isset($submit) and $nextPackage !== $packageName) {

            echo '<form method="post" action="">';
                require_once $path.'/submit.php';
            echo '</form>';

        }

    }

}