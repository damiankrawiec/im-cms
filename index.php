<?php require_once 'php/init.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <?php require_once 'section/head.php'; ?>

    <?php $system->getHead(); ?>

</head>
<body>

    <?php $system->getContent(); ?>

    <?php require_once 'section/body.php'; ?>

    <?php $system->getBody(); ?>

</body>
</html>