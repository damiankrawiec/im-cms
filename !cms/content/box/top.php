<?php
echo '<ul id="top">';

    echo '<li>'.$icon['link']['preview'].' <a href="../" target="_blank">'.$translation['top']['preview'].'</a></li>';

    echo '<li>';

        echo '<div class="modal-click">'.$icon['top']['clean'].' <a href="#">'.$translation['top']['clean-system'].'</a></div>';

        //Form

        echo '<form action="' . $addition->getUrl() . '" method="post">';

            echo '<input type="hidden" name="event" value="clean">';

            echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

        echo '</form>';

        //---

        //Form data

        echo '<div class="im-hide modal-data">'.json_encode(array('text' => $translation['modal']['confirm-clear'], 'save' => 'submit-next-form', 'cancel' => '')).'</div>';

    echo '</li>';

    echo '<li>';

        echo '<div class="modal-click">'.$icon['top']['update'].' <a href="#">'.$translation['top']['update-system'].'</a></div>';

        //Form

        echo '<form action="' . $addition->getUrl() . '" method="post">';

        echo '<input type="hidden" name="event" value="update">';

        echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

        echo '</form>';

        //---

        //Form data

        echo '<div class="im-hide modal-data">'.json_encode(array('text' => $translation['modal']['confirm-update'], 'save' => 'submit-next-form', 'cancel' => '')).'</div>';

    echo '</li>';

    echo '<li>';

        echo '<div class="modal-click">'.$icon['top']['backup'].' <a href="#">'.$translation['top']['backup-system'].'</a></div>';

        //Form

        echo '<form action="' . $addition->getUrl() . '" method="post">';

        echo '<input type="hidden" name="event" value="backup">';

        echo '<input type="hidden" name="transaction" value="'.$addition->transaction().'">';

        echo '</form>';

        //---

        //Form data

        echo '<div class="im-hide modal-data">'.json_encode(array('text' => $translation['modal']['confirm-backup'], 'save' => 'submit-next-form', 'cancel' => '')).'</div>';

    echo '</li>';



echo '</ul>';
