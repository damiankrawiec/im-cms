<?php

//init require element on the content in section (object), rest part of section are include
require_once 'content/object/object.class.php';

$object = new ObjectContent($this->systemName(), $db, $this->currentLanguage, $this->admin);

$sectionData = $this->getSection();

$label = $object->getAllLabel();

?>

<div class="<?php echo (!isset($sectionData->class) ? 'container' : $sectionData->class) ?>">

    <?php

    //Option:
    //    //- parent (to section field, show child sections of current section)
    //    //- begin, end (must be together) - connected 2 or more label group in one row
    //    //- pagination always with :X on the right (number of objects show on one page of paging)
    //    //- submenu show section name and his children via dropdown
    //    //- scroll insert a scroll tag (animate scrolling)

    ?>

    <?php $object->display($sectionData->id, $label['language']); ?>

    <?php $object->display($sectionData->id, $label['menu']); ?>

    <?php $object->display($sectionData->id, $label['submenu'], 'parent,begin'); ?>

    <?php $object->display($sectionData->id, $label['slider'], 'end'); ?>

    <?php $object->display($sectionData->id, $label['news'], 'begin'); ?>

    <?php $object->display($sectionData->id, $label['company-skill'], 'end,pagination:1,scroll'); ?>

    <?php

    //Static content (when in system is "static" dir, and file is named like current url section) - if both are false static content is not display
    //In static file should be defined class, rows, col, etc. - content fix to rest page box
    //Name of files may only string section - check in foreach(dir) and stristr()
    $object->displayStatic($sectionData->id);

    ?>

</div>

<div class="im-footer">
    <div class="container-fluid">

    </div>
</div>

<?php

if(!isset($session['cookie']))
    $object->display($sectionData->id, $label['cookie']);