<?php

require_once '../php/script/post.php';

require_once '../php/class/addition.class.php';

$addition = new Addition();

$minHeadBody = true;
$hashPage = true;//section with sha1 encoding (input type password)
$sectionPath = '../../';
$sectionPathAdmin = '../';
require_once '../php/init.php';
require_once 'validation/init.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <?php require_once $sectionPath.'section/head.php'; ?>

    <title><?php echo $s_systemName.' - '.$translation['authorization']['singular']; ?></title>

    <link rel="icon" type="image/png" href="../layout/graphic/favicon.png">

    <?php require_once '../layout/font/init.php'; ?>

    <link rel="stylesheet" href="../layout/css/auth/main.css">

</head>
<body>
<div id="background">
    <div class="container">
        <div class="row window-back">
            <div class="col-12 col-lg-8">
                <div class="login-left">
                    <div><?php echo $icon['security']['header']; ?></div>
                    <div id="auth-header"><?php echo $translation['authorization']['singular']; ?></div>
                    <form method="post" class="auth">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><?php echo $icon['email']['at'] ?></div>
                                </div>
                                <input type="text" class="form-control validation :email" placeholder="<?php echo $translation['email']['imperatives']; ?>" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><?php echo $icon['security']['password']; ?></div>
                                </div>
                                <input type="password" class="form-control validation :password" placeholder="<?php echo $translation['password']['imperatives']; ?>">
                            </div>
                        </div>
                        <input type="hidden" name="password">
                    </form>
                    <?php
                    if(isset($run) and !$run->getRun())
                        echo $addition->message($translation['authorization']['fail'], $icon['message']['alert']);
                    ?>
                    <button class="btn btn-secondary submit validation-run" id="auth"><?php echo $translation['login']['imperatives']; ?></button>
                </div>
            </div>
            <div class="d-none d-lg-block d-xl-block col-lg-4" id="login-right">
                <div class="login-right">
                    <img src="../layout/graphic/auth.png">
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once $sectionPathAdmin.'content/box/process.php'; ?>

<?php require_once $sectionPath.'section/body.php'; ?>

<?php require_once $sectionPathAdmin.'layout/js/js.php'; ?>

<?php require_once $sectionPathAdmin.'section/variable.php'; ?>

</body>
</html>