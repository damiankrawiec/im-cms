<?php
//Table definition init in this file
$table = 'im_type';
//---

$oneData = (object) array('value' => $translation['menu']['type']);

require_once 'php/script/one-data-display.php';

$sql = 'select 
        '.$addition->cleanText($table, 'im_').'_id as id,
        name,
        class,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify
        from ' . $table;

        if($g_var1 == 'edit' and $g_var2 != '') {

            $sql .= ' where '.$addition->cleanText($table, 'im_').'_id = :id';

            $displayCount = 'one';

        }else{

            $sql .= ' order by date_modify desc';

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

        $eventData = array(
            'field' => $s_eventDefinition['add'][$table],
            'table' => $table
        );

        require_once 'content/box/event/add.php';

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record,
            'table_name' => $table,
            'event' => 'edit,delete',
            'restriction' => array(
                'delete' => array(
                    'im_object' => 'type_id',
                    'im_type_property' => 'type_id'
                )
            )
        );

        require_once 'content/box/table/init.php';

    }

    if($displayCount == 'one') {

        $eventData = array(
            'field' => $s_eventDefinition['edit'][$table],
            'record' => $record,
            'table' => $table
        );

        require_once 'content/box/event/edit.php';

    }

} else {

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}

echo '</div>';