<?php

//require_once '../php/script/post.php';
//
//require_once '../../php/class/database.class.php';
//
//require_once '../php/class/addition.class.php';
//
//$db = new Database();
//
//$addition = new Addition();
//
//$recordData = explode(':', $p_table);
//
//$sql = 'update '.$recordData[0].' set status = :status where '.$addition->cleanText($recordData[0], 'im_').'_id = :id';
//
//$db->prepare($sql);
//
//$parameter = array(
//    array('name' => ':status', 'value' => $p_event, 'type' => 'string'),
//    array('name' => ':id', 'value' => $recordData[1], 'type' => 'int')
//);
//
//$db->bind($parameter);
//
//$db->run();