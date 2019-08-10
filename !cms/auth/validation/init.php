<?php

if($p_email and $p_password) {

    require_once '../php/class/security.class.php';

    require_once '../php/class/session.class.php';

    require_once 'run/run.class.php';

    $run = new Run($p_email, $p_password);

    if($run->getRun())
        $addition->link('../');

    unset($p_password);

}