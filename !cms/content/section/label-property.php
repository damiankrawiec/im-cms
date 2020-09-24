<?php
//Table definition init in this file
$table = 'im_label_section';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(1);
//---

$oneData = (object) array('value' => $translation['menu']['label-property']);

require_once 'php/script/one-data-display.php';

$sql = 'select 
        t.label_section_id as label_section_id,
        t.label_id as label_id,
        tj.name as label,
        tj.system_name as system_name,
        t.section as section,
        ifnull((select name from im_section where section_id = t.section), "'.$translation['table']['all'].'") as name,-- the section is not in relation
        t.class as class,
        t.class_row as class_row,
        if(t.description = \'\', \'-\', t.description) as description,
        t.date_create as date_create,
        t.date_modify as date_modify
        from ' . $table . ' t
        join im_label tj on(tj.label_id = t.label_id)';

if($g_var1 == 'edit' and $g_var2 != '') {

    $sql .= ' where '.$addition->cleanText($table, 'im_').'_id = :id';

    $displayCount = 'one';

}else $displayCount = 'all';

$sqlLast = $sql;

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