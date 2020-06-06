<?php

$collectionCount = 0;

echo '<div class="fix-box">';

foreach ($eventData as $fix => $ed) {

    if (stristr($fix, 'fix')) {

        $sql = 'select distinct
            t.' . $addition->cleanText($eventData[$fix]['collection']['table'], 'im_') . '_id as id, 
            t.name as name, 
            t.description as description';

        if($eventData[$fix]['collection']['table'] == 'im_image' or $eventData[$fix]['collection']['table'] == 'im_file')
            $sql .= ',t.url as url';

        if($eventData[$fix]['collection']['table'] == 'im_section')
            $sql .= ',t.name_url as name_url';

        $sql .= ' from ' . $eventData[$fix]['collection']['table'] . ' t';

        $sqlRest = $sql;

        $sql .= ' left outer join ' . $eventData[$fix]['table']['name'] . ' tj on (tj.'.$eventData[$fix]['table']['id'].' = t.' . $addition->cleanText($eventData[$fix]['collection']['table'], 'im_') . '_id)';

        if(isset($eventData[$fix]['collection']['where']))
            $sql .= ' where '.$eventData[$fix]['collection']['where'];

        if(isset($eventData[$fix]['table']['sort'])) {

            $sql .= $addition->whereOrAnd($sql);

            $sql .= ' tj.' . $eventData[$fix]['id']['name'].' = '.$eventData[$fix]['id']['value'];

            $sql .= ' order by tj.' . $eventData[$fix]['table']['sort'];

        }

        $db->prepare($sql);

        $collection = $db->run('all');

        if(isset($eventData[$fix]['table']['sort']) and $collection) {

            $selectedIdArray = array(0);
            foreach ($collection as $cRest) {

                array_push($selectedIdArray, $cRest['id']);

            }

            $selectedIdString = implode(',', $selectedIdArray);

            $sqlRest .= ' where t.' . $addition->cleanText($eventData[$fix]['collection']['table'], 'im_') . '_id not in ('.$selectedIdString.')';

            $db->prepare($sqlRest);

            $collectionRest = $db->run('all');

            if($collectionRest) {

                $collection = array_merge($collection, $collectionRest);

            }

        }

        if(!$collection) {

            if(isset($eventData[$fix]['collection']['where'])) {

                $sqlRest .= $addition->whereOrAnd($sqlRest);

                $sqlRest .= ' '.$eventData[$fix]['collection']['where'];

            }

            $db->prepare($sqlRest);

            $collection = $db->run('all');

        }

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

            echo '<label for="collection-'.$collectionCount.'" class="collection-label font-weight-bold">'.$eventData[$fix]['collection']['name'].'</label>';

            $classOrder = '';
            if(isset($eventData[$fix]['table']['sort']))
                $classOrder = ' order';

            $selectClass = '';
            if($eventData[$fix]['collection']['table'] == 'im_image')
                $selectClass = ' fix-image';

            if($eventData[$fix]['collection']['table'] == 'im_file')
                $selectClass = ' fix-file';

            echo '<select multiple="multiple" name="" id="collection-' . $collectionCount . '" class="collection'.$classOrder.''.$selectClass.'" title="' . $translation['fix']['available'] . ':' . $translation['fix']['selected'] . '">';

            $selectedId = '';
            foreach ($collection as $c) {

                $selected = '';
                if (in_array($c['id'], $idSelectedArray)) {
                    $selected = ' selected';
                    $selectedId .= $c['id'].',';
                }

                echo '<option value="' . $c['id'] . '"' . $selected . '>';

                echo $c['name'] .$addition->cutDescription($c['description'], 30);

                if($eventData[$fix]['collection']['table'] == 'im_image' or $eventData[$fix]['collection']['table'] == 'im_file')
                    echo ': '.$c['url'].'';

                if($eventData[$fix]['collection']['table'] == 'im_section')
                    echo ': '.$c['name_url'].'';

                echo '</option>';

            }

            $selectedId = substr($selectedId, 0, -1);

            echo '</select>';

            echo '<input type="hidden" name="collection_'.$eventData[$fix]['table']['id'].'" value="'.$selectedId.'">';

            $fixArrayOne = array('table' => $eventData[$fix]['table']['name'], 'one' => $eventData[$fix]['id']['name'], 'all' => $eventData[$fix]['table']['id']);

            if(isset($eventData[$fix]['table']['sort']))
                $fixArrayOne['sort'] = $eventData[$fix]['table']['sort'];

            array_push($fixArray, $fixArrayOne);

        }

    }

    $collectionCount++;

}

echo '</div>';