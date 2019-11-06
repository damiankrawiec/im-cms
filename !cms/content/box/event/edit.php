<?php
if(isset($eventData) and is_array($eventData) and count($eventData) > 0) {

    echo '<div class="window-background">';

    if(isset($eventData['record']->system_name)) {

        $nameDisplay = 'system_name';

    }else $nameDisplay = 'name';

    echo '<h3>'.$nameDisplay = $eventData['record']->$nameDisplay.'</h3>';

    echo '<form method="post" class="edit"'.(isset($eventData['field']['url']) ? 'enctype="multipart/form-data"' : '').'>';

        $editorDisplay = false;
        $fieldSum = count($eventData['field']);
        $fieldCount = 0;
        $fixArray = array();
        foreach($eventData['field'] as $i => $field) {

            $editDataOne = $eventData['record']->$i;

            if($editDataOne == '-')
                $editDataOne = '';

            if(stristr($editDataOne, '"'))
                $editDataOne = htmlentities($editDataOne);

            echo '<div class="form-group">';

                echo '<label for="'.$i.'">'.$field['name'].'</label>';

                if(in_array($table, $s_translationTable))
                    require 'php/script/translation.php';

                $require = '';
                if(isset($field['require']))
                    $require = ' '.$field['require'];

                $readonly = '';
                if(isset($field['readonly']))
                    $readonly = ' readonly';

                if(isset($field['copy']))
                    echo ' <a href="#" class="copy btn btn-light p-1 m-1 pt-2" title="'.$i.':'.$field['copy'].'">'.$icon['button']['copy'].'</a>';


                if($field['type'] == 'text')
                    echo '<input type="text" name="form_'.$i.'" class="form-control'.$require.'" id="'.$i.'" placeholder="'.$translation['edit'][$i].'" value="'.$editDataOne.'"'.$readonly.'>';

                if(stristr($field['type'], 'textarea')) {

                    $editorDisplayNow = '';
                    if(stristr($field['type'], ':editor') and !$editorDisplay) {

                        $editorDisplayNow = ' editor';

                        $editorDisplay = true;
                    }

                    echo '<textarea name="form_' . $i . '" class="form-control'.$require.$editorDisplayNow. '" rows="3" id="' . $i . '" placeholder="' . $translation['edit'][$i] . '">' . $editDataOne . '</textarea>';


                }

                if($field['type'] == 'date') {

                    echo '<input type="text" name="form_' . $i . '" data-language="pl" class="im-datepicker form-control' . $require . '" id="' . $i . '" placeholder="' . $translation['edit'][$i] . '" value="' . $eventData['record']->$i . '">';
                    echo '<input type="hidden" value="'.$eventData['record']->$i.'">';

                }

                if($field['type'] == 'image' or $field['type'] == 'file')
                    require_once 'php/script/files.php';

                require 'php/script/select-event.php';

                if($fieldSum == ($fieldCount + 1)) {

                    require 'php/script/fix-event.php';

                }

            echo '</div>';

            require 'php/script/field-table.php';

            $fieldCount++;

        }

        $idRecord = $eventData['record'];
        require_once 'php/script/id-table.php';

        echo '<input type="hidden" name="event_table" value="'.$addition->arrayJson($fieldTable).'">';

        echo '<input type="hidden" name="event_id" value="'.$addition->arrayJson($idTable).'">';

        echo '<input type="hidden" name="event_collection" value="'.$addition->arrayJson($fixArray).'">';

        echo '<input type="hidden" name="event" value="edit">';

        echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

    echo '</form>';

    if(isset($translationForm)) {

        echo '<form action="" method="post" id="translation-move">';

        echo '<input type="hidden" name="back" value="'.$addition->getUrl(2).$addition->varUrl().'">';
        
        echo '</form>';

    }


    echo '</div>';

    $collectionSubmit = '';
    if(count($fixArray) > 0)
        $collectionSubmit = ' collection-run';

    echo '<div class="button-event">';

        echo '<button class="btn btn-info submit'.$collectionSubmit.' validation-run" id="edit">' . $translation['button']['save'] .'</button>';

        echo '<a class="btn btn-secondary ml-1" href="' . $eventData['url'] . '">' . $translation['button']['cancel'] . '</a>';

    echo '</div>';

}