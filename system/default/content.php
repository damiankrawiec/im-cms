<?php
//layout content (body structure)

//Grab all session variables (e.g. to filtered), all variables must set in label array
$sessionArray = $session->getSession();

//init require element on the content in section (object), rest part of section are include
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

    //show category select in this label of objects
    $objectContent->displayCategory('news', $sessionArray['news']);

    //show objects in section of label and filtered by session variable
    $objectContent->display($this->getSection()->id, 'news', $sessionArray['news']);

?>
</div>
<br>
<hr>
<br>
<div class="container">
<?php

    $objectContent->displayCategory('company-skill', $sessionArray['company-skill']);

    $objectContent->display($this->getSection()->id, 'company-skill', $sessionArray['company-skill']);

?>
</div>
<br>
<hr>
<br>
<div class="container-fluid">
    <?php

        require_once $this->system.'/content/footer.php';

    ?>
</div>