<?php
//init require element on the content
require_once 'content/object/object.class.php';

$objectContent = new ObjectContent($db);
?>

<div class="container-fluid">
<?php

    $parameter = array(
        array('name' => ':id', 'value' => $section->id, 'type' => 'int')
    );

$objectContent->getObject($parameter);

?>
</div>