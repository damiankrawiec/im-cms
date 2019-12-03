<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_section';
//---
//Base url definition in this file
    $baseUrl = $addition->getUrl(3);
//---

    require_once 'content/box/section/breadcrumb.php';

    $sql = 'select 
        section_id,
        name,
        name_url,
        meta,
        if(icon = \'\', \'-\', icon) as icon,
        class,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify,
        status
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
            )
        );

        require_once 'content/box/event/add.php';

    }

    if ($record) {

        if($displayCount == 'all') {

            $tableData = array(
                'table' => $tableDefinition[$table],
                'record' => $record,
                'event' => 'edit,delete,move',
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