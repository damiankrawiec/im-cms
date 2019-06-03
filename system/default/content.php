<div class="container-fluid">
<?php

$sql = array(
    'query' => 'select * from im_object where object_id > :id',
    'parameter' => array(
            array('name' => ':id', 'value' => 1, 'type' => 'int')
    ),
    'display' => 'all'
);

$record = $db->sql($sql);

var_dump($record);

?>
</div>