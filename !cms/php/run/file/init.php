<?php

$newFile = $eventData['data']['url'];

$tmpName = $fileData['url']['tmp_name'];

if(isset($newFile) and isset($tmpName) and $newFile != '') {

    if(!is_array($newFile))
        $newFile = array($newFile);

    if(!is_array($tmpName))
        $tmpName = array($tmpName);

    $permitted = false;
    if(isset($eventData['permitted']))
        $permitted = $eventData['permitted'];

    $eventCount = array();
    foreach ($newFile as $i => $nf) {

        if ($fileName = $addition->setFileName($nf, $permitted)) {

            if ($p_choose)
                $fileName = $eventData['current'];

            if ($addition->addFile($tmpName[$i], $eventData['path'] . $fileName)) {

                array_push($eventCount, $fileName);

                if (isset($eventData['current']) and !$p_choose) {

                    if (!$addition->removeFile($eventData['path'] . $eventData['current']))
                        $alert0 = $translation['validation']['delete-file-fail'];

                }

            }

        } else $alert0 = $translation['validation']['wrong-file'];

    }

    if($alert0)
        $p_save_back = false;

}