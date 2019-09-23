<?php

$fileName = false;

$newFile = $eventData['data']['url'];

if($newFile['name'] != '') {

    $permitted = false;
    if(isset($eventData['data']['permitted']))
        $permitted = $eventData['data']['permitted'];

    if($fileName = $addition->setFileName($newFile['name'], $permitted)) {

        if($addition->addFile($newFile['tmp_name'], $eventData['data']['path'] . $fileName)) {

            if (isset($eventData['data']['current'])) {

                $addition->removeFile($eventData['data']['path'] . $eventData['data']['current']);

            }

        }

    }else $alert0 = $translation['validation']['wrong-file'];

}