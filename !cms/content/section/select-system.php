<?php

//In edit status hide possibility to change domain system

if($system->getAllSystem()) {

    $allSystem = $system->getAllSystem();

    echo '<div id="select-system">';

        echo '<select class="form-control">';

            foreach ($allSystem as $as) {

                $selected = '';
                if($as == $system->getSystemName())
                    $selected = ' selected';

                echo '<option value="'.$as.'"'.$selected.'>'.$as.'</option>';

            }

        echo '</select>';

    echo '</div>';

}