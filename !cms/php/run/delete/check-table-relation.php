<?php

foreach($eventData['restriction'] as $table => $field) {

    $sql = 'select * from '.$table.' where '.$field.' = :id';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':id', 'value' => $eventData['id'], 'type' => 'int')
    );

    $db->bind($parameter);

    if($db->run('all')) {

        $restrictionStatus = false;

        break;

    }

}