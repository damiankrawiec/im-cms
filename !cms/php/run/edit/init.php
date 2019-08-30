<?php

$sql = 'update '.$eventData['table'].' set ';

$parameter = array();
foreach ($eventData['data'] as $e => $ed) {

    $sql .= $e.' = :'.$e.', ';

    array_push($parameter, array('name' => ':'.$e, 'value' => $ed, 'type' => 'string'));

}

$sql = substr($sql, 0, -2);

$tableId = $addition->cleanText($eventData['table'], 'im_').'_id';

$sql .= ' where '.$tableId.' = :id';

array_push($parameter, array('name' => ':id', 'value' => $eventData['id'], 'type' => 'int'));

$db->prepare($sql);

$db->bind($parameter);

$db->run();

$alert1 = $translation['message']['save-success'];