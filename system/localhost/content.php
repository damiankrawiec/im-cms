<?php

//init require element on the content in section (object), rest part of section are include
require_once 'content/object/object.class.php';

$object = new ObjectContent($this->systemName(), $db, $this->currentLanguage, $this->admin);

$sectionData = $this->getSection();

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

<div class="<?php echo (!isset($sectionData->class) ? 'container' : $sectionData->class) ?>">

    <?php

    //Option:
    //- parent (to section field, show child sections of current section)
    //- begin, end (must be together) - connected 2 or more label group in one row
    //- pagination always with :X on the right (number of objects show on one page of paging)
    //- submenu show section name and his children via dropdown
    //- scroll insert a scroll tag (animate scrolling)

    ?>

    <?php $object->display($sectionData->id, $label['menu'], 'submenu'); ?>

    <?php $object->display($sectionData->id, $label['soon-one-event'], 'begin'); ?>

    <?php $object->display($sectionData->id, $label['slider'], 'end'); ?>

    <?php $object->display($sectionData->id, $label['last-events'], 'pagination:1,scroll'); ?>

</div>

<div class="im-footer">
    <div class="container-fluid">
        
    </div>
</div>