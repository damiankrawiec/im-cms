<?php

require_once 'php/class/session.class.php';

require_once 'php/class/language.class.php';

//init require element on the content in section (object), rest part of section are include
require_once 'content/object/object.class.php';

$session = new Session();

//Labeled all "session" variables and get session variables in array
require_once 'php/script/session.php';

$objectContent = new ObjectContent($this->systemName(), $db, $sessionVariables['language']);

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

    $objectContent->display($this->getSection()->id, 'slider');

?>
</div>

<br>
<hr>
<br>
<div class="container-fluid">
<?php

    //show category select in this label of objects
    $objectContent->displayCategory('news', $sessionVariables['news']);

    //show objects in section of label and filtered by session variable
    $objectContent->display($this->getSection()->id, 'news', $sessionVariables['news']);

?>
</div>
<br>
<hr>
<br>
<div class="container">
<?php

    $objectContent->displayCategory('company-skill', $sessionVariables['company-skill']);

    $objectContent->display($this->getSection()->id, 'company-skill', $sessionVariables['company-skill']);

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