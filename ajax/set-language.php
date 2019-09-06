<?php
require_once '../php/script/post.php';
if($p_language) {

    require_once '../php/class/session.class.php';

    $session = new Session();

    $session->setSession('language', $p_language);

    exit();

}