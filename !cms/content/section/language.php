<?php
//Table definition init in this file
$table = 'im_language';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(1);
//---

$oneData = (object) array('value' => $translation['menu']['definition']);

require_once 'php/script/one-data-display.php';

$sql = 'select 
        language_id,
        name,
        system_name,
        url,
        status_default,
        status,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify
        from ' . $table;

if($g_var1 == 'edit' and $g_var2 != '') {

    $sql .= ' where '.$addition->cleanText($table, 'im_').'_id = :id';

    $displayCount = 'one';

}else $displayCount = 'all';

$sql .= ' order by position';

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

        $eventData = array(
            'field' => $s_eventDefinition['add'][$table],
            'table_add' => array($table)
        );

        require_once 'content/box/event/add.php';

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record,
            'event' => 'edit,delete',
            'table_delete' => array('main' => $table),
            'restriction' => array(
                'delete' => array(
                    'im_translation' => 'language_id',
                    'im_translation_system' => 'language_id'
                )
            ),
            'sort' => true,
            'url' => $baseUrl,
            'system' => $tool->getSession('system'),
            'preview' => 'image'
        );

        require_once 'content/box/table/init.php';

    }

    if($displayCount == 'one') {

        $eventData = array(
            'field' => $s_eventDefinition['edit'][$table],
            'record' => $record,
            'url' => $baseUrl,
            'system' => $tool->getSession('system')
        );

        require_once 'content/box/event/edit.php';

    }

} else {

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}

echo '</div>';