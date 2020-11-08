<?php require_once 'php/init.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <?php require_once $sectionPath.'section/head.php'; ?>

    <title><?php echo $s_systemName.' - '.$system->getSystemName(); ?></title>

    <link rel="icon" type="image/png" href="layout/graphic/favicon.png">

    <?php require_once 'layout/font/init.php'; ?>

    <link rel="stylesheet" href="layout/css/main.css">

</head>
<body>

<?php

//---DO NOT REMOVE!!!

//Init setting and $db object
require_once 'php/script/system.php';

//If detect "transaction" then /run
if($p_transaction)
    require_once 'php/run/init.php';

//---DO NOT REMOVE!!!

echo '<div class="container-fluid" id="content-top">';

    echo '<div class="row bg-secondary">';

    echo '<div class="col-6">';

        require_once 'content/box/top.php';

    echo '</div>';

    echo '<div class="col-6 text-right text-white">';

        require_once 'content/box/logged.php';

    echo '</div>';

    echo '</div>';

//History of urls
require_once 'content/box/breadcrumb.php';

    echo '<div class="row bg-dark">';

    echo '<div class="col-12 col-lg-10">';

        require_once 'content/box/menu.php';

    echo '</div>';

    echo '<div class="col-12 col-lg-2">';

        //Select domain system
        require_once 'content/box/select-system.php';

    echo '</div>';

    echo '</div>';

echo '</div>';

echo '<div class="container-fluid animated fadeIn" id="container">';

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
