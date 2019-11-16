<?php

//init require element on the content in section (object), rest part of section are include
require_once 'content/object/object.class.php';

$object = new ObjectContent($this->systemName(), $db, $this->currentLanguage, $this->admin);

$sectionId = $this->getSection()->id;

$label = $object->getAllLabel();

?>
<div class="im-language">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php $object->displayLanguage(); ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <?php

    //Option:
    //- parent (to section field, show child sections of current section)
    //- begin, end (must be together) - connected 2 or more label group in one row
    //- pagination always with :X on the right (number of objects show on one page of paging)
    //- submenu show section name and his children via dropdown

    ?>

    <?php $object->display($sectionId, $label['menu'], 'submenu'); ?>

    <?php $object->display($sectionId, $label['soon-one-event'], 'begin'); ?>

    <?php $object->display($sectionId, $label['slider'], 'end'); ?>

    <?php $object->display($sectionId, $label['last-events'], 'pagination:1'); ?>

</div>

<div class="im-footer">
    <div class="container-fluid">
        
    </div>
</div>