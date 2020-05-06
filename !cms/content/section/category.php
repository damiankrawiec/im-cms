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

if($g_var2 == 'edit' and $g_var3 != '') {

    $sql .= ' where '.$addition->cleanText($table, 'im_').'_id = :id';

    $displayCount = 'one';

}else $displayCount = 'all';

if($g_var1 > 0) {

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' label_id = :label';

}

$sql .= ' order by position';

$sqlLast = $sql;

$db->prepare($sql);

$parameter = array();

if($g_var1 > 0)
    array_push($parameter, array('name' => ':label', 'value' => $g_var1, 'type' => 'int'));

if($displayCount == 'one')
    array_push($parameter, array('name' => ':id', 'value' => $g_var3, 'type' => 'int'));

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
            'table_add' => array($table),
            'supplement' => array(
                'im_category' => array(
                    'position' => ($record ? (count($record) + 1) : 1)
                )
            )
        );

        require_once 'content/box/event/add.php';

    }else{

        if(!$record)
            echo '<a href="'.$addition->getUrl(1).',0'.'" class="btn btn-light float-right mb-1">'.$translation['button']['reset-view'].'</a><div class="clearfix"></div>';

    }

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
                    'im_object_category' => 'category_id'
                )
            ),
            'url' => $baseUrl,
            'filter' => array('table' => 'im_label', 'id' => $g_var1)
        );

        if($g_var1 > 0)
            $tableData['sort'] = true;

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