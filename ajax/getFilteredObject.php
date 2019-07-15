<?php

require_once '../php/script/post.php';

if($p_systemName and $p_section and $p_label and isset($p_category)) {

    //It is the same, but...
    if($p_category == 0)
        $p_category = false;

    require_once '../'.$p_systemName.'/setting.php';

    require_once '../php/class/database.class.php';

    require_once '../php/class/language.class.php';

    //init require element on the content in section (object)
    require_once '../content/object/object.class.php';

    require_once '../php/class/session.class.php';

    $db = new Database();

    $session = new Session();

    //Labeled all "session" variables and get session variables in array
    require_once '../php/script/session.php';

    $objectContent = new ObjectContent($p_systemName, $db, $sessionVariables['language']);

    $objectContent->setPath('../');

    //Init gallery effect after the end of ajax data
    $objectContent->initGallery();

    $session->setSession($p_label, $p_category);

    exit($objectContent->display($p_section, $p_label, $p_category));

}