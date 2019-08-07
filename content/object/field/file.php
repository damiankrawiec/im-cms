<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<ul'.$classField.'>';
    foreach ($dataDisplay as $f) {

        echo '<li class="list-group-item">'.$this->icon['download']['standard'].' <a href="'.$this->systemName.'/public/'.$f['url'].'" title="'.$f['name'].'" download="'.$f['url'].'">'.$this->translationMark('im_file-name-'.$f['id'], $f['name']).'</a>';

        if($f['content'] != '')
            echo ' <em>'.$this->translationMark('im_file-content-'.$f['id'], $f['content']).'</em>';

        echo '</li>';
    }
    echo '</ul>';

}