<?php

foreach($eventData['table'] as $table => $field) {

    $sql = 'update ' . $table . ' set ';

    $parameter = array();
    foreach ($field as $f) {

        $bindType = 'string';
        if(is_numeric($eventData['data'][$f]) or $f == 'parent')
            $bindType = 'int';

        $sql .= $f . ' = :' . $f . ', ';

        $value = $eventData['data'][$f];
        if($f == 'url')
            $value = $addition->createUrl($eventData['data']['url']);

        array_push($parameter, array('name' => ':' . $f, 'value' => $value, 'type' => $bindType));

    }

    $sql = substr($sql, 0, -2);

    $tableId = $addition->cleanText($table, 'im_') . '_id';

    $sql .= ' where ' . $tableId . ' = :id';

    array_push($parameter, array('name' => ':id', 'value' => $eventData['id']->$tableId, 'type' => 'int'));

    $db->prepare($sql);

    $db->bind($parameter);

    $db->run();

}

$alert1 = $translation['message']['save-success'];