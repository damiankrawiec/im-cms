<?php

foreach($eventData['restriction'] as $table => $field) {

    $sql = 'select * from '.$table.' where '.$field.' = :id';

    $db->prepare($sql);

    if(!stristr($field, 'id'))
        $field = $addition->cleanText($table, 'im_').'_id';

    $parameter = array(
        array('name' => ':id', 'value' => $eventData['id']->$field, 'type' => 'int')
    );

    $db->bind($parameter);

    if($db->run('all')) {

        $restrictionStatus = false;

        break;

    }

}