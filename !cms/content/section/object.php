<?php

if($g_variable and $g_variable != '') {

//Table definition init in this file
    $table = 'im_object';
//---

    $sql = 'select 
        name,
        if(content = \'\', \'-\', content) as content,
        if(description = \'\', \'-\', description) as description,
        date_create,
        date_modify,
        status
        from ' . $table . '
        where type_id = ' .$g_variable;

    $db->prepare($sql);

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