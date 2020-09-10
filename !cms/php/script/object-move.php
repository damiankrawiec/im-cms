<?php

echo '<div id="object-move-box" class="float-right">';

echo '<div class="float-left">';

    echo '<button class="btn btn-secondary m-1 modal-click"> ' . $icon['button']['change'] . ' ' . $translation['button']['change-type'] . '</button>';

    //Form

    echo '<form action="' . $addition->getUrl(2) . '" method="post">';

    echo '<input type="hidden" name="id" value="0">';

    echo '<input type="hidden" name="data" value="'.$g_var3.'">';

    echo '<input type="hidden" name="event" value="change-type">';

    echo '<input type="hidden" name="transaction" value="' . $addition->transaction() . '">';

    echo '</form>';

    //---

    //Form data

    $db->prepare('select type_id as value, name from im_type');

    $allType = $db->run('all');

    echo '<div class="im-hide modal-data">' . json_encode(array('text' => $translation['modal']['change-type'], 'html' => array('select' => $allType), 'save' => 'submit-next-form', 'cancel' => '')) . '</div>';

echo '</div>';

echo '<button class="btn btn-secondary m-1"><a href="#" class="status" id="'.$table.':status:'.$g_var3.'">'.$translation['button']['status'].': '.$icon['status'][$record->status].'</a></button>';

echo '<button class="btn btn-secondary m-1"><a href="#" class="status" id="'.$table.':status_copy:'.$g_var3.'">'.$translation['button']['status-copy'].': '.$icon['status'][$record->status_copy].'</a></button>';

echo '<a href="#" class="btn btn-secondary m-1 object-move" id="type-property,'.$g_var1.','.$g_var3.'">' . $icon['menu']['type-property'] . ' ' . $translation['menu']['property'] . '</a>';

echo '<a href="#" class="btn btn-secondary m-1 object-move" id="type,edit,'.$g_var1.','.$g_var3 . '">' . $icon['menu']['type'] . ' ' . $translation['button']['one']['type'] . '</a>';

echo '<a href="#" class="btn btn-secondary m-1 object-move" id="label,edit,'.$labelId.'">' . $icon['menu']['label'] . ' ' . $translation['button']['one']['label'] . '</a>';

echo '<form action="" method="post" id="object-move">';

    echo '<input type="hidden" name="back" value="'.$addition->getUrl(1).$addition->varUrl().'">';

echo '</form>';

echo '</div>';

if($tool->getSession('back') != '')
    $tool->setSession('back', 0);