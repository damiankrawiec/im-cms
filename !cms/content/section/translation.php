<?php

if($p_back)
    $tool->setSession('back', $p_back);

echo '<a href="'.$tool->getSession('back').'" class="btn btn-outline-light m-3">'.$icon['button']['back'].' '.$translation['button']['back'].'</a>';

//Table definition init in this file
$table = 'im_translation';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(5);
//---

$oneData = (object) array('value' => $translation['menu']['translation']);

require_once 'php/script/one-data-display.php';

$sql = 'select
        translation_id,
        language_id,
        name,
        target_table,
        target_column,
        target_record,
        content,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify
        from ' . $table. ' ';

if($g_var1 != '') {

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' target_table like :table';

}
if($g_var2 != '') {

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' target_column like :column';

}
if($g_var3 != '') {

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' target_record = :record';

}

if($g_var4 == 'edit' and $g_var5 != '') {

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' '.$addition->cleanText($table, 'im_').'_id = :id';

    $displayCount = 'one';

}else $displayCount = 'all';

$db->prepare($sql);

$parameter = array();

if($g_var1 != '')
    array_push($parameter, array('name' => ':table', 'value' => $g_var1, 'type' => 'string'));

if($g_var2 != '')
    array_push($parameter, array('name' => ':column', 'value' => $g_var2, 'type' => 'string'));

if($g_var3 != '')
    array_push($parameter, array('name' => ':record', 'value' => $g_var3, 'type' => 'int'));

if($displayCount == 'one')
    array_push($parameter, array('name' => ':id', 'value' => $g_var5, 'type' => 'int'));

$db->bind($parameter);

$record = $db->run($displayCount);

if($g_var2 == 'name') {

    $s_eventDefinition['add'][$table]['content']['type'] = $s_eventDefinition['edit'][$table]['content']['type'] = 'text';
    $s_eventDefinition['add'][$table]['content']['require'] = $s_eventDefinition['edit'][$table]['content']['require'] = 'validation :text';

}

if($g_var2 == 'content') {

    $s_eventDefinition['add'][$table]['content']['type'] = $s_eventDefinition['edit'][$table]['content']['type'] = 'textarea:editor';
    $s_eventDefinition['add'][$table]['content']['require'] = $s_eventDefinition['edit'][$table]['content']['require'] = 'validation :textarea';

}

echo '<div class="col-12">';

if($displayCount == 'all') {

    $eventData = array(
        'field' => $s_eventDefinition['add'][$table],
        'table_add' => array($table)
    );

    $supplement = array();

    if($g_var1 != '')
        $supplement['target_table'] = $g_var1;

    if($g_var2 != '')
        $supplement['target_column'] = $g_var2;

    if($g_var3 != '')
        $supplement['target_record'] = $g_var3;

    if(count($supplement) > 0)
        $eventData['supplement']['im_translation'] = $supplement;

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