<?php
echo '<ul id="top">';

    echo '<li>'.$icon['link']['preview'].' <a href="../" target="_blank">'.$translation['top']['preview'].'</a></li>';

    echo '<li class="modal-click">'.$icon['top']['clean'].' <a href="#">'.$translation['top']['clean-system'].'</a></li>';

    //Form

    echo '<form action="' . $addition->getUrl() . '" method="post">';

        echo '<input type="hidden" name="event" value="clean">';

        echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

    echo '</form>';

    //---

    echo '<div class="im-hide modal-data">'.json_encode(array('text' => $translation['modal']['confirm-clear'], 'save' => 'submit-next-form', 'cancel' => '')).'</div>';

echo '</ul>';
