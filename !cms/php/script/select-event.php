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

    $sql = 'select '.$addition->cleanText($select[1], 'im_').'_id as id, name';

    if($select[1] == 'im_section')
        $sql .= ', name_url';

    $sql .= ' from '.$select[1];

    if(isset($propertyNotDisplay)) {

        if(isset($eventData['restriction']['select']['data']['expand'])) {

            $keyUnset = array_search($eventData['restriction']['select']['data']['expand'], $propertyNotDisplay);

            unset($propertyNotDisplay[$keyUnset]);

        }

        $countPropertyNotDisplay = count($propertyNotDisplay);

        if($countPropertyNotDisplay > 0) {

            if($countPropertyNotDisplay > 1) {

                $notIn = implode(',', $propertyNotDisplay);

            }else{

                //reset($propertyNotDisplay);

                $notIn = current($propertyNotDisplay);

            }

            $sql .= ' where ' . $eventData['restriction']['select']['data']['get'] . ' not in(' . $notIn . ')';

        }

    }

    $sql .= ' order by date_create desc';

    $db->prepare($sql);

    $property = $db->run('all');

    if($property) {

        echo '<select name="form_' . $i . '" class="form-control'.$require.'" id="' . $i . '">';

        echo '<option value="0">'.$translation['select']['no-set'].'</option>';

        foreach ($property as $p) {

            $selected = '';
            if(isset($eventData['record']) and $eventData['record']->$i == $p['id'])
                $selected = ' selected';

            echo '<option value="'.$p['id'].'"'.$selected.'>';

            echo $p['name'];

            if($select[1] == 'im_section')
                echo ' ('.$p['name_url'].')';

            echo '</option>';

        }

        echo '</select>';

    }else echo $addition->message($translation['message']['no-data']);

}