<?php
$sql = 'select name_url
        from im_section
        where position = :position';

$db->prepare($sql);

$parameter = array(
    array('name' => ':position', 'value' => 1, 'type' => 'int')
);

$db->bind($parameter);

$urlObject = $db->run('one');

if($urlObject) {

    $s_startSection = $urlObject->name_url;

}else{

    var_dump('No section defined');

    exit();

}