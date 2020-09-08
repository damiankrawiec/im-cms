<?php

if($p_path) {

    echo '<div id="restore">';

    echo '<div><strong>' . $translation['message']['restore-data'] . ':</strong><span>' . $icon['process']['standard'] . '</span></div>';

    echo '<input type="hidden" value="'.$p_path.'">';

    echo '</div>';

    $alert1 = $translation['message']['restore-progress'];

}else{

    $alert0 = $translation['message']['no-data'];

}