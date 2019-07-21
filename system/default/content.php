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

    <?php $object->display($this->getSection()->id, 'menu'); ?>

    <?php $object->display($this->getSection()->id, 'submenu', 'parent, begin'); ?>

    <?php $object->display($this->getSection()->id, 'slider', 'end'); ?>

    <?php $object->display($this->getSection()->id, 'news', 'begin'); ?>

    <?php $object->display($this->getSection()->id, 'company-skill', 'end'); ?>

</div>

<div class="container-fluid">

    <?php require_once $this->system.'/content/footer.php'; ?>

</div>