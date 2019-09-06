<?php

if(stristr($field['type'], 'select')) {

    $select = explode(':', $field['type']);

    $sql = 'select '.$addition->cleanText($select[1], 'im_').'_id as id, name from '.$select[1];

    $db->prepare($sql);

    $property = $db->run('all');

    if($property) {

        echo '<select name="form_' . $i . '" class="form-control'.$require.'" id="' . $i . '">';

        echo '<option value="0">'.$translation['select']['no-set'].'</option>';

        foreach ($property as $p) {

            $selected = '';
            if(isset($eventData['record']) and $eventData['record']->$i == $p['id'])
                $selected = ' selected';

            echo '<option value="'.$p['id'].'"'.$selected.'>'.$p['name'].'</option>';

        }

        echo '</select>';

    }else echo $addition->message($translation['message']['no-data']);

}