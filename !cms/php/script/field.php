<?php

$sql = 'select 
        t.system_name as name
        from im_property t
        join im_type_property tj on(tj.property_id = t.property_id)
        where tj.type_id = :type';

$db->prepare($sql);

$parameter = array(
    array('name' => ':type', 'value' => $g_var1, 'type' => 'int')
);

$db->bind($parameter);

$field = $db->run('all');

    $fields = array();

    if($field) {

        foreach ($field as $f)
            array_push($fields, $f['name']);

    }else echo $addition->message($translation['message']['no-field'], $icon['button']['cancel']);

    if (!in_array('name', $fields))
        unset($eventData['field']['name']);

    if (!in_array('content', $fields))
        unset($eventData['field']['content']);

    if (!in_array('section', $fields))
        unset($eventData['field']['section']);

    if (!in_array('date', $fields))
        unset($eventData['field']['date']);

    if (!in_array('link', $fields))
        unset($eventData['field']['link']);

    if (!in_array('email', $fields))
        unset($eventData['field']['email']);

    if (!in_array('image', $fields))
        unset($eventData['fix-2']);

    if (!in_array('file', $fields))
        unset($eventData['fix-3']);

    if (!in_array('movie', $fields))
        unset($eventData['fix-4']);