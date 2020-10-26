<?php

echo '<div id="section-move-box" class="float-right">';

echo '<div class="float-left">';

    echo '<button class="btn btn-secondary m-1 modal-click"> ' . $icon['button']['change'] . ' ' . $translation['button']['change-parent'] . '</button>';

    //Form

    echo '<form action="' . $addition->getUrl(2) . '" method="post">';

    echo '<input type="hidden" name="id" value="0">';

    echo '<input type="hidden" name="data" value="'.$g_var3.'">';

    echo '<input type="hidden" name="event" value="change-parent">';

    echo '<input type="hidden" name="transaction" value="' . $addition->transaction() . '">';

    echo '</form>';

    //---

    //Form data

    $db->prepare('select section_id as value, concat(name, " (", name_url, ")") as name from im_section where section_id <> :current');

    $parameter = array(
        array('name' => ':current', 'value' => $g_var3, 'type' => 'int')
    );

    $db->bind($parameter);

    $allSection = $db->run('all');

    echo '<div class="im-hide modal-data">' . json_encode(array('text' => $translation['modal']['change-parent'], 'header' => $translation['modal']['header']['set-section-as-main-or-choose-parent'], 'html' => array('select' => $allSection), 'save' => 'submit-next-form', 'cancel' => '')) . '</div>';

echo '</div>';

echo '</div>';

if($tool->getSession('back') != '')
    $tool->setSession('back', 0);