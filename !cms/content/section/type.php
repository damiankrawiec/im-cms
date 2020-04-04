<?php
//Table definition init in this file
$table = 'im_type';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(1);
//---

$oneData = (object) array('value' => $translation['menu']['type']);

require_once 'php/script/one-data-display.php';

$sql = 'select 
        type_id,
        name,
        class,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify,
        status
        from ' . $table;

if($g_var1 == 'edit' and $g_var2 != '') {

    $sql .= ' where '.$addition->cleanText($table, 'im_').'_id = :id';

    $displayCount = 'one';

}else $displayCount = 'all';

$db->prepare($sql);

if($displayCount == 'one') {

    require_once 'php/script/object-back.php';

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
            'event' => 'edit,delete,go',//When is "go" attr defined, then must be defined too array with "go" index (below)
            'table_delete' => array('main' => $table),
            'restriction' => array(
                'delete' => array(
                    'im_object' => 'type_id',
                    'im_type_property' => 'type_id'
                )
            ),
            'url' => $baseUrl,
            'go' => array(
                array('name' => $icon['menu']['object'], 'url' => 'object'),
                array('name' => $icon['menu']['type-property'], 'url' => 'type-property')
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