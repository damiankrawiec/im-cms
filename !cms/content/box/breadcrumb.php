<?php

if(is_array(($tool->getSession('breadcrumb'))) and count(($tool->getSession('breadcrumb'))) > 0) {

    $breadcrumbArray = array_reverse($tool->getSession('breadcrumb'));

    echo '<div class="clearfix p-1 text-center">';
    foreach($breadcrumbArray as $ba) {

        echo '<a href="'.$ba.'" title="'.$ba.'" class="btn btn-secondary m-1">'.$ba.'</a>';

    }
    echo '</div>';

}