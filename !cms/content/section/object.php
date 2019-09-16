<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_object';
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
        object_id,
        label_id,
        name,
        section,
        link,
        date,
        if(content = \'\', \'-\', content) as content,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify,
        status
        from ' . $table;

    if($g_var2 == 'edit' and $g_var3 != '') {

        $sql .= ' where object_id = :id';

        $displayCount = 'one';

    }else $displayCount = 'all';

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' type_id = :type';

    $sql .= ' order by position';

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
                    'im_object' => array(
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
                'table_delete' => array('im_section_object', 'im_object_category', 'im_object_movie', 'im_object_image', 'im_object_file', 'main' => $table),
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
                'fix' => array(
                    'collection' => 'im_section',
                    'id' => array('object_id' => $g_var3),
                    'table' => array('section_object_id' => 'section_id')
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