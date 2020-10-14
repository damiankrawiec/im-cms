<?php

foreach($eventData['table'] as $table) {

    $sql = 'insert into ' . $table . ' (';

    $parameter = array();

    foreach ($eventData['data'] as $e => $ed) {

        $sql .= $e . ', ';

    }

    if(isset($eventData['supplement']->$table)) {

        foreach ($eventData['supplement']->$table as $s => $su) {

            $sql .= $s . ', ';

        }

        $sql = substr($sql, 0, -2);

    }else $sql = substr($sql, 0, -2);

    $sql .= ')';

    $sqlValue = '';
    foreach ($eventCount as $ec => $item) {

        $sqlValue .= '(';

        foreach ($eventData['data'] as $e => $ed) {

            $bindType = 'string';
            if (stristr($e, 'id'))
                $bindType = 'int';

            $sqlValue .= ':' . $e.$ec . ', ';

            $value = $ed;
            if ($e == 'url')
                $value = $item;

            array_push($parameter, array('name' => ':' . $e.$ec, 'value' => $value, 'type' => $bindType));

        }

        if (isset($eventData['supplement']->$table)) {

            foreach ($eventData['supplement']->$table as $s => $su) {

                $bindType = 'string';
                if (stristr($s, 'id') or $s == 'parent')
                    $bindType = 'int';

                $sqlValue .= ':' . $s.$ec . ', ';

                $value = $su;
                if ($su == 'create') {

                    if ($s == 'name_url')
                        $value = $addition->createUrl($eventData['data']['name']);

                }

                array_push($parameter, array('name' => ':' . $s.$ec, 'value' => $value, 'type' => $bindType));

            }

        }

        $sqlValue = substr($sqlValue, 0, -2);

        $sqlValue .= '), ';

    }

    $sqlValue = substr($sqlValue, 0, -2);

    $sql .= ' values ' . $sqlValue;

    $db->prepare($sql);

    $db->bind($parameter);

    $lastInsertId = $db->run();

    if(isset($eventData['field_supplement'])) {

        require_once 'php/run/add/field-supplement.php';

    }

}