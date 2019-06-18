<?php
//init require element on the content
require_once 'content/object/object.class.php';

$objectContent = new ObjectContent($db);
?>

<div class="container-fluid">
<?php

    $parameter = array(
        array('name' => ':section', 'value' => $this->getSection()->id, 'type' => 'int'),
        array('name' => ':label', 'value' => 'news', 'type' => 'string')
    );

    $object = $objectContent->getObject($parameter);

    var_dump($object);

    echo '---';

    $parameter = array(
        array('name' => ':section', 'value' => $this->getSection()->id, 'type' => 'int'),
        array('name' => ':label', 'value' => 'company-skill', 'type' => 'string')
    );

    $object = $objectContent->getObject($parameter);

    var_dump($object);

?>
</div>