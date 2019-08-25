<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_property';
//---

    $getData = array(
        'column' => 'name',
        'table' => 'im_type',
        'in' => array('type_id' => $g_var1)
    );
    require_once 'php/script/one-data.php';

    require_once 'php/script/one-data-display.php';

    $sql = 'select 
        t.name,
        t.system_name,
        if(t.description = \'\', \'-\', t.description) as description,
        tj.class,
        tj.class_field,
        t.date_create,
        t.date_modify
        from ' . $table . ' t
        join im_type_property tj on(tj.'.$addition->cleanText($table, 'im_').'_id = t.'.$addition->cleanText($table, 'im_').'_id)
        where tj.type_id = :type
        order by t.date_modify desc';

    $db->prepare($sql);

    $parameter = array(
        array('name' => ':type', 'value' => $g_var1, 'type' => 'int')
    );

    $db->bind($parameter);

    $record = $db->run('all');

    echo '<div class="col-12">';

    if ($record) {

        $tableData = array(
            'table' => $tableDefinition[$table],
            'record' => $record
        );

        require_once 'content/box/table/init.php';

    } else {

        echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

    }

    echo '</div>';

}else{

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}