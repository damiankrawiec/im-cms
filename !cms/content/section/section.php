<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_section';
//---
//Base url definition in this file
    $baseUrl = $addition->getUrl(2);
//---

    require_once 'content/box/section/breadcrumb.php';

    $sql = 'select 
        section_id,
        name,
        name_url,
        name_second,
        meta,
        if(icon = \'\', \'-\', icon) as icon,
        class,
        popup,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify,
        status,
        status_copy,
        status_popup,
        status_parallax
        from ' . $table;

    if($g_var2 == 'edit' and $g_var3 != '') {

        $sql .= ' where section_id = :id';

        $displayCount = 'one';

    }else $displayCount = 'all';

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' parent = :parent';

    $sql .= ' order by position';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':parent', 'value' => $g_var1, 'type' => 'int')
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
                'im_section' => array(
                    'name_url' => 'create',
                    'parent' => $g_var1,
                    'position' => ($record ? (count($record) + 1) : 1)
                ),
            ),
            'field_supplement' => array(
                'checkbox' => array(
                    'name' => $tableDefinitionEvent['im_section']['status_copy'],
                    'table' => 'im_section_object',
                    'new' => 'section_id',
                    'field' => 'object_id',
                    'from' => array('table' => 'im_object', 'where' => 'status_copy', 'value' => 'on')
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
                'event' => 'edit,delete,move,url',
                'table_delete' => array('im_section_object', 'main' => $table),
                'sort' => true,
                'url' => $baseUrl,
                'restriction' => array(
                    'delete' => array(
                        'im_section' => 'parent'
                    )
                )
            );

            require_once 'content/box/table/init.php';

        }
        if($displayCount == 'one') {

            $eventData = array(
                'field' => $s_eventDefinition['edit'][$table],
                'record' => $record,
                'url' => $baseUrl,
                'system' => $tool->getSession('system'),
            );

            if($record->status_parallax == 'on'){

                $eventData['fix-0'] = array(
                    'collection' => array('name' => $translation['fix']['image'], 'table' => 'im_image'),
                    'id' => array('name' => 'section_id', 'value' => $g_var3),
                    'table' => array('name' => 'im_section_image', 'id' => 'image_id', 'sort' => 'position')
                );

            }


            require_once 'content/box/event/edit.php';

        }

    } else {

        echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

    }

    echo '</div>';

}else{

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}