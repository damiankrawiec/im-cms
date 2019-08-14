<?php

if(isset($tableData) and is_array($tableData) and count($tableData) > 0) {

    echo '<table class="table table-hover table-striped">';
    echo '<thead>';
    echo '<tr>';

    $field = array();
    $column = 0;

    foreach ($tableData['table'] as $i => $t) {

        echo '<th>' . $t . '</th>';
        array_push($field, $i);
        $column++;

    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($tableData['record'] as $r) {

        echo '<tr>';

        foreach ($field as $f) {

            echo '<td>';

            if($f == 'status') {

                echo '<a href="#">'.$icon['status'][$r[$f]].'</a>';

            }else{

                echo $r[$f];

            }

            echo '</td>';

        }

        echo '</tr>';

    }
    echo '</tbody>';
    echo '</table>';

}