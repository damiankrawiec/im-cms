<?php
$sql = 'select * from im_object where object_id > :id and object_id < :id2';

$db->prepare($sql);

$parameter = array(
    array('name' => ':id', 'value' => 1, 'type' => 'int'),
    array('name' => ':id2', 'value' => 3, 'type' => 'int')
);

$db->bind($parameter);

$record = $db->run('all');