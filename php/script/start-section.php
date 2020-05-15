<?php
$sql = 'select name_url
        from im_section
        where position = :position and parent = :parent';

$db->prepare($sql);

$parameter = array(
    array('name' => ':position', 'value' => 1, 'type' => 'int'),
    array('name' => ':parent', 'value' => 0, 'type' => 'int')
);

$db->bind($parameter);

$urlObject = $db->run('one');

if($urlObject) {

    $s_startSection = $urlObject->name_url;

}else{

    var_dump('No section defined');

    exit();

}