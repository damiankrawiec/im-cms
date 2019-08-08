<?php

echo '<div class="row">';

    echo '<div class="col-12 col-md-6 text-left">';

    echo '<img src="layout/graphic/admin/'.$tool->getSession('admin')['image'].'" >';

    echo '</div>';

    echo '<div class="col-12 col-md-6 text-right">';

    echo $translation['login']['logged'].': '.$tool->getSession('admin')['email'].', <a href="'.$g_system.',logout">'.$icon['login']['end'].'</a>';

    echo '</div>';

echo '</div>';