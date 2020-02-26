<?php

//The same option in add and edit

if(isset($tooltip[$table][$i]))
    echo '<span href="#" data-toggle="tooltip" data-placement="top" title="'.$tooltip[$table][$i].'">'.$icon['button']['question'].'</span>';

$require = '';
if(isset($field['require']))
    $require = ' '.$field['require'];

