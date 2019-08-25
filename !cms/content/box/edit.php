<?php
if(isset($editData) and is_array($editData) and count($editData) > 0) {

    var_dump($editData);

    echo '<a href="' . $addition->getUrl(2) . '">' . $translation['button']['cancel'] . '</a>';

}