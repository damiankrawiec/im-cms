<?php
$sectionPath = '../../';
$sectionPathAdmin = '../';
require_once '../php/init.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <?php require_once $sectionPath.'section/head.php'; ?>

    <title><?php echo $s_systemName.' - '.$translation['authorization']['singular']; ?></title>

    <?php require_once '../layout/font/init.php'; ?>

    <link rel="stylesheet" href="../layout/css/main.css">

</head>
<body>
<div id="background">
    <div class="container">
        <div class="row window-back">
            <div class="col-12 col-lg-8">
                <div class="login-left">
                    <div><?php echo $icon['security']['header']; ?></div>
                <div id="auth-header"><?php echo $translation['authorization']['singular']; ?></div>
                    <form class="auth">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><?php echo $icon['email']['at'] ?></div>
                                </div>
                                <input type="text" class="form-control validation :email" id="inlineFormInputGroup" placeholder="<?php echo $translation['email']['imperatives']; ?>">
                                <span class="im-hide"><?php echo $icon['warning']['triangle']; ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><?php echo $icon['security']['password']; ?></div>
                                </div>
                                <input type="text" class="form-control validation :password" id="inlineFormInputGroup" placeholder="<?php echo $translation['password']['imperatives']; ?>">
                                <span class="im-hide"><?php echo $icon['warning']['triangle']; ?></span>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-dark submit" id="auth"><?php echo $translation['login']['imperatives']; ?> <?php echo $icon['login']['standard'] ?></button>
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

<?php require_once $sectionPath.'section/process.php'; ?>

<?php require_once $sectionPath.'section/body.php'; ?>

<?php require_once $sectionPathAdmin.'layout/js/js.php'; ?>

</body>
</html>