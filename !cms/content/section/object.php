<?php
//Table definition init in this file
$table = 'im_object';

$sql = 'select 
        name,
        if(content = \'\', \'' . $translation['message']['no-data'] . '\', content) as content
        from ' . $table;

$db->prepare($sql);

$record = $db->run('all');

echo '<div class="col-12">';

if ($record) {

    echo '<table class="table table-hover">';
    echo '<thead>';
    echo '<tr>';
    foreach ($tableDefinition[$table]['head'] as $t) {

        echo '<th>' . $t . '</th>';

    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($record as $r) {

        echo '<tr>';

        echo '<td>' . $r['name'] . '</td>';

        echo '<td>' . $r['content'] . '</td>';

        echo '</tr>';

    }
    echo '</tbody>';
    echo '</table>';

} else {

    echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

}

echo '</div>';