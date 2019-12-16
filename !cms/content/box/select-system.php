<?php

//In edit status hide possibility to change domain system

if($system->getAllSystem()) {

    $allSystem = $system->getAllSystem();

    echo '<div id="select-system">';

        echo '<select class="select wide modal-change">';

            foreach ($allSystem as $as) {

                $selected = '';
                if($as == $system->getSystemName())
                    $selected = ' selected';

                echo '<option value="'.$as.'"'.$selected.'>'.$as.'</option>';

            }

        echo '</select>';

        echo '<div class="im-hide modal-data">'.json_encode(array('text' => $translation['modal']['not-save'], 'save' => 'submit-form-with-set-value', 'cancel' => 'this-option-reset')).'</div>';

        echo '<form action="'.$addition->getUrl().'" method="post" class="im-hide modal-form"><input type="hidden" name="current_system"></form>';

    echo '</div>';

}