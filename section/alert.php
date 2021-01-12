<?php

if(isset($alert0)) {

    if(isset($data['translation']['system'][$alert0]))
        echo $addition->alert0($data['translation']['system'][$alert0], $data['icon']['message']['fail']);

}

if(isset($alert1)) {

    if(isset($data['translation']['system'][$alert1]))
        echo $addition->alert1($data['translation']['system'][$alert1], $data['icon']['message']['success']);

}