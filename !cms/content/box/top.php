<?php

echo '<div class="row">';

    echo '<div class="col-12 col-sm-6 text-right text-white">';

        echo $translation['login']['logged'].': ';

        echo $tool->getSession('admin')['email'];

        echo ', <a href="'.$g_system.',logout" class="text-warning">'.$icon['login']['end'].'</a>';

    echo '</div>';

echo '<div class="col-12 col-sm-6">';

require_once 'content/box/select-system.php';

echo '</div>';

echo '</div>';