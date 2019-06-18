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

    $objectNews = $objectContent->getObject($parameter);

    foreach($objectNews as $o) {

        $class = $objectContent->getTypeClass($o['type'])->class;

        if($class != '')
            $class = 'class="'.$class.'"';

        echo '<div'.$class.'>';

            echo $o['name'].'<br>';

            $property = $objectContent->getPropertyFromType($o['type']);

            $objectContent->displayProperty($property);

        echo '</div>';

    }

    echo '<br>---<br>';

    $parameter = array(
        array('name' => ':section', 'value' => $this->getSection()->id, 'type' => 'int'),
        array('name' => ':label', 'value' => 'company-skill', 'type' => 'string')
    );

    $objectCompanySkill = $objectContent->getObject($parameter);

    foreach($objectCompanySkill as $o) {

        $class = $objectContent->getTypeClass($o['type'])->class;

        if($class != '')
            $class = ' class="'.$class.'"';

        echo '<div'.$class.'>';

            echo $o['name'].'<br>';

            $property = $objectContent->getPropertyFromType($o['type']);

            $objectContent->displayProperty($property);

        echo '</div>';

    }

?>
</div>