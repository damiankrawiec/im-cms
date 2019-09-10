<?php

require_once '../php/script/post.php';

if($p_id and $p_table and $p_system) {

    require_once '../php/class/addition.class.php';

    $addition = new Addition();

    require_once '../php/class/system.class.php';

    $system = new System($p_system, '../../');

    //Init setting and $db object
    $pathUp = '../';
    require_once '../php/script/system.php';

    $idsArray = explode(',', $p_id);

    $sql = 'update ' . $p_table . ' set position = :position where ' . $addition->cleanText($p_table, 'im_') . '_id = :id';

    $db->prepare($sql);

    foreach ($idsArray as $position => $ida) {

        $parameter = array(
            array('name' => ':position', 'value' => ($position + 1), 'type' => 'int'),
            array('name' => ':id', 'value' => $ida, 'type' => 'int')
        );

        $db->bind($parameter);

        $db->run();

    }

}

exit();