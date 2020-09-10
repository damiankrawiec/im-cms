<?php

if($p_id > 0) {

    $sql = 'update im_object set type_id = :id where object_id = :data';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':id', 'value' => $p_id, 'type' => 'int'),
        array('name' => ':data', 'value' => $p_data, 'type' => 'int')
    );

    $db->bind($parameter);

    $db->run();

    $alert1 = $translation['message']['change-type-success'].', <a href="object,'.$p_id.',edit,'.$p_data.'">'.$translation['button']['go-object'].'</a>';

}else{

    $alert0 = $translation['message']['no-data'];

}