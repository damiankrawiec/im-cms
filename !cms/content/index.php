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

require_once 'php/script/system.php';

echo '<div class="window-back-admin">';

    echo '<div class="container-fluid">';

        echo '<div class="row">';

        echo 'Bieżący system: '.$system->getSystemName();

        echo '<h1>Zalogowany</h1>';

        $sectionPath = '../';

        echo $tool->getSession('admin')['email'];
        echo '<img src="layout/graphic/admin/'.$tool->getSession('admin')['image'].'">';
        echo '<a href="'.$g_system.',logout">'.$translation['login']['end'].'</a>';

        echo '</div>';

    echo '</div>';

echo '</div>';

require_once $sectionPath.'section/body.php';

require_once $sectionPathAdmin.'layout/js/js.php';

require_once $sectionPathAdmin.'section/variable.php';

?>
</body>
</html>
