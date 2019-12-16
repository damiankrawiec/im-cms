<?php
//Table definition init in this file
$table = 'im_property';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(1);
//---

$sql = 'select 
        property_id,
        name,
        system_name,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify
        from ' . $table;

if($g_var1 == 'edit' and $g_var2 != '') {

    $sql .= ' where '.$addition->cleanText($table, 'im_').'_id = :id';

    $displayCount = 'one';

}else $displayCount = 'all';

$db->prepare($sql);

if($displayCount == 'one') {

    $parameter = array(
        array('name' => ':id', 'value' => $g_var2, 'type' => 'int')
    );

    $db->bind($parameter);

}

if($displayCount == 'all') {

    $lastData = array('sql' => $sql);
    if (isset($parameter))
        $lastData['parameter'] = $parameter;

}

$record = $db->run($displayCount);

echo '<div class="col-12">';

if($displayCount == 'all') {

    $eventData = array(
        'field' => $s_eventDefinition['add'][$table],
        'table_add' => array($table)
    );

    require_once 'content/box/event/add.php';

}

if ($record) {

    if($displayCount == 'all') {

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record,
            'event' => 'edit,delete',
            'table_delete' => array('main' => $table),
            'restriction' => array(
                'delete' => array(
                    'im_type_property' => 'property_id'
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
            'url' => $baseUrl
        );

        require_once 'content/box/event/edit.php';

    }

} else {

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}

echo '</div>';