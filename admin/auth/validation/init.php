<?php

if($p_email and $p_password) {

    require_once '../../php/class/session.class.php';

    require_once 'run/run.class.php';

    if(new Run($p_email, $p_password)) {

        header('Location:../');

        exit();

    }

    unset($p_password);

}