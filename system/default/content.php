<?php
//layout content (body structure)
//init require element on the content in section (object)
require_once 'content/object/object.class.php';

$objectContent = new ObjectContent($this->systemName(), $db);

?>

<div class="container">
    <?php

        require_once $this->system.'/content/logo.php';

    ?>
</div>

<div class="container-fluid">
<?php

    $objectContent->display($this->getSection()->id, 'slider');

?>
</div>

<br>
<hr>
<br>
<div class="container-fluid">
<?php

    $objectContent->displayCategory('news');

    $category = false;
    if(isset($_SESSION['news']))
        $category = $_SESSION['news'];

    $objectContent->display($this->getSection()->id, 'news', $category);

?>
</div>
<br>
<hr>
<br>
<div class="container">
<?php

    $objectContent->displayCategory('company-skill');

    $category = false;
    if(isset($_SESSION['company-skill']))
        $category = $_SESSION['company-skill'];

    $objectContent->display($this->getSection()->id, 'company-skill', $category);

?>
</div>
<br>
<hr>
<br>