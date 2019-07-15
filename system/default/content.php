<?php

//class language is parent to every element in section content
require_once 'php/class/language.class.php';

//init require element on the content in section (object), rest part of section are include
require_once 'content/object/object.class.php';

$object = new ObjectContent($this->systemName(), $db, $session['language']);

?>

<div class="container-fluid">
    <?php

        require_once $this->system.'/content/language.php';

    ?>
</div>

<div class="container">
    <?php

        require_once $this->system.'/content/logo.php';

    ?>
</div>

<div class="container-fluid">
<?php

    $object->display($this->getSection()->id, 'slider');

?>
</div>

<br>
<hr>
<br>
<div class="container-fluid">
<?php

    //show category select in this label of objects
    $object->displayCategory('news');

    //show objects in section of label and filtered by session variable
    $object->display($this->getSection()->id, 'news');

?>
</div>
<br>
<hr>
<br>
<div class="container">
<?php

    $object->displayCategory('company-skill');

    $object->display($this->getSection()->id, 'company-skill');

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