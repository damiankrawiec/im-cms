<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_property';
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
        t.'.$addition->cleanText($table, 'im_').'_id as id,
        t.name,
        t.system_name,
        if(t.description = \'\', \'-\', t.description) as description,
        tj.class,
        tj.class_field,
        t.date_create,
        t.date_modify
        from ' . $table . ' t
        join im_type_property tj on(tj.'.$addition->cleanText($table, 'im_').'_id = t.'.$addition->cleanText($table, 'im_').'_id)';

    if($g_var2 == 'edit' and $g_var3 != '') {

        $sql .= ' where t.'.$addition->cleanText($table, 'im_').'_id = :id';

        $displayCount = 'one';

    }else $displayCount = 'all';

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' tj.type_id = :type';

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
                'table' => $table
            );

            require_once 'content/box/event/add.php';

            $tableData = array(
                'table' => $tableDefinition[$table],
                'record' => $record,
                'table_name' => $table,
                'event' => 'edit,delete',
                'restriction' => array(
                    'delete' => array(
                        'im_object' => 'type_id',
                        'im_type_property' => 'type_id'
                    )
                ),
                'url' => $baseUrl
            );

            require_once 'content/box/table/init.php';

        }
        if($displayCount == 'one') {

            $eventData = array(
                'field' => $s_eventDefinition['edit'][$table],
                'record' => $record,
                'table' => $table,
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