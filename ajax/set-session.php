<?php

require_once '../php/script/post.php';

if($p_session) {

    require_once '../php/class/session.class.php';

    $session = new Session();

    $session->setSession($p_session['name'], $p_session['value']);

    exit();

}