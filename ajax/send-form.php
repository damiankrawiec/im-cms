<?php

require_once '../php/script/post.php';

if($p_sendForm) {

    //Tools like sand email, alert, etc.
    //require_once 'php/class/functions.class.php';

    //$functions = new Functions();

    require_once '../'.$p_sendForm['system'].'/setting.php';

    require_once '../php/class/database.class.php';

    $db = new Database();

    $sql = 'insert into im_form (name, source, destination, content) values(:name, :source, :destination, :content)';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':name', 'value' => $p_sendForm['name'], 'type' => 'string'),
        array('name' => ':source', 'value' => $p_sendForm['source'], 'type' => 'string'),
        array('name' => ':destination', 'value' => $p_sendForm['destination'], 'type' => 'string'),
        array('name' => ':content', 'value' => $p_sendForm['content'], 'type' => 'string')
    );

    $db->bind($parameter);

    $db->run();
}

exit();