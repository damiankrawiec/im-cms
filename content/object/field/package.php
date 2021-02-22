<?php

if($this->checkDataDisplay($dataDisplay, 'package')) {

    $package = $this->addition->jsonArray($dataDisplay);

    $packageName = 'init';
    if($packageData['name'])
        $packageName = $packageData['name'];

    if(isset($package->{$packageName})) {

        //Run event to next package (with object full width - $objectId), protect package form to resend (e.g. back in browser)
        $stop = false;
        $nextPackage = $prevPackage = '';
        foreach ($package as $i => $p) {

            $nextPackage = $i;

            if($stop)
                break;

            if($i == $packageName)
                $stop = true;

        }
        foreach ($package as $i => $p) {

            if($i == $packageName)
                break;

            $prevPackage = $i;

        }

        $pack = $package->{$packageName};

        $pathSection = 'content/section';

        $path = $pathName = 'content/package';
        if(isset($pack->name) and $pack->name !== '')
            $pathName .= '/'.$pack->name;

        //Get translation array
        $packageLanguagePath = $pathSection.'/package/language/'.$this->currentLanguage.'.php';
        if($this->addition->fileExists($packageLanguagePath))
            require $packageLanguagePath;

        if ($prevPackage !== '') {

            echo '<form method="post" action="">';
            require $pathSection.'/package/prev.php';
            echo '</form>';

        }

        $submit = false;
        if ($this->addition->fileExists($pathName.'/init.php')) {

            require $pathName.'/init.php';

        }

        if (!$submit and $nextPackage !== $packageName) {

            echo '<form method="post" action="">';
                require $pathSection.'/package/submit.php';
            echo '</form>';

        }

    }

}