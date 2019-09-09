<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_type_property';
//---
//Base url definition in this file
    $baseUrl = $addition->getUrl(3);
//---

    $getData = array(
        'column' => 'name',
        'table' => 'im_type',
        'in' => array('type_id' => $g_var1)
    );
    require_once 'php/script/one-data.php';

    require_once 'php/script/one-data-display.php';

    $sql = 'select 
        tj.property_id as property_id,
        t.type_property_id as type_property_id,
        tj.name as name,
        tj.system_name as system_name,
        if(tj.description = \'\', \'-\', tj.description) as description,
        t.class as class,
        t.class_field as class_field,
        tj.date_create as date_create,
        tj.date_modify as date_modify
        from ' . $table . ' t
        join im_property tj on(tj.property_id = t.property_id)';

    if($g_var2 == 'edit' and $g_var3 != '') {

        $sql .= ' where t.type_property_id = :id';

        $displayCount = 'one';

    }else $displayCount = 'all';

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' t.type_id = :type';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':type', 'value' => $g_var1, 'type' => 'int')
    );

    if($displayCount == 'one')
        array_push($parameter, array('name' => ':id', 'value' => $g_var3, 'type' => 'int'));

    $db->bind($parameter);

    $record = $db->run($displayCount);

    echo '<div class="col-12">';

    if ($record) {

        if($displayCount == 'all') {

            $eventData = array(
                'field' => $s_eventDefinition['add'][$table],
                'table_add' => array($table),
                'supplement' => array(
                    'im_type_property' => array(
                        'type_id' => $g_var1,
                        'position' => (count($record) + 1)
                    )
                )
            );

            require_once 'content/box/event/add.php';

            $tableData = array(
                'table' => $tableDefinition[$table],
                'record' => $record,
                'event' => 'edit,delete',
                'table_delete' => array('main' => $table),
                'url' => $baseUrl
            );

            require_once 'content/box/table/init.php';

        }
        if($displayCount == 'one') {

            $eventData = array(
                'field' => $s_eventDefinition['edit'][$table],
                'record' => $record,
                'url' => $baseUrl
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