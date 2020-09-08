<?php

$restoreData = '';
if(isset($_POST['event'])) {

    $dir = '../../';

    $dirBackup = $dir.'config/backup/'.$_POST['path'];

    $dirRestore = require_once('../config/system/path.php');

    foreach ($dirRestore as $dba) {

        $fileCount = 0;

        $dirCurrent = scandir($dir.$dba);

        foreach ($dirCurrent as $dc) {

            if (stristr($dc, '.php') or stristr($dc, '.js') or stristr($dc, '.css') or stristr($dc, '.sql')) {

                copy($dirBackup.'/'.$dba.'/'.$dc,$dir.$dba.'/'.$dc);

                $restoreData .= '<br>'.$dba.($dba == '' ? '' : '/').$dc;

                $fileCount++;

            }

        }

        if($fileCount == 0)
            $restoreData .= '<br>-';

        $restoreData .= '<div style="font-weight: bold; color: darkred">'.$dba.($dba == '' ? '' : ' - ').' restore: '.$fileCount.'</div>';

    }

    $restoreData .= '<div style="font-weight: bold; color: green">Restore success!</div>';

}

exit($restoreData);