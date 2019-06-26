<?php
//init require element on the content in section (object)
require_once 'content/object/object.class.php';

$systemName = $this->systemName();

//Identity of current section
$sectionId = $this->getSection()->id;

$objectContent = new ObjectContent($systemName, $db);

//init slider when start section
if($this->currentSection == $this->startSection) {

    require_once 'content/slider/slider.class.php';

    $sliderContent = new SliderContent($systemName, $db);

    echo '<div class="container">';

        $sliderContent->display();

    echo '</div>';

}

?>
<br>
<hr>
<br>
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
<br>
<hr>
<br>