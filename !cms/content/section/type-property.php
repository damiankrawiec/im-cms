<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_type_property';
//---
//Base url definition in this file
    $baseUrl = $addition->getUrl(2);
//---

    $getData = array(
        'column' => 'name',
        'table' => 'im_type',
        'in' => array('type_id' => $g_var1)
    );
    require_once 'php/script/one-data.php';

    require_once 'php/script/one-data-display.php';

    $sql = 'select 
        t.type_property_id as type_property_id,
        t.property_id as property_id,
        tj.name as name,
        tj.system_name as system_name,
        if(t.description = \'\', \'-\', t.description) as description,
        t.class as class,
        t.class_field as class_field,
        t.date_create as date_create,
        t.date_modify as date_modify,
        t.status as status
        from ' . $table . ' t
        join im_property tj on(tj.property_id = t.property_id)';

    if($g_var2 == 'edit' and $g_var3 != '') {

        $sql .= ' where t.type_property_id = :id';

        $displayCount = 'one';

    }else $displayCount = 'all';

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' t.type_id = :type';

    $sql .= ' order by t.position';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':type', 'value' => $g_var1, 'type' => 'int')
    );

    if($displayCount == 'one')
        array_push($parameter, array('name' => ':id', 'value' => $g_var3, 'type' => 'int'));

    $db->bind($parameter);

    if($displayCount == 'all') {

        require_once 'php/script/object-back.php';

        $lastData = array('sql' => $sql);

        $lastData['parameter'] = $parameter;

    }

    $record = $db->run($displayCount);

    echo '<div class="col-12">';

    if($displayCount == 'all') {

        $eventData = array(
            'field' => $s_eventDefinition['add'][$table],
            'table_add' => array($table),
            'supplement' => array(
                'im_type_property' => array(
                    'type_id' => $g_var1,
                    'position' => ($record ? (count($record) + 1) : 1)
                )
            )
        );

        if($record) {

            $eventData['restriction'] = array(
                'select' => array(
                    'data' => array('table' => 'im_type_property', 'get' => 'property_id', 'field' => 'type_id', 'value' => $g_var1)
                )
            );

        }

        require_once 'content/box/event/add.php';

    }

    if ($record) {

        if($displayCount == 'all') {

            $tableData = array(
                'table' => $tableDefinition[$table],
                'record' => $record,
                'event' => 'edit,delete',
                'table_delete' => array('main' => $table),
                'sort' => true,
                'url' => $baseUrl
            );

            require_once 'content/box/table/init.php';

        }
        if($displayCount == 'one') {

            $eventData = array(
                'field' => $s_eventDefinition['edit'][$table],
                'record' => $record,
                'url' => $baseUrl,
                'restriction' => array(
                    'select' => array(
                        'data' => array('table' => 'im_type_property', 'get' => 'property_id', 'field' => 'type_id', 'value' => $g_var1, 'expand' => $record->property_id)
                    )
                )
            );

            require_once 'content/box/event/edit.php';

        }

    } else {

        echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

    }

    echo '</div>';

}else{

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}