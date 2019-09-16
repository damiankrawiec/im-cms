<?php

if(isset($eventData['fix']) and is_array($eventData['fix']) and count($eventData['fix']) > 0) {

    $sql = 'select '.$addition->cleanText($eventData['fix']['collection'], 'im_').'_id as id, name from '.$eventData['fix']['collection'];

    $db->prepare($sql);

    $collection = $db->run('all');

    if($collection) {

        $collectionArray = array();
        foreach ($collection as $c) {

            array_push($collectionArray, array('collect' => $c['name'], 'value' => $c['id']));

        }

        echo '<div class="collection im-hide">'.json_encode($collectionArray).'</div>';

        echo '<div class="container">
            <div style="margin-top:50px">
                Selected: <span id="selectedItemSpan"></span>
            </div>
            <div class="transfer"></div>';

        echo '</div>';

//        echo '<select name="form_' . $i . '" class="form-control'.$require.'" id="' . $i . '">';
//
//        echo '<option value="0">'.$translation['select']['no-set'].'</option>';
//
//        foreach ($property as $p) {
//
//            $selected = '';
//            if(isset($eventData['record']) and $eventData['record']->$i == $p['id'])
//                $selected = ' selected';
//
//            echo '<option value="'.$p['id'].'"'.$selected.'>'.$p['name'].'</option>';
//
//        }
//
//        echo '</select>';

    }

}