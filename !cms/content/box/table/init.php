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

            if(isset($tableData['event'])) {

                echo '<th>'.$translation['table']['event'].'</th>';

                $countColumn++;

            }

            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($tableData['record'] as $r) {

            echo '<tr>';

            foreach ($field as $f) {

                echo '<td class="align-middle">';

                if($f == 'status') {

                    echo '<a href="#">'.$icon['status'][$r[$f]].'</a>';

                }else{

                    echo $r[$f];

                }

                echo '</td>';

            }

            if(isset($tableData['event'])) {

                echo '<td class="align-middle">';

                    //Edit
                    if(stristr($tableData['event'], 'edit'))
                        echo '<a href="'.$tableData['url'].',edit,'.$r['id'].'" class="btn btn-outline-info text-info">'.$icon['button']['edit'].'</a>';

                    //Delete
                    if(stristr($tableData['event'], 'delete')) {

                        echo '<a href="#" class="btn btn-outline-info text-info modal-click">' . $icon['button']['delete'] . '</a>';

                        echo '<form action="' . $tableData['url'] . '" method="post">';

                        //All event need table
                        echo '<input type="hidden" name="event_table" value="'.$tableData['table_name'].'">';

                        //Edit and delete need id (not add)
                        echo '<input type="hidden" name="event_id" value="'.$r['id'].'">';

                        //Check if there some restrictions for delete
                        if(isset($tableData['restriction']['delete'])) {

                            $restrictionJson = json_encode($tableData['restriction']['delete']);

                            $restrictionJson = str_replace('"', '\'', $restrictionJson);

                            echo '<input type="hidden" name="restriction" value="'.$restrictionJson.'">';

                        }

                        echo '<input type="hidden" name="event" value="delete">';

                        echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

                        echo '</form>';

                        echo '<div class="im-hide modal-data">'.json_encode(array('text' => $translation['modal']['confirm-delete'].': "'.$r['name'].'"', 'save' => 'submit-next-form', 'cancel' => '')).'</div>';

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