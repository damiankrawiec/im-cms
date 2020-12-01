<?php

$fieldId = $addition->cleanText($p_table, 'im_') . '_id';

$sql = 'select * from '.$p_table.' where '.$fieldId.' = :id';

$db->prepare($sql);

$parameter = array(
    array('name' => ':id', 'value' => $p_id, 'type' => 'int')
);

$db->bind($parameter);

$recordSource = $db->run('one');

if($recordSource) {

    //Main SQL
    $parameter = array();
    $sqlField = $sqlValue = '';
    foreach ($recordSource as $i => $rs) {

        if($i == $fieldId or $i == 'date_create' or $i == 'date_modify')
            continue;

        $sqlField .= $i.',';
        $sqlValue .= ':'.$i.',';

        $bindType = 'string';
        if(is_numeric($rs))
            $bindType = 'int';

        array_push($parameter, array('name' => ':' . $i, 'value' => $rs, 'type' => $bindType));

    }
    $sqlField = substr($sqlField, 0, -1);
    $sqlValue = substr($sqlValue, 0, -1);

    $sql = 'insert into '.$p_table.' ('.$sqlField.') values ('.$sqlValue.')';

    $db->prepare($sql);

    $db->bind($parameter);

    $copyId = $db->run();

    //Data from rest parameter
    if(isset($eventData['data']) and $copyId) {

        foreach($eventData['data'] as $table) {

            if ($table == $p_table) {

                if ($table == 'im_section')
                    require_once 'php/run/copy/section.php';

            }else{

                if (stristr($table, ',')) {

                    $tableArray = explode(',', $table);

                } else $tableArray = array($table);
                foreach ($tableArray as $ta) {

                    $fieldIdTable = $fieldId;
                    if ($ta == 'im_translation')
                        $fieldIdTable = 'target_record';

                    $sql = 'select * from ' . $ta . ' where ' . $fieldIdTable . ' = :id';

                    $db->prepare($sql);

                    $parameter = array(
                        array('name' => ':id', 'value' => $p_id, 'type' => 'int')
                    );

                    $db->bind($parameter);

                    $recordSourceRest = $db->run('all');

                    if ($recordSourceRest) {

                        $parameter = array();
                        $sqlField = $sqlValue = '';
                        foreach ($recordSourceRest as $n => $rsr) {

                            $sqlValue .= '(';
                            foreach ($rsr as $j => $rsrd) {

                                if ($j == $addition->cleanText($ta, 'im_') . '_id' or $j == 'date_create' or $j == 'date_modify')
                                    continue;

                                if ($n == 0 and !is_int($j))
                                    $sqlField .= $j . ',';

                                if (!is_int($j))
                                    $sqlValue .= ':' . $j . $n . ',';

                                if (!is_int($j)) {

                                    if ($fieldIdTable == $j) {

                                        $newValue = $copyId;

                                    } else {

                                        $newValue = $rsrd;

                                    }

                                    $bindType = 'string';
                                    if (is_numeric($newValue))
                                        $bindType = 'int';

                                    array_push($parameter, array('name' => ':' . $j . $n, 'value' => $newValue, 'type' => $bindType));

                                }

                            }
                            if ($n == 0)
                                $sqlField = substr($sqlField, 0, -1);

                            $sqlValue = substr($sqlValue, 0, -1);

                            $sqlValue .= '),';


                        }

                        $sqlValue = substr($sqlValue, 0, -1);

                        $sql = 'insert into ' . $ta . ' (' . $sqlField . ') values ' . $sqlValue;

                        $db->prepare($sql);

                        $db->bind($parameter);

                        $db->run();

                    }

                }

            }

        }

    }

    $addition->link($addition->getUrl().',edit,'.$copyId);

    //$alert1 = $translation['message']['save-success'];

}