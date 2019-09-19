<?php
//Table definition init in this file
$table = 'im_category';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(2);
//---

$oneData = (object) array('value' => $translation['menu']['category']);

require_once 'php/script/one-data-display.php';

$sql = 'select 
        category_id,
        label_id,
        name,
        if(content = \'\', \'-\', content) as content,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify,
        status
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

$record = $db->run($displayCount);

echo '<div class="col-12">';

if ($record) {

    if($displayCount == 'all') {

        $eventData = array(
            'field' => $s_eventDefinition['add'][$table],
            'table_add' => array($table),
            'supplement' => array(
                'im_category' => array(
                    'position' => (count($record) + 1)
                )
            )
        );

        require_once 'content/box/event/add.php';

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record,
            'event' => 'edit,delete',
            'table_delete' => array('main' => $table),
            'restriction' => array(
                'delete' => array(
                    'im_object_category' => 'category_id'
                )
            ),
            'sort' => true,
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