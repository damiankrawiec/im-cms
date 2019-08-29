<?php

if(isset($checkData)) {

    foreach($checkData as $table => $field) {

        $sql = 'select '.$field.' from '.$table;

        $tableId = $addition->cleanText($eventData['table'], 'im_').'_id';

        $sql .= ' where '.$tableId.' = :id';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':id', 'value' => $eventData['id'], 'type' => 'int')
        );

        $db->bind($parameter);

        $db->run();

    }

}