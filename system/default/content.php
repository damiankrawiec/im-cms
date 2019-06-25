<?php
//init require element on the content
require_once 'content/object/object.class.php';

$objectContent = new ObjectContent($this->systemName(), $db);

//Identity of current section
$sectionId = $this->getSection()->id;

?>

<div class="container-fluid">
<?php

    $objectContent->display($sectionId, 'news');

?>
</div>
<br>
<hr>
<br>
<div class="container">
<?php

    $objectContent->display($sectionId, 'company-skill');

?>
</div>