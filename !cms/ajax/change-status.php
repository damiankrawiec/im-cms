<?php

require_once '../php/script/post.php';

if($p_system and $p_table and $p_event) {

    require_once '../php/class/addition.class.php';

    $addition = new Addition();

    require_once '../php/class/system.class.php';

    $system = new System($p_system, '../../');

    //Init setting and $db object
    $pathUp = '../';
    require_once '../php/script/system.php';

    $recordData = explode(':', $p_table);

    $sql = 'update ' . $recordData[0] . ' set '.$recordData[1].' = :status where ' . $addition->cleanText($recordData[0], 'im_') . '_id = :id';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':status', 'value' => $p_event, 'type' => 'string'),
        array('name' => ':id', 'value' => $recordData[2], 'type' => 'int')
    );

    $db->bind($parameter);

    $db->run();

}

exit();