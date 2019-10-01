<?php

echo '<div class="row">';

if($g_section !== '') {

    if($tool->fileExists('content/section/'.$g_section.'.php')) {

        $sql = $parameter = null;

        require_once 'content/section/' . $g_section . '.php';

    }else{

        echo '<div class="col-12">';

            echo $addition->message($translation['message']['no-data'], $icon['message']['alert']);

        echo '</div>';

    }

}

echo '</div>';