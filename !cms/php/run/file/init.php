<?php

$fileName = false;

$newFile = $eventData['data']['url'];

if($newFile != '') {

    $permitted = false;
    if(isset($eventData['permitted']))
        $permitted = $eventData['permitted'];

    if($fileName = $addition->setFileName($newFile, $permitted)) {

        if($addition->addFile($tmpName, $eventData['path'] . $fileName)) {

            if (isset($eventData['current'])) {

                $addition->removeFile($eventData['path'] . $eventData['current']);

            }

        }

    }else $alert0 = $translation['validation']['wrong-file'];

}