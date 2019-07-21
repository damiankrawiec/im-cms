<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<ul'.$classField.'>';

    foreach ($dataDisplay as $m) {

        echo '<li class="nav-item">';

            $active = '';
            if($m['id'] == $section)
                $active = ' active';

            echo '<a href="'.$m['url'].'" title="'.$m['name'].'" class="nav-link'.$active.'">'.$this->ico_empty_triangle_right.' '.$m['name'].'</a>';

        echo '</li>';
    }
    echo '</ul>';

}else{

    echo '<i class="fal fa-exclamation-triangle"></i> '.$this->translationSystem['no-data'];

}