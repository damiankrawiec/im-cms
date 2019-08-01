<?php

//init require element on the content in section (object), rest part of section are include
require_once 'content/object/object.class.php';

$object = new ObjectContent($this->systemName(), $db, $session['language']);

?>
<div class="container-fluid">

    <?php require_once $this->system.'/content/language.php'; ?>

    <?php require_once $this->system.'/content/logo.php'; ?>

</div>

<div class="container-fluid">

    <?php

    //Option:
    //- parent (to section field, show child sections of current section)
    //- begin, end (must be together) - connected 2 or more label group in one row
    //- pagination always with :X on the right (number of objects show on one page of paging)
    //- submenu show section name and his children via dropdown

    ?>

    <?php $object->display($this->getSection()->id, 'menu','submenu'); ?>

    <?php $object->display($this->getSection()->id, 'submenu', 'parent,begin'); ?>

    <?php $object->display($this->getSection()->id, 'slider', 'end'); ?>

    <?php $object->display($this->getSection()->id, 'news', 'begin,pagination:1'); ?>

    <?php $object->display($this->getSection()->id, 'company-skill', 'end,pagination:2'); ?>

</div>

<div class="container-fluid">

    <?php require_once $this->system.'/content/footer.php'; ?>

</div>