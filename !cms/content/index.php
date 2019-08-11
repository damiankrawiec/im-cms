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

//Main content
echo '<div class="container-fluid">';

//Topper (logged)
require_once 'content/section/top.php';

echo '</div>';

//Display information about current system to be management
require_once $sectionPathAdmin.'content/section/current-system.php';

require_once $sectionPathAdmin.'content/section/process.php';

require_once $sectionPathAdmin.'content/section/modal.php';

require_once $sectionPath.'section/body.php';

require_once $sectionPathAdmin.'layout/js/js.php';

require_once $sectionPathAdmin.'section/variable.php';

?>
</body>
</html>
