<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_object';
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
        object_id,
        label_id,
        system_name,
        name,
        section,
        section_name,
        link,
        link_name,
        email,
        form,
        icon,
        map,
        date,
        content,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify,
        status,
        status_copy
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
            ),
            'field_supplement' => array(
                'checkbox' => array(
                    'name' => $tableDefinitionEvent['im_object']['status_copy'],
                    'table' => 'im_section_object',
                    'new' => 'object_id',
                    'field' => 'section_id',
                    'from' => array('table' => 'im_section', 'where' => 'status_copy', 'value' => 'on')
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
                'event' => 'edit,delete,copy',
                'table_delete' => array('im_section_object', 'im_object_category', 'im_object_source', 'im_object_image', 'im_object_file', 'im_object_movie', 'main' => $table),
                'sort' => true,
                'url' => $baseUrl,
                'copy' => array(
                    'form_fix' => array('type' => 'checkbox', 'display' => $translation['copy']['fix'], 'table' => 'im_section_object,im_object_category'),
                    'form_outer_data' => array('type' => 'checkbox', 'display' => $translation['copy']['outer-data'], 'table' => 'im_object_file,im_object_image,im_object_source'),
                    'form_translation' => array('type' => 'checkbox', 'display' => $translation['copy']['translation'], 'table' => 'im_translation')
                )
            );

            require_once 'content/box/table/init.php';

        }
        if($displayCount == 'one') {

            if($g_var4 != '') {

                $cmsBack = $g_var4;
                require_once 'php/script/cms-back.php';

            }

            $labelId = $record->label_id;
            require_once 'php/script/object-move.php';

            $eventData = array(
                'field' => $s_eventDefinition['edit'][$table],
                'record' => $record,
                'url' => $baseUrl,
                'system' => $tool->getSession('system'),
                'fix-0' => array(
                    'collection' => array('name' => $translation['fix']['section'], 'table' => 'im_section'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_section_object', 'id' => 'section_id')
                ),
                'fix-1' => array(
                    'collection' => array('name' => $translation['fix']['category'], 'table' => 'im_category', 'where' => 'label_id = '.$record->label_id),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_category', 'id' => 'category_id')
                ),
                'fix-2' => array(
                    'collection' => array('name' => $translation['fix']['image'], 'table' => 'im_image'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_image', 'id' => 'image_id', 'sort' => 'position')
                ),
                'fix-3' => array(
                    'collection' => array('name' => $translation['fix']['file'], 'table' => 'im_file'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_file', 'id' => 'file_id', 'sort' => 'position')
                ),
                'fix-4' => array(
                    'collection' => array('name' => $translation['fix']['source'], 'table' => 'im_source'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_source', 'id' => 'source_id', 'sort' => 'position')
                ),
                'fix-5' => array(
                    'collection' => array('name' => $translation['fix']['movie'], 'table' => 'im_movie'),
                    'id' => array('name' => 'object_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_object_movie', 'id' => 'movie_id', 'sort' => 'position')
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