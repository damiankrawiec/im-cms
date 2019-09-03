<?php

$idTable = array();
if(isset($idRecord)) {

    foreach ($idRecord as $e => $ed) {

        if (stristr($e, 'id')) {

            $idTable[$e] = $ed;

        }

    }

}