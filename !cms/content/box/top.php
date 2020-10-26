<?php

if($tool->getSession('path') == '') {

    $previewUrl = '';

}else $previewUrl = $tool->getSession('path');

echo '<ul id="top">';

echo '<li>' . $icon['link']['preview'] . ' <a href="../'.$previewUrl.'">' . $translation['top']['preview'] . '</a></li>';

if(!$p_event) {

    echo '<li>';

    echo '<div class="modal-click">' . $icon['top']['clean'] . ' <a href="#">' . $translation['top']['clean-system'] . '</a></div>';

    //Form

    echo '<form action="' . $addition->getUrl() . '" method="post">';

    echo '<input type="hidden" name="event" value="clean">';

    echo '<input type="hidden" name="transaction" value="' . $addition->transaction() . '">';

    echo '</form>';

    //---

    //Form data

    echo '<div class="im-hide modal-data">' . json_encode(array('text' => $translation['modal']['confirm-clear'], 'save' => 'submit-next-form', 'cancel' => '')) . '</div>';

    echo '</li>';

    echo '<li>';

    echo '<div class="modal-click">' . $icon['top']['update'] . ' <a href="#">' . $translation['top']['update-system'] . '</a></div>';

    //Form

    echo '<form action="' . $addition->getUrl() . '" method="post">';

    echo '<input type="hidden" name="event" value="update">';

    echo '<input type="hidden" name="transaction" value="' . $addition->transaction() . '">';

    echo '</form>';

    //---

    //Form data

    echo '<div class="im-hide modal-data">' . json_encode(array('text' => $translation['modal']['confirm-update'], 'save' => 'submit-next-form', 'cancel' => '')) . '</div>';

    echo '</li>';

    echo '<li>';

    echo '<div class="modal-click">' . $icon['top']['backup'] . ' <a href="#">' . $translation['top']['backup-system'] . '</a></div>';

    //Form

    echo '<form action="' . $addition->getUrl() . '" method="post">';

    echo '<input type="hidden" name="event" value="backup">';

    echo '<input type="hidden" name="transaction" value="' . $addition->transaction() . '">';

    echo '</form>';

    //---

    //Form data

    echo '<div class="im-hide modal-data">' . json_encode(array('text' => $translation['modal']['confirm-backup'], 'save' => 'submit-next-form', 'cancel' => '')) . '</div>';

    echo '</li>';

    echo '<li>';

    echo '<div class="modal-click">' . $icon['top']['restore'] . ' <a href="#">' . $translation['top']['restore-system'] . '</a></div>';

    //Form

    echo '<form action="' . $addition->getUrl() . '" method="post">';

    echo '<input type="hidden" name="path" value="">';

    echo '<input type="hidden" name="event" value="restore">';

    echo '<input type="hidden" name="transaction" value="' . $addition->transaction() . '">';

    echo '</form>';

    //---

    //Form data

    $htmlSelect = $addition->getFromSource('../config/backup', true);

    echo '<div class="im-hide modal-data">' . json_encode(array('text' => $translation['modal']['confirm-restore'], 'header' => $translation['modal']['header']['select-backup-to-restore'], 'html' => array('select' => $htmlSelect), 'save' => 'submit-next-form', 'cancel' => '')) . '</div>';

    echo '</li>';


    echo '</ul>';

}else{

    echo '<li>'.$translation['top']['event'].'</li>';

}

echo '</ul>';