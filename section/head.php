<meta charset="UTF-8">
<title><?php echo $system->getSection()->name; ?></title>
<link rel="stylesheet" href="app/composer/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="module/fontawesome/css/all.min.css">
<?php
if($url == $s_startSection) {

    echo '<link rel="stylesheet" href="module/pgwslider/pgwslider.min.css">';

}