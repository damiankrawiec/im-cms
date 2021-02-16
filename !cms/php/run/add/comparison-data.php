<?php

foreach($eventData['restriction'] as $table => $field) {

    $sql = 'select * from '.$table.' where '.$field.' = :'.$field;

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':'.$field, 'value' => $eventData['data'][$field], 'type' => 'string')
    );

    $db->bind($parameter);

    if($db->run('all')) {

        $restrictionStatus = false;

        break;

    }

}