<?php

echo '<a href="#" class="btn btn-secondary m-1 float-right object-move" id="type-property,'.$g_var1.','.$g_var3.'">' . $icon['menu']['type-property'] . ' ' . $translation['menu']['property'] . '</a>';

echo '<a href="#" class="btn btn-secondary m-1 float-right object-move" id="type,edit,'.$g_var1.','.$g_var3 . '">' . $icon['menu']['type'] . ' ' . $translation['menu']['type'] . '</a>';

echo '<a href="#" class="btn btn-secondary m-1 float-right object-move" id="label,edit,'.$labelId.'">' . $icon['menu']['label'] . ' ' . $translation['menu']['label'] . '</a>';

echo '<form action="" method="post" id="object-move">';

    echo '<input type="hidden" name="back" value="'.$addition->getUrl(1).$addition->varUrl().'">';

echo '</form>';

if($tool->getSession('back') != '')
    $tool->setSession('back', 0);