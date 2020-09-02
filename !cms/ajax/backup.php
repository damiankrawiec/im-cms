<?php

$backupData = '';
if(isset($_POST['event'])) {

    $dir = '../../';

    $now = date("Y-m-d-H-i-s");

    $dirCreate = $dir.'config/backup/'.$now;

    mkdir($dirCreate);

    $dirBackup = array(
        'ajax',
        'config', 'config/!doc', 'config/sql',
        'content', 'content/object', 'content/object/field',
        'php', 'php/class', 'php/script',
        'section', 'section/css', 'section/js'
    );

    foreach ($dirBackup as $dba) {

        mkdir($dirCreate.'/'.$dba);

        $fileCount = 0;

        $dirCurrent = scandir($dir.$dba);

        foreach ($dirCurrent as $dc) {

            if (stristr($dc, '.php') or stristr($dc, '.js') or stristr($dc, '.css') or stristr($dc, '.sql')) {

                copy($dir.$dba.'/'.$dc, $dirCreate.'/'.$dba.'/'.$dc);

                $backupData .= '<br>' . $now.'/'.$dba.'/'.$dc;

                $fileCount++;

            }

        }

        if($fileCount == 0)
            $backupData .= '<br>-';

        $backupData .= '<div style="font-weight: bold; color: darkred">'.$now.'/'.$dba.' - backup: '.$fileCount.'</div>';

    }

    $backupData .= '<div style="font-weight: bold; color: green">Backup success!</div>';

}

exit($backupData);