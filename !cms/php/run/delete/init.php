<?php

$restrictionStatus = true;
if(isset($eventData['restriction']))
    require_once 'php/run/delete/check-table-relation.php';

if($restrictionStatus) {

    $mainTable = $eventData['table']->main;

    $deleteId = $addition->cleanText($mainTable, 'im_') . '_id';

    $parameter = array(
        array('name' => ':id', 'value' => $eventData['id']->$deleteId, 'type' => 'int')
    );

    foreach($eventData['table'] as $t => $table) {

        if($t == 'main')
            continue;

        $sql = 'delete from ' . $table.' where ' . $deleteId . ' = :id';

        $db->prepare($sql);

        $db->bind($parameter);

        $db->run();

    }

    $sql = 'delete from '.$mainTable.' where ' . $deleteId . ' = :id';

    $db->prepare($sql);

    $db->bind($parameter);

    $db->run();

    $alert1 = $translation['message']['delete-success'];

    if(isset($eventData['file_delete']))
        require_once 'php/run/delete/file.php';

}else{

    $alert0 = $translation['message']['relation-exists'];

    if(isset($eventData['restriction']))
        $alert0 .= ' - '.json_encode($eventData['restriction']);

}