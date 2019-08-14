<?php

//In edit status hide possibility to change domain system

if($system->getAllSystem()) {

    $allSystem = $system->getAllSystem();

    echo '<div id="select-system">';

        echo '<select class="select wide">';

            foreach ($allSystem as $as) {

                $selected = '';
                if($as == $system->getSystemName())
                    $selected = ' selected';

                echo '<option value="'.$as.'"'.$selected.'>'.$as.'</option>';

            }

        echo '</select>';

        echo '<div class="im-hide modal-data">'.json_encode(array('text' => $translation['modal']['not-save'], 'save' => 'link-this-val', 'cancel' => 'this-option-reset')).'</div>';

    echo '</div>';

}