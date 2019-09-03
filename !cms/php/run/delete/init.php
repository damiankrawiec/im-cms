<?php

$restrictionStatus = true;
if(isset($eventData['restriction']))
    require_once 'php/run/delete/check-table-relation.php';

if($restrictionStatus) {

    foreach($eventData['table'] as $table) {

        $sql = 'delete from ' . $table;

        $tableId = $addition->cleanText($table, 'im_') . '_id';

        $sql .= ' where ' . $tableId . ' = :id';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':id', 'value' => $eventData['id']->$tableId, 'type' => 'int')
        );

        $db->bind($parameter);

        $db->run();

    }

    $alert1 = $translation['message']['delete-success'];

}else{

    $alert0 = $translation['message']['relation-exists'];

    if(isset($eventData['restriction']))
        $alert0 .= ' - '.json_encode($eventData['restriction']);

}