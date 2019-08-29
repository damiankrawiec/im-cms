<?php

$restrictionStatus = true;
if(isset($eventData['restriction'])) {

    $checkData = $eventData['restriction'];
    require_once 'php/run/delete/check-table-relation.php';

}

//if($restrictionStatus) {
//
//    $sql = 'delete from '.$eventData['table'];
//
//    $tableId = $addition->cleanText($eventData['table'], 'im_').'_id';
//
//    $sql .= ' where '.$tableId.' = :id';
//
//    $db->prepare($sql);
//
//    $parameter = array(
//        array('name' => ':id', 'value' => $eventData['id'], 'type' => 'int')
//    );
//
//    $db->bind($parameter);
//
//    $db->run();
//
//}