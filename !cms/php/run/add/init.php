<?php

$sql = 'insert into '.$eventData['table'].' (';

$parameter = array();
$sqlValue = '(';
foreach ($eventData['data'] as $e => $ed) {

    $sql .= $e.', ';

    $sqlValue .= ':'.$e.', ';

    array_push($parameter, array('name' => ':'.$e, 'value' => $ed, 'type' => 'string'));

}

$sql = substr($sql, 0, -2);

$sqlValue = substr($sqlValue, 0, -2);

$sqlValue .= ')';

$sql .= ') values '.$sqlValue;

$db->prepare($sql);

$db->bind($parameter);

$db->run();

$alert1 = $translation['message']['save-success'];