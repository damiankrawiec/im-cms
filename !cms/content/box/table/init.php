<?php
if(isset($tableData) and is_array($tableData) and count($tableData) > 0) {

    $lastId = 0;
    if(!isset($tableData['no-last']))
        require_once 'php/script/last.php';

    if(isset($tableData['filter'])) {

        $sql = 'select '.
                $addition->cleanText($tableData['filter']['table'], 'im_').'_id as id,
                name
                from ' . $tableData['filter']['table'];

        $db->prepare($sql);

        $filter = $db->run('all');

        if($filter) {

            echo '<div class="float-right filter-box">';

            echo '<select class="form-control filter">';

            echo '<option value="0">'.$translation['select']['all'].'</option>';

            foreach ($filter as $fi) {

                $selected = '';
                if($fi['id'] == $tableData['filter']['id'])
                    $selected = ' selected';

                echo '<option value="'.$fi['id'].'"'.$selected.'>'.$fi['name'].'</option>';

            }

            echo '</select>';

            echo '</div>';

            echo '<div class="clearfix"></div>';

        }

    }

    if(isset($tableData['sort'])) {

        echo '<a href="#" class="btn btn-secondary float-right sort-status" title="'.$translation['button']['off'].'">'.$translation['button']['on'].' ' . $translation['table']['sort'] . ' ' . $icon['button']['sort'] . '</a>';

        echo '<div class="float-right im-hide">';

            echo '<button class="btn btn-info" id="sort-save">' . $translation['button']['save'] .' '.$icon['button']['save'].'</button>';

            echo '<button class="btn btn-secondary ml-1" id="sort-cancel">' . $translation['button']['cancel'] . ' '.$icon['button']['cancel'].'</button>';

        echo '</div>';

        echo '<div class="clearfix"></div>';

    }

    echo '<table class="table table-hover data-table" id="'.$table.'">';
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
        echo '<tbody id="sortable">';
        foreach ($tableData['record'] as $r) {

            $currentId = $r[$addition->cleanText($table, 'im_').'_id'];

            echo '<tr id="'.$currentId.'"'.($currentId == $lastId ? ' class="last-record"' : '').'>';

            foreach ($field as $f) {

                echo '<td class="align-middle">';

                if(stristr($f, 'status')) {

                    echo '<a href="#" class="status" id="'.$table.':'.$f.':'.$currentId.'">'.$icon['status'][$r[$f]].'</a>';

                }else{

                    if($f == 'icon' and $r[$f] != '-')
                        echo '<i class="';

                    if(isset($tableData['preview']) and $f == 'url') {

                        $filePath = '../system/' . $tableData['system'] . '/public/' . $r[$f];

                        if($addition->fileExists($filePath)) {

                            if($tableData['preview'] == 'image')
                                echo '<img src="../system/' . $tableData['system'] . '/public/' . $r[$f] . '" title="' . $r[$f] . '" style="max-width: ' . $s_previewImage . '">';

                            if($tableData['preview'] == 'file')
                                echo '<a href="../system/' . $tableData['system'] . '/public/' . $r[$f] . '" title="' . $r[$f] . '" download="'.$r[$f].'">'.$icon['button']['download'].' '.$r[$f].'</a>';

                            if($tableData['preview'] == 'movie')
                                echo '<video src="../system/' . $tableData['system'] . '/public/' . $r[$f] . '" style="max-width: ' . $s_previewMovie . '" controls></video>';

                        }else echo $icon['warning']['empty'];

                    }else echo $r[$f];

                    if($f == 'icon' and $r[$f] != '-')
                        echo ' fa-2x"></i>';

                }

                echo '</td>';

            }

            if(isset($tableData['event'])) {

                echo '<td class="align-middle event">';

                    //Move
                    if(stristr($tableData['event'], 'move')) {

                        $urlArray = explode(',', $tableData['url']);

                        array_pop($urlArray);

                        $urlString = implode(',', $urlArray);

                        if(stristr($tableData['event'], 'move:children-section')) {

                            $db->prepare('select count(section_id) as count from im_section where parent = :id');

                            $parameter = array(
                                array('name' => ':id', 'value' => $r['section_id'], 'type' => 'int')
                            );

                            $db->bind($parameter);

                            $allRecord = $db->run('one');

                        }

                        echo '<a href="' . $urlString . ',' . $currentId . '" class="btn btn-light"><span class="badge badge-light">'.$allRecord->count.'</span> '.$icon['button']['slash'].' ' . $icon['button']['move'] . '</a>';

                    }

                    //Edit
                    if(stristr($tableData['event'], 'edit')) {

                        if(stristr($tableData['event'], ':preview')) {

                            $editIcon = $icon['button']['preview'];

                        }else $editIcon = $icon['button']['edit'];

                        echo '<a href="' . $tableData['url'] . ',edit,' . $currentId . '" class="btn btn-light">' . $editIcon . '</a>';

                    }

                    //Preview (url redirect)
                    if(stristr($tableData['event'], 'url')) {

                        echo '<a href="../'. $r['name_url'].'" class="btn btn-light">' . $icon['button']['preview'] . '</a>';

                    }

                    //Copy
                    if(stristr($tableData['event'], 'copy')) {

                        echo '<a href="#" class="btn btn-light show-next-row" title="' . $countColumn . '">' . $icon['button']['copy'] . '</a>';

                        echo '<div class="im-hide">';

                        echo '<form action="'.$tableData['url'].'" method="post">';

                        if(isset($tableData['copy'])) {

                            foreach ($tableData['copy'] as $i => $c) {

                                echo '<input type="' . $c['type'] . '" name="' . $i . '" value="'.$c['table'].'"> ' . $c['display'] . '<br>';

                            }
                        }

                        echo '<input type="submit" value="'.$translation['button']['copy'].'" class="btn btn-info">';

                        echo '<input type="hidden" name="table" value="'.$table.'">';

                        echo '<input type="hidden" name="id" value="'.$currentId.'">';

                        echo '<input type="hidden" name="event" value="copy"> ';

                        echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

                        echo '</form>';

                        echo '</div>';

                    }

                    //Preview (go to another section in cms)
                    if(stristr($tableData['event'], 'go') and isset($tableData['go'])) {

                        foreach ($tableData['go'] as $go) {

                            echo '<a href="'.$go['url'].','.$currentId.'" class="btn btn-light">' . $go['name'] . '</a>';

                        }

                    }

                    //Delete
                    if(stristr($tableData['event'], 'delete')) {

                        $idRecord = $r;
                        require 'php/script/id-table.php';

                        echo '<a href="#" class="btn btn-light modal-click">' . $icon['button']['delete'] . '</a>';

                        echo '<form action="' . $tableData['url'] . '" method="post">';

                        //All event need table
                        echo '<input type="hidden" name="event_table" value="'.$addition->arrayJson($tableData['table_delete']).'">';

                        //Edit and delete need id (not add)
                        echo '<input type="hidden" name="event_id" value="'.$addition->arrayJson($idTable).'">';

                        //Check if there some restrictions for delete
                        if(isset($tableData['restriction']['delete']))
                            echo '<input type="hidden" name="restriction" value="'.$addition->arrayJson($tableData['restriction']['delete']).'">';

                        //Check if there some content to remove
                        if(isset($tableData['file_delete']))
                            echo '<input type="hidden" name="file_delete" value="' . $tableData['file_delete'].'/'.$r['url'] . '">';

                        echo '<input type="hidden" name="event" value="delete">';

                        echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

                        echo '</form>';

                        if(isset($tableData['table']['system_name'])) {

                            $nameDisplay = 'system_name';

                        }else $nameDisplay = 'name';

                        echo '<div class="im-hide modal-data">'.json_encode(array('text' => $translation['modal']['confirm-delete'].': "'.$r[$nameDisplay].'"', 'save' => 'submit-next-form', 'cancel' => '')).'</div>';

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