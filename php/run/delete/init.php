<?php

$sql = 'delete from '.$formData['table'].' where '.$addition->cleanText($formData['table'], 'im_').'_id = :id';

$db->prepare($sql);

$parameter = array(
    array('name' => ':id', 'value' => $formData['id'], 'type' => 'int')
);

$db->bind($parameter);

$db->run();

$alert1 = 'operation-ok';