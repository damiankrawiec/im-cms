<?php

foreach($eventData['table'] as $table => $field) {

    $sql = 'update ' . $table . ' set ';

    $parameter = array();
    foreach ($field as $f) {

        if($f == 'url' and !$fileName)
            continue;

        $bindType = 'string';
        if(is_numeric($eventData['data'][$f]) or $f == 'parent')
            $bindType = 'int';

        $sql .= $f . ' = :' . $f . ', ';

        $value = $eventData['data'][$f];

        if($f == 'name_url')
            $value = $addition->createUrl($eventData['data']['name_url']);

        if($f == 'url')
            $value = $fileName;

        array_push($parameter, array('name' => ':' . $f, 'value' => $value, 'type' => $bindType));

    }

    $sql = substr($sql, 0, -2);

    $tableId = $addition->cleanText($table, 'im_') . '_id';

    $sql .= ' where ' . $tableId . ' = :id';

    array_push($parameter, array('name' => ':id', 'value' => $eventData['id']->$tableId, 'type' => 'int'));

    $db->prepare($sql);

    $db->bind($parameter);

    $db->run();

    if(isset($eventData['collection']) and count($collectionData) > 0) {

        require_once 'php/run/edit/collection.php';

    }

    if(isset($eventData['file_delete'])) {

        $fileDataEdit = array(
            'table' => $table,
            'id' => $eventData['id']->$tableId
        );
        require_once 'php/run/edit/file.php';

    }

}

$alert1 = $translation['message']['save-success'];