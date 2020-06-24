<?php

require_once '../php/script/post.php';

if(isset($p_string) and $p_string != '') {

    exit(base64_decode($p_string));

}