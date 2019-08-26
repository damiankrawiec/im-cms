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

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record,
            'event' => 'edit'
        );

        require_once 'content/box/table/init.php';

    }

    if($displayCount == 'one') {

        $editData = array(
            'table' => $editDefinition[$table],
            'record' => $record
        );
        require_once 'content/box/edit.php';

    }

} else {

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}

echo '</div>';