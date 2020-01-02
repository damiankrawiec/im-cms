<?php

if(isset($fileDataEdit) and is_array($fileDataEdit)) {

    $sql = 'update '.$fileDataEdit['table'].' set url = "" where '.$addition->cleanText($fileDataEdit['table'], 'im_').'_id = :id';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':id', 'value' => $fileDataEdit['id'], 'type' => 'int')
    );

    $db->bind($parameter);

    $db->run();

    if (!$addition->removeFile($eventData['file_delete']))
        $alert0 = $translation['validation']['delete-file-fail'];

}