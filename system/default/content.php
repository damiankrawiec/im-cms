<?php
//init require element on the content in section (object)
require_once 'content/object/object.class.php';

$systemName = $this->systemName();

//Identity of current section
$sectionId = $this->getSection()->id;

$objectContent = new ObjectContent($systemName, $db);

?>

<div class="container-fluid">
<?php

    $objectContent->display($sectionId, 'slider');

?>
</div>

<br>
<hr>
<br>
<div class="container-fluid">
<?php

    $label = 'news';
    $objectContent->displayCategory($label);

    $objectContent->display($sectionId, $label);

?>
</div>
<br>
<hr>
<br>
<div class="container">
<?php

    $label = 'company-skill';
    $objectContent->displayCategory($label);

    $objectContent->display($sectionId, $label);

?>
</div>
<br>
<hr>
<br>