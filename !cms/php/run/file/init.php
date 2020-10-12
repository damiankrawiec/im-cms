<?php

$newFile = $eventData['data']['url'];

if($newFile != '') {

    $permitted = false;
    if(isset($eventData['permitted']))
        $permitted = $eventData['permitted'];

    if($fileName = $addition->setFileName($newFile, $permitted)) {

        if($p_choose)
            $fileName = $eventData['current'];

        if($addition->addFile($tmpName, $eventData['path'] . $fileName)) {

            if (isset($eventData['current']) and !$p_choose) {

                if(!$addition->removeFile($eventData['path'] . $eventData['current']))
                    $alert0 = $translation['validation']['delete-file-fail'];

            }

        }

    }else $alert0 = $translation['validation']['wrong-file'];

}