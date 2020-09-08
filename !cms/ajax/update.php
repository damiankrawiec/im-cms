<?php

$updateData = '';
if(isset($_POST['event'])) {

    $host = 's111.linuxpl.com';
    $user = 'api@internet.media.pl';
    $password = 'K22$f)C1H%3b~1*';

    $ftpConnect = ftp_connect($host);
    $login = ftp_login($ftpConnect, $user, $password);

    if ($ftpConnect and $login) {

        $dir = 'im-cms/update/';

        $dirUpdate = require_once('../config/system/path.php');

        foreach ($dirUpdate as $du) {

            $data = ftp_nlist($ftpConnect, $dir.'/'.$du);

            $fileCount = 0;

            foreach ($data as $d) {

                if (stristr($d, '.php') or stristr($d, '.js') or stristr($d, '.css') or stristr($d, '.sql')) {

                    $updateData .= '<br>'.$d;

                    ftp_get($ftpConnect, '../../' . str_replace($dir, '', $d), $d);

                    $fileCount++;

                }

            }

            if($fileCount == 0)
                $updateData .= '<br>-';

            $updateData .= '<div style="font-weight: bold; color: darkred">'.$du.($du == '' ? '' : ' - ').'update: '.$fileCount.'</div>';

        }

        $updateData .= '<div style="font-weight: bold; color: green">Update success!</div>';

    }

    ftp_close($ftpConnect);

}

exit($updateData);