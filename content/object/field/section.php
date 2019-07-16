<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<ul'.$classField.'>';
    foreach ($dataDisplay as $m) {

        echo '<li class="list-group-item"><i class="fal fa-caret-right"></i> <a href="'.$m['url'].'" title="'.$m['name'].'">'.$m['name'].'</a></li>';

    }
    echo '</ul>';

}