<?php

if(isset($lastData)) {

    $orderBy = '';

    $sqlLast = $lastData['sql'];

    if (stristr($sqlLast, 'order by position')) {

        $sqlLast = str_replace(' order by position', '', $sqlLast);

        $orderBy = 'date_modify';

    }

    if (stristr($sqlLast, 'order by t.position')) {

        $sqlLast = str_replace(' order by t.position', '', $sqlLast);

        $orderBy = 't.date_modify';

    }

    if($orderBy == '')
        $orderBy = 'date_modify';

    $sqlLast .= ' order by '.$orderBy.' desc limit 1';

    $db->prepare($sqlLast);

    if (isset($lastData['parameter']))
        $db->bind($lastData['parameter']);

    $last = $db->run('one');

    $lastIdName = $addition->cleanText($table, 'im_') . '_id';

    $lastId = $last->$lastIdName;

}
