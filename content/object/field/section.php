<?php

if($this->checkDataDisplay($dataDisplay, 'array')) {

    echo '<nav'.$classField.'>';

    foreach ($dataDisplay as $m) {

        echo '<a href="'.$m['url'].'" title="'.$m['name'].'" class="nav-link"><i class="fal fa-caret-right"></i> '.$m['name'].'</a>';

    }
    echo '</nav>';

}