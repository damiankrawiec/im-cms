<?php

if($p_email and $p_password) {

    require_once '../php/class/session.class.php';

    require_once 'run/run.class.php';

    if(new Run($p_email, $p_password)) {

        $addition->link('../');

    }else{

        echo $addition->message($translation['authorization']['error'], $icon['message']['alert']);

    }

    unset($p_password);

}