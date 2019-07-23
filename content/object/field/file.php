<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<ul'.$classField.'>';
    foreach ($dataDisplay as $f) {

        echo '<li class="list-group-item">'.$this->icon['download']['standard'].' <a href="'.$this->systemName.'/public/'.$f['url'].'" title="'.$f['name'].'" download="'.$f['url'].'">'.$f['name'].'</a>';

        if($f['content'] != '')
            echo ' <em>'.$f['content'].'</em>';

        echo '</li>';
    }
    echo '</ul>';

}