<?php

if($g_var1 != '') {

//Table definition init in this file
    $table = 'im_object';
//---

    $getData = array(
        'column' => 'name',
        'table' => 'im_type',
        'in' => array('type_id' => $g_var1)
    );
    require_once 'php/script/one-data.php';

    require_once 'php/script/one-data-display.php';

    $sql = 'select 
        name,
        if(content = \'\', \'-\', content) as content,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify,
        status
        from ' . $table . '
        where type_id = :type
        order by date_modify desc';

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