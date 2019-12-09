<?php

if(isset($eventData['field_supplement'])) {

    if(isset($eventData['field_supplement']->from)) {

        $sql = 'select '.$eventData['field_supplement']->field.' as field 
                from '.$eventData['field_supplement']->from->table;

        if(isset($eventData['field_supplement']->from->where)) {

            $sql .= ' where ' . $eventData['field_supplement']->from->where. ' = :' . $eventData['field_supplement']->from->where;

            $parameterType = 'string';
            if (is_int($eventData['field_supplement']->from->value))
                $parameterType = 'int';

            $parameter = array(
                array('name' => ':' . $eventData['field_supplement']->from->where, 'value' => $eventData['field_supplement']->from->value, 'type' => $parameterType)
            );

        }

        $db->prepare($sql);

        if(isset($parameter))
            $db->bind($parameter);

        $fieldSupplementFrom = $db->run('all');

        if($fieldSupplementFrom) {

            $fieldSupplementFromArray = $addition->implode3d($fieldSupplementFrom, 'field');

        }

    }

    if(isset($fieldSupplementFromArray)) {

        $sql = 'insert into '.$eventData['field_supplement']->table.' ('.$eventData['field_supplement']->new.', '.$eventData['field_supplement']->field.') values';

        $parameter = array();
        foreach ($fieldSupplementFromArray as $i => $fsf) {

            $sql .= '(:'.$eventData['field_supplement']->new.$i.', :'.$eventData['field_supplement']->field.$i.'),';

            $parameterType = 'string';
            if (is_int($fsf))
                $parameterType = 'int';

            array_push($parameter, array('name' => ':' . $eventData['field_supplement']->new.$i, 'value' => $lastInsertId, 'type' => 'int'));

            array_push($parameter, array('name' => ':' . $eventData['field_supplement']->field.$i, 'value' => $fsf, 'type' => $parameterType));

        }

        $sql = substr($sql, 0, -1);

        $db->prepare($sql);

        $db->bind($parameter);

        $db->run();

    }

}