<?php

if(!isset($fieldTable))
    $fieldTable = array();

if(!isset($fieldTable[$field['table']]))
    $fieldTable[$field['table']] = array();

array_push($fieldTable[$field['table']], $i);