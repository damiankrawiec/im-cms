<?php

require_once '../php/script/post.php';

if(isset($_FILES['file']) and $p_systemName) {

    $file = $_FILES['file'];

    require_once '../php/class/addition.class.php';

    $addition = new Addition();

    $permitted = 'doc, docx, pdf';

    $fileName = $addition->setFileName($file['name'], $permitted);

    $addition->addFile($file['tmp_name'], $p_systemName.'/'.$fileName);

    exit($fileName);

}