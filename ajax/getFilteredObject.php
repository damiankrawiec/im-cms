<?php

require_once '../php/script/post.php';

if($p_systemName and $p_section and $p_label and $p_category) {

    require_once '../'.$p_systemName.'/setting.php';

    require_once '../php/class/database.class.php';

    $db = new Database();

    //init require element on the content in section (object)
    require_once '../content/object/object.class.php';

    $objectContent = new ObjectContent($p_systemName, $db);

    $objectContent->display($p_section, $p_label, $p_category);

}