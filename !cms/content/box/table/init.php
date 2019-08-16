<?php

if(isset($tableData) and is_array($tableData) and count($tableData) > 0) {

    echo '<table class="table table-hover">';
        echo '<thead class="thead-light text-center">';
            echo '<tr>';
            $field = array();
            foreach ($tableData['table'] as $i => $t) {

                echo '<th>' . $t . '</th>';
                array_push($field, $i);

            }
            //count($field), means number of column
            $countColumn = count($field);
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
        echo '<tfoot class="text-right text-secondary">';
            echo '<tr><td colspan="'.$countColumn.'"><small>';
            echo $s_systemName;
            echo '</small></td></tr>';
        echo '</tfoot>';
    echo '</table>';

}