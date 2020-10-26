<?php

$sql = 'update im_section set parent = :id where section_id = :data';

$db->prepare($sql);

$parameter = array(
    array('name' => ':id', 'value' => $p_id, 'type' => 'int'),
    array('name' => ':data', 'value' => $p_data, 'type' => 'int')
);

$db->bind($parameter);

$db->run();

$go = '<a href="section,' . $p_id . ',edit,' . $p_data . '">' . $translation['button']['go-section'] . '</a>';

if($p_id > 0) {

    $alert1 = $translation['message']['change-parent-success'].', '.$go;

}else{

    $alert1 = $translation['message']['change-parent-main-success'].', '.$go;

}