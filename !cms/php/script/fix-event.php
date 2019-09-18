<?php

$collectionCount = 0;

while(true) {

    if (isset($eventData['fix-' . $collectionCount])) {

        $sql = 'select ' . $addition->cleanText($eventData['fix-' . $collectionCount]['collection']['table'], 'im_') . '_id as id, name from ' . $eventData['fix-' . $collectionCount]['collection']['table'];

        $db->prepare($sql);

        $collection = $db->run('all');

        $sql = 'select ' . $eventData['fix-' . $collectionCount]['table']['id'] . ' as id from ' . $eventData['fix-' . $collectionCount]['table']['name'] . ' where ' . $eventData['fix-' . $collectionCount]['id']['name'] . ' = ' . $eventData['fix-' . $collectionCount]['id']['value'];

        $db->prepare($sql);

        $idSelected = $db->run('all');

        $idSelectedArray = array(0);

        if ($idSelected) {

            foreach ($idSelected as $is) {

                array_push($idSelectedArray, $is['id']);

            }

        }

        if ($collection) {

            echo '<label for="collection-'.$collectionCount.'" class="collection-label">'.$eventData['fix-' . $collectionCount]['collection']['name'].'</label>';

            echo '<select multiple="multiple" name="" id="collection-' . $collectionCount . '" class="collection" title="' . $translation['fix']['available'] . ':' . $translation['fix']['selected'] . '">';

            $selectedId = '';
            foreach ($collection as $c) {

                $selected = '';
                if (in_array($c['id'], $idSelectedArray)) {
                    $selected = ' selected';
                    $selectedId .= $c['id'].',';
                }

                echo '<option value="' . $c['id'] . '"' . $selected . '>' . $c['name'] . '</option>';

            }

            $selectedId = substr($selectedId, 0, -1);

            echo '</select>';

            echo '<input type="hidden" name="collection_'.$eventData['fix-' . $collectionCount]['table']['id'].'" value="'.$selectedId.'">';

            array_push($fixArray, array('table' => $eventData['fix-' . $collectionCount]['table']['name'], 'one' => $eventData['fix-' . $collectionCount]['id']['name'], 'all' => $eventData['fix-' . $collectionCount]['table']['id']));

        }

    }else break;

    $collectionCount++;

}