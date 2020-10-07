<?php require_once 'php/init.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <?php require_once 'section/head.php'; ?>

    <?php require_once 'section/title.php'; ?>

    <?php $system->getHead(); ?>

    <?php require_once 'section/favicon.php'; ?>

    <?php require_once 'section/font.php'; ?>

</head>
<body>

    <?php require_once 'section/loading-page.php'; ?>

    <?php $data = $system->getContent($db, $sessionVariable); ?>

    <?php require_once 'section/body.php'; ?>

    <?php $system->getBody(); ?>

    <?php require_once 'section/popup.php'; ?>

    <?php require_once 'section/variable.php'; ?>

    <?php require_once 'section/map.php'; ?>

</body>
</html>