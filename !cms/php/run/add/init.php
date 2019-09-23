<?php

var_dump($eventData);

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

        array_push($parameter, array('name' => ':' . $e, 'value' => $ed, 'type' => $bindType));

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

                if($s == 'url')
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

    $db->run();

}

$alert1 = $translation['message']['save-success'];