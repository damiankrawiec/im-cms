<?php

foreach($eventData['compare'] as $table => $field) {

    $fieldId = $addition->cleanText($table, 'im_').'_id';

    $sql = 'select * from '.$table.' where '.$field.' = :'.$field. ' and '.$fieldId.' <> :'.$fieldId;

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':'.$field, 'value' => $eventData['data'][$field], 'type' => 'string'),
        array('name' => ':'.$fieldId, 'value' => $eventData['id']->{$fieldId}, 'type' => 'int')
    );

    $db->bind($parameter);

    if($db->run('all')) {

        $compareStatus = false;

        break;

    }

}