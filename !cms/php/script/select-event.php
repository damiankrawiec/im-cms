<?php

if(stristr($field['type'], 'select')) {

    $select = explode(':', $field['type']);

    if(isset($eventData['restriction']['select']['data'])) {

        $sql = 'select '.$eventData['restriction']['select']['data']['get'].' as field from '.$eventData['restriction']['select']['data']['table'];

        $sql .= ' where '.$eventData['restriction']['select']['data']['field'].' = :field';

        $db->prepare($sql);

        $parameter = array(
            array('name' => ':field', 'value' => $eventData['restriction']['select']['data']['value'], 'type' => 'int')
        );

        $db->bind($parameter);

        $propertyNotDisplayRecord = $db->run('all');

        $propertyNotDisplay = $addition->implode3d($propertyNotDisplayRecord, 'field');

    }

    $sql = 'select '.$addition->cleanText($select[1], 'im_').'_id as id, name from '.$select[1];

    if(isset($propertyNotDisplay)) {

        if(isset($eventData['restriction']['select']['data']['expand'])) {

            $keyUnset = array_search($eventData['restriction']['select']['data']['expand'], $propertyNotDisplay);

            unset($propertyNotDisplay[$keyUnset]);

        }

        $sql .= ' where '.$eventData['restriction']['select']['data']['get'].' not in('.implode(',', $propertyNotDisplay).')';

    }

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