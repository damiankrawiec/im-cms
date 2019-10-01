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
        system_name,
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

    $sqlLast = $sql;

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':type', 'value' => $g_var1, 'type' => 'int')
    );

    if($displayCount == 'one')
        array_push($parameter, array('name' => ':id', 'value' => $g_var3, 'type' => 'int'));

    $db->bind($parameter);

    if($displayCount == 'all') {

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
                'im_object' => array(
                    'type_id' => $g_var1,
                    'position' => ($record ? (count($record) + 1) : 1)
                )
            )
        );

        require_once 'content/box/event/add.php';

    }

    if ($record) {

        if($displayCount == 'all') {

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
                'fix-0' => array(
                    'collection' => array('name' => $translation['fix']['section'], 'table' => 'im_section'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_section_object', 'id' => 'section_id')
                ),
                'fix-1' => array(
                    'collection' => array('name' => $translation['fix']['category'], 'table' => 'im_category'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_category', 'id' => 'category_id')
                ),
                'fix-2' => array(
                    'collection' => array('name' => $translation['fix']['image'], 'table' => 'im_image'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_image', 'id' => 'image_id')
                ),
                'fix-3' => array(
                    'collection' => array('name' => $translation['fix']['file'], 'table' => 'im_file'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_file', 'id' => 'file_id')
                ),
                'fix-4' => array(
                    'collection' => array('name' => $translation['fix']['movie'], 'table' => 'im_movie'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_movie', 'id' => 'movie_id')
                )
            );

            //Filter fields in type (hide)
            require_once 'php/script/field.php';

            require_once 'content/box/event/edit.php';

        }

    } else {

        echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

    }

    echo '</div>';

}else{

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}