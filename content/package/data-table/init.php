<?php

$apiResponsePath = 'content/package/api-response';

$apiResponse = require_once $apiResponsePath.'/init.php';

var_dump($apiResponse);

$dataType = array('nowe', 'suma', 'aktywne');

echo '<table class="table table-hover data-table">';

    foreach ($apiResponse as $api) {

        echo '<tr>';

            echo '<td>'.$api->teryt_terc.' (dzień: '.$api->dzien.')</td>';

        echo '</tr>';

//            foreach ($api->{current($dataType)} as $i => $n) {
//
//                echo '<tr>';
//
//                echo '<td>'.$i.': '.$n.'</td>';
//
//                echo '</tr>';
//
//            }


    }

echo '</table>';