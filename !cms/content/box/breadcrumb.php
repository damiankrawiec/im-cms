<?php

$breadcrumbArray = array_reverse($tool->getSession('breadcrumb'));

if(is_array($breadcrumbArray) and count($breadcrumbArray) > 0) {

    echo '<div class="clearfix">';
    foreach($breadcrumbArray as $ba) {

        echo '<a href="'.$ba.'" title="'.$ba.'" class="btn btn-default">'.$ba.'</a>';

    }
    echo '</div>';

}