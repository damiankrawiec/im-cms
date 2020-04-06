<?php

foreach($eventData['table'] as $table) {

    $sql = 'insert into ' . $table . ' (';

    $parameter = array();
    $sqlValue = '(';

    foreach ($eventData['data'] as $e => $ed) {

        $bindType = 'string';
        if(stristr($e, 'id'))
            $bindType = 'int';

        $sql .= $e . ', ';

        $sqlValue .= ':' . $e . ', ';

        $value = $ed;
        if($e == 'url')
            $value = $fileName;

        array_push($parameter, array('name' => ':' . $e, 'value' => $value, 'type' => $bindType));

    }

    if(isset($eventData['supplement']->$table)) {

        foreach ($eventData['supplement']->$table as $s => $su) {

            $bindType = 'string';
            if(stristr($s, 'id') or $s == 'parent')
                $bindType = 'int';

            $sql .= $s . ', ';

            $sqlValue .= ':' . $s . ', ';

            $value = $su;
            if($su == 'create') {

                if($s == 'name_url')
                    $value = $addition->createUrl($eventData['data']['name']);

            }

            array_push($parameter, array('name' => ':' . $s, 'value' => $value, 'type' => $bindType));

        }

    }

    $sql = substr($sql, 0, -2);

    $sqlValue = substr($sqlValue, 0, -2);

    $sqlValue .= ')';

    $sql .= ') values ' . $sqlValue;

    $db->prepare($sql);

    $db->bind($parameter);

    $lastInsertId = $db->run();

    if(isset($eventData['field_supplement'])) {

        require_once 'php/run/add/field-supplement.php';

    }

}

$addition->link($addition->getUrl().',edit,'.$lastInsertId);

//$alert1 = $translation['message']['save-success'];