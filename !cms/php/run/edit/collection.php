<?php

foreach ($eventData['collection'] as $ec) {

    $idName = $ec->one;

    $sql = 'delete from ' . $ec->table.' where ' . $idName . ' = :id';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':id', 'value' => $eventData['id']->$idName, 'type' => 'int')
    );

    $db->bind($parameter);

    $db->run();

    if($collectionData[$ec->all] != 0) {

        $selectedId = $collectionData[$ec->all];

        $sql = 'insert into ' . $ec->table.' (' . $ec->one . ', '.$ec->all.') values ';

        if (stristr($selectedId, ',')) {

            $selectedIdArray = explode(',', $selectedId);

        } else {

            $selectedIdArray = array($selectedId);

        }

        $sqlValue = '';

        $parameter = array();
        foreach ($selectedIdArray as $i => $sia) {

            $sqlValue .= '(:'.$ec->one.$i.', :'.$ec->all.$i.'),';

            array_push($parameter, array('name' => ':'.$ec->one.$i, 'value' => $eventData['id']->$idName, 'type' => 'int'));
            array_push($parameter, array('name' => ':'.$ec->all.$i, 'value' => $sia, 'type' => 'int'));


        }

        $sqlValue = substr($sqlValue, 0, -1);

        $sql = $sql.$sqlValue;

        $db->prepare($sql);

        $db->bind($parameter);

        $db->run();

    }

}