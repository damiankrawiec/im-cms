<?php
if(isset($editData) and is_array($editData) and count($editData) > 0) {

    echo '<div class="window-back">';

    foreach($editData['table'] as $i => $field) {

        echo '<div class="form-group">';

            echo '<label for="exampleInputEmail1">'.$field.'</label>';

            echo '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="'.$editData['record']->$i.'">';

            echo '<small id="emailHelp" class="form-text text-muted"></small>';

        echo '</div>';

    }

    echo '</div>';

    require_once 'content/box/button-event.php';

}