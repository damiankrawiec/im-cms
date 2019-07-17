<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<ul'.$classField.'>';

    foreach ($dataDisplay as $m) {

        echo '<li class="nav-item">';

            $active = '';
            if($m['id'] == $section)
                $active = ' active';

            echo '<a href="'.$m['url'].'" title="'.$m['name'].'" class="nav-link'.$active.'"><i class="fal fa-caret-right"></i> '.$m['name'].'</a>';

        echo '</li>';
    }
    echo '</ul>';

}