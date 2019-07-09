<?php
//layout content (body structure)
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
    $objectContent->displayCategory('news', $session['news']);

    //show objects in section of label and filtered by session variable
    $objectContent->display($this->getSection()->id, 'news', $session['news']);

?>
</div>
<br>
<hr>
<br>
<div class="container">
<?php

    $objectContent->displayCategory('company-skill', $session['company-skill']);

    $objectContent->display($this->getSection()->id, 'company-skill', $session['company-skill']);

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