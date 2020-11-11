<?php
//Table definition init in this file
$table = 'im_form';
//---
//Base url definition in this file
$baseUrl = $addition->getUrl(1);
//---

$oneData = (object) array('value' => $translation['menu']['form']);

require_once 'php/script/one-data-display.php';

$sql = 'select 
        form_id,
        name,
        content,
        email_source,
        email_destination,
        if(description = \'\', \'-\', description) as description,
        date_create
        from ' . $table;

if($g_var1 == 'edit' and $g_var2 != '') {

    $sql .= ' where '.$addition->cleanText($table, 'im_').'_id = :id';

    $displayCount = 'one';

}else{

    $sql .= ' order by date_create desc';

    $displayCount = 'all';
}

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

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record,
            'event' => 'edit:preview,delete',
            'table_delete' => array('main' => $table),
            'url' => $baseUrl,
            'no-last' => true
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