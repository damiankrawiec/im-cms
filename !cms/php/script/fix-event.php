<?php

$collectionCount = 0;

foreach ($eventData as $fix => $ed) {

    if (stristr($fix, 'fix')) {

        $sql = 'select ' . $addition->cleanText($eventData[$fix]['collection']['table'], 'im_') . '_id as id, name, description from ' . $eventData[$fix]['collection']['table'];

        $db->prepare($sql);

        $collection = $db->run('all');

        $sql = 'select ' . $eventData[$fix]['table']['id'] . ' as id from ' . $eventData[$fix]['table']['name'] . ' where ' . $eventData[$fix]['id']['name'] . ' = ' . $eventData[$fix]['id']['value'];

        $db->prepare($sql);

        $idSelected = $db->run('all');

        $idSelectedArray = array(0);

        if ($idSelected) {

            foreach ($idSelected as $is) {

                array_push($idSelectedArray, $is['id']);

            }

        }

        if ($collection) {

            echo '<label for="collection-'.$collectionCount.'" class="collection-label">'.$eventData[$fix]['collection']['name'].'</label>';

            echo '<select multiple="multiple" name="" id="collection-' . $collectionCount . '" class="collection" title="' . $translation['fix']['available'] . ':' . $translation['fix']['selected'] . '">';

            $selectedId = '';
            foreach ($collection as $c) {

                $selected = '';
                if (in_array($c['id'], $idSelectedArray)) {
                    $selected = ' selected';
                    $selectedId .= $c['id'].',';
                }

                $description = '';
                if($c['description'] != '') {

                    $lengthAllow = 30;
                    if(strlen($c['description']) > $lengthAllow) {

                        $description = ' ('.substr($c['description'], 0, $lengthAllow).'...)';

                    }else{

                        $description = ' ('.$c['description'].')';

                    }

                }

                echo '<option value="' . $c['id'] . '"' . $selected . '>' . $c['name'] .$description.'</option>';

            }

            $selectedId = substr($selectedId, 0, -1);

            echo '</select>';

            echo '<input type="hidden" name="collection_'.$eventData[$fix]['table']['id'].'" value="'.$selectedId.'">';

            array_push($fixArray, array('table' => $eventData[$fix]['table']['name'], 'one' => $eventData[$fix]['id']['name'], 'all' => $eventData[$fix]['table']['id']));

        }

    }

    $collectionCount++;

}