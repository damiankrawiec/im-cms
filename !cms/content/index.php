<?php
$sectionPath = '../';
$sectionPathAdmin = '';
require_once 'php/init.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <?php require_once $sectionPath.'section/head.php'; ?>

    <title><?php echo $s_systemName.' - '.$system->getSystemName(); ?></title>

    <?php require_once 'layout/font/init.php'; ?>

    <link rel="stylesheet" href="layout/css/main.css">

</head>
<body>

<?php

//Init setting and $db object
require_once 'php/script/system.php';

echo '<div class="container-fluid">';

    echo '<div class="row bg-dark">';

    echo '<div class="col-6">';

    require_once 'content/box/menu.php';

    echo '</div>';

    echo '<div class="col-6">';

    //Topper (logged)
    require_once 'content/box/top.php';

    echo '</div>';

    echo '</div>';

echo '</div>';

echo '<div class="container-fluid">';



echo '</div>';

echo '<div class="container-fluid">';

//Content
require_once 'content/box/content.php';

echo '</div>';

//Display information about current system to be management
require_once $sectionPathAdmin.'content/box/current-system.php';

require_once $sectionPathAdmin.'content/box/process.php';

require_once $sectionPathAdmin.'content/box/modal.php';

require_once $sectionPath.'section/body.php';

require_once $sectionPathAdmin.'layout/js/js.php';

require_once $sectionPathAdmin.'section/variable.php';

?>
</body>
</html>
