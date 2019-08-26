<?php

require_once '../php/script/post.php';

if($p_label and isset($p_category)) {

    if($p_category == 0)
        $p_category = false;

    require_once '../php/class/session.class.php';

    $session = new Session();

    $session->setSession($p_label, $p_category);

    exit();

}