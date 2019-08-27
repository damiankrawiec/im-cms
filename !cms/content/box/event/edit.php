<?php
if(isset($editData) and is_array($editData) and count($editData) > 0) {

    echo '<div class="window-background">';

    foreach($editData['table'] as $i => $field) {

        $editDataOne = $editData['record']->$i;

        if($editDataOne == '-')
            $editDataOne = '';

        echo '<div class="form-group">';

            echo '<label for="'.$i.'">'.$field['name'].'</label>';

            if($field['type'] == 'text')
                echo '<input type="text" class="form-control" id="'.$i.'" placeholder="'.$translation['edit'][$i].'" value="'.$editDataOne.'">';

            if($field['type'] == 'textarea')
                echo '<textarea class="form-control" rows="3" id="' . $i . '" placeholder="' . $translation['edit'][$i] . '">'.$editDataOne.'</textarea>';

        echo '</div>';

    }

    echo '</div>';

    require_once 'content/box/button-event.php';

}