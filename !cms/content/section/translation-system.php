<?php
//Table definition init in this file
$table = 'im_translation_system';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(2);
//---

$oneData = (object) array('value' => $translation['menu']['translation-system']);

require_once 'php/script/one-data-display.php';

$sql = 'select 
        t.translation_system_id as translation_system_id,
        t.language_id as language_id,
        t.name as name,
        t.system_name as system_name,
        tj.name as language,
        t.content as content,
        if(t.description = \'\', \'-\', t.description) as description,
        t.date_create as date_create,
        t.date_modify as date_modify
        from ' . $table .' t
        join im_language tj on(tj.language_id = t.language_id)';

if($g_var2 == 'edit' and $g_var3 != '') {

    $sql .= ' where t.translation_system_id = :id';

    $displayCount = 'one';

}else $displayCount = 'all';

if($g_var1 > 0) {

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' t.language_id = :language';

}

$db->prepare($sql);

$parameter = array();

if($displayCount == 'one')
    array_push($parameter, array('name' => ':id', 'value' => $g_var3, 'type' => 'int'));

if($g_var1 > 0)
    array_push($parameter, array('name' => ':language', 'value' => $g_var1, 'type' => 'int'));

if(count($parameter) > 0)
    $db->bind($parameter);

if($displayCount == 'all') {

    $lastData = array('sql' => $sql);
    if (count($parameter) > 0)
        $lastData['parameter'] = $parameter;

}

$record = $db->run($displayCount);

echo '<div class="col-12">';

if($displayCount == 'all') {

    if($g_var1 == 0) {

        $eventData = array(
            'field' => $s_eventDefinition['add'][$table],
            'table_add' => array($table)
        );

        require_once 'content/box/event/add.php';

    }

}

if($g_var1 > 0 and !$record)
    echo '<a href="'.$addition->getUrl(1).',0'.'" class="btn btn-light float-right mb-1">'.$translation['button']['reset-view'].'</a><div class="clearfix"></div>';


if ($record) {

    if($displayCount == 'all') {

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record,
            'event' => 'edit,delete',
            'table_delete' => array('main' => $table),
            'url' => $baseUrl,
            'filter' => array('table' => 'im_language', 'id' => $g_var1)
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