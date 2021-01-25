<?php

if($this->checkDataDisplay($dataDisplay, 'package')) {

    $package = $this->addition->jsonArray($dataDisplay);

    $packageName = 'init';
    if($p_package)
        $packageName = $p_package;

    if(isset($package->$packageName)) {

        $pack = $package->$packageName;

        $path = '';
        if(isset($pack->name) and $pack->name !== '')
            $path = 'content/package/'.$pack->name;

        if ($this->addition->fileExists($path.'/init.php')) {

            require $path.'/init.php';

        }

        //Run event to next package (with object full width - $objectId), protect package form to resend (e.g. back in browser)
        $stop = false;
        foreach ($package as $i => $p) {

            $nextPackage = $i;

            if($stop)
                break;

            if($i == $packageName)
                $stop = true;

        }


        if ($nextPackage !== $packageName) {

            echo '<form method="post" action="">';
            echo '<input type="submit" value="' . $this->makeTranslationSystem('run') . '" class="btn btn-danger">';
            echo '<input type="hidden" name="package" value="' . $nextPackage . '">';
            echo '<input type="hidden" name="id" value="' . $dataId . '">';
            echo '</form>';

        }

    }

}