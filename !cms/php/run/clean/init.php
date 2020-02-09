<?php

//Table from database which must be scanning and getting ID (primary key), after that check table translation (target_table, target_record)
$checkTableClean = array('im_section', 'im_object', 'im_image', 'im_file', 'im_source', 'im_category');

//Reset parameter ?

$ctcArray = array();
foreach ($checkTableClean as $ctc) {

    $sql = 'select '.
            $addition->cleanText($ctc, 'im_').'_id as id from '.$ctc.'
            where name != :name';

    $db->prepare($sql);

//    $parameter = array(
//        array('name' => ':name', 'value' => '', 'type' => 'string')
//    );
//
//    $db->bind($parameter);

    $ctcRecord = $db->run('all');

    if($ctcRecord)
        $ctcArray[$ctc] = $addition->implode3d($ctcRecord, 'id');

}

if(count($ctcArray) > 0) {

    foreach ($ctcArray as $ctcTable => $ctcId) {

        $countIds = count($ctcId);
        if ($countIds > 1) {

            $ctcIdString = implode(',', $ctcId);

        } else if ($countIds == 1) {

            $ctcIdString = $ctcId[0];

        } else $ctcIdString = '';

        if ($ctcIdString != '') {

            $checkTableRemove = array(
                'im_translation' => array('where' => 'target_table = :target_table and target_record not in('.$ctcIdString.')', 'parameter' => 'target_table')
            );

            foreach ($checkTableRemove as $ctrTable => $ctr) {

                $sql = 'select '.$addition->cleanText($ctrTable, 'im_').'_id as id
                    from '.$ctrTable.'
                    where '.$ctr['where'];

                $parameter = array(
                    array('name' => ':'.$ctr['parameter'], 'value' => $ctrTable, 'type' => 'string')
                );

                $db->bind($parameter);

                $db->prepare($sql);

                //This records are to be prepare to remove
                $ctcIdRecord = $db->run('all');

                if ($ctcIdRecord) {

                    foreach ($ctcIdRecord as $idRemove) {

                        $sql = 'delete from im_translation where translation_id = ' . $idRemove['id'];

                        $db->prepare($sql);

                        $db->run();

                    }

                    $alert1 = $translation['message']['save-success'];

                }

            }

        }else $alert0 = $translation['message']['no-data'];

    }

}

//After clean database remove files in "cms/auth/stamp" "system/[all-names]/public/captcha" (Attention! filemtime() must be equal or early than yesterday - e.g. current admin session)