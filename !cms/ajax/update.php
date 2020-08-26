<?php

$updateData = '';
if(isset($_POST['event'])) {

    $host = 's111.linuxpl.com';
    $user = 'api@internet.media.pl';
    $password = 'K22$f)C1H%3b~1*';

    $ftpConnect = ftp_connect($host);
    $login = ftp_login($ftpConnect, $user, $password);

    // check connection
    if ($ftpConnect and $login) {

        $dir = 'im-cms/update/';

        $data = ftp_nlist($ftpConnect, $dir);

        foreach ($data as $d) {

            if($d == '.' or $d == '..')
                continue;

            if(stristr($d, '.php')) {

                $updateData .= $d.', ';

                ftp_get($ftpConnect, '../../'.str_replace( $dir, '', $d), $d);

            }

        }

        $updateData = substr($updateData, 0, -2);

    }

    ftp_close($ftpConnect);

}

exit($updateData);