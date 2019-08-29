<?php

$restrictionStatus = true;
foreach($eventData['restriction'] as $table => $field) {

    $sql = 'select '.$field.' from '.$table;

    $tableId = $addition->cleanText($table, 'im_').'_id';

    $sql .= ' where '.$tableId.' = :id';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':id', 'value' => $eventData['id'], 'type' => 'int')
    );

    $db->bind($parameter);

    var_dump($db->run());

    if($db->run()) {

        $restrictionStatus = false;

        break;

    }

}