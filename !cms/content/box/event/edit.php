<?php
if(isset($eventData) and is_array($eventData) and count($eventData) > 0) {

    echo '<div class="window-background">';

    echo '<h3>'.$eventData['record']->name.'</h3>';

    echo '<form method="post" class="edit">';

        $editorDisplay = false;
        foreach($eventData['field'] as $i => $field) {

            $editDataOne = $eventData['record']->$i;

            if($editDataOne == '-')
                $editDataOne = '';

            echo '<div class="form-group">';

                echo '<label for="'.$i.'">'.$field['name'].'</label>';

                $require = '';
                if(isset($field['require']))
                    $require = ' '.$field['require'];

                if($field['type'] == 'text')
                    echo '<input type="text" name="form_'.$i.'" class="form-control'.$require.'" id="'.$i.'" placeholder="'.$translation['edit'][$i].'" value="'.$editDataOne.'">';

                if(stristr($field['type'], 'textarea')) {

                    $editorDisplayNow = '';
                    if(stristr($field['type'], ':editor') and !$editorDisplay) {

                        $editorDisplayNow = ' editor';

                        $editorDisplay = true;
                    }

                    echo '<textarea name="form_' . $i . '" class="form-control' .$editorDisplayNow. '" rows="3" id="' . $i . '" placeholder="' . $translation['edit'][$i] . '">' . $editDataOne . '</textarea>';


                }
                if($field['type'] == 'date') {

                    echo '<input type="text" name="form_' . $i . '" data-language="pl" class="im-datepicker form-control' . $require . '" id="' . $i . '" placeholder="' . $translation['edit'][$i] . '" value="' . $eventData['record']->$i . '">';
                    echo '<input type="hidden" value="'.$eventData['record']->$i.'">';

                }

                require 'php/script/select-event.php';

            echo '</div>';

            require 'php/script/field-table.php';

        }

        $idRecord = $eventData['record'];
        require_once 'php/script/id-table.php';

        echo '<input type="hidden" name="event_table" value="'.$addition->arrayJson($fieldTable).'">';

        echo '<input type="hidden" name="event_id" value="'.$addition->arrayJson($idTable).'">';

        echo '<input type="hidden" name="event" value="edit">';

        echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

    echo '</form>';

    echo '</div>';

    echo '<div class="button-event">';

        echo '<a class="btn btn-outline-dark" href="' . $eventData['url'] . '">' . $translation['button']['cancel'] . '</a>';

        echo '<button class="btn btn-outline-warning submit validation-run" id="edit">' . $translation['button']['save'] .'</button>';

    echo '</div>';

}