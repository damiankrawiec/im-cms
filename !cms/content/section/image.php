<?php
//Table definition init in this file
$table = 'im_image';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(3);
//---

$oneData = (object) array('value' => $translation['menu']['image']);

require_once 'php/script/one-data-display.php';

$sql = 'select distinct 
        j.image_id as image_id,
        j.name as name,
        j.content as content,
        j.url as url,
        j.link as link,
        j.status as status,
        tj.position as position,
        if(j.description = \'\', \'-\', j.description) as description,
        j.date_create as date_create,
        j.date_modify as date_modify
        from ' . $table .' j
        join im_object_image tj on (tj.image_id = j.image_id)';

if($g_var2 == 'edit' and $g_var3 != '') {

    $sql .= ' where j.'.$addition->cleanText($table, 'im_').'_id = :id';

    $displayCount = 'one';

}else $displayCount = 'all';

if($g_var1 > 0) {

    $sql .= $addition->whereOrAnd($sql);

    $sql .= ' tj.object_id = :object';

}

$db->prepare($sql);

$parameter = array();

if($g_var1 > 0)
    array_push($parameter, array('name' => ':object', 'value' => $g_var1, 'type' => 'int'));

if($displayCount == 'one')
    array_push($parameter, array('name' => ':id', 'value' => $g_var3, 'type' => 'int'));

if(count($parameter) > 0)
    $db->bind($parameter);

$record = $db->run($displayCount);

echo '<div class="col-12">';

if ($record) {

    if($displayCount == 'all') {

        $eventData = array(
            'field' => $s_eventDefinition['add'][$table],
            'table_add' => array($table),
            'system' => $g_system
        );

        require_once 'content/box/event/add.php';

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record,
            'event' => 'edit,delete',
            'table_delete' => array('main' => $table),
            'restriction' => array(
                'delete' => array(
                    'im_object_image' => 'image_id'
                )
            ),
            'url' => $baseUrl,
            'filter' => array('table' => 'im_object', 'id' => $g_var1)
        );

        if($g_var1 > 0)
            $tableData['sort'] = true;

        require_once 'content/box/table/init.php';

    }

    if($displayCount == 'one') {

        $eventData = array(
            'field' => $s_eventDefinition['edit'][$table],
            'record' => $record,
            'url' => $baseUrl,
            'system' => $g_system
        );

        require_once 'content/box/event/edit.php';

    }

} else {

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}

echo '</div>';