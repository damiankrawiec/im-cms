<?php require_once 'php/init.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <?php require_once $sectionPath . 'section/head.php'; ?>

    <title>IM-CMS - Autoryzacja</title>

    <?php require_once 'layout/font/init.php'; ?>

    <link rel="stylesheet" href="layout/css/main.css">

</head>
<body>
<div id="background">
    <div class="container">
        <div class="row window-back">
            <div class="col-12 col-lg-8">
                <div class="login-left">
                <div id="auth-header">Autoryzacja</div>
                    <form>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-at"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-lock-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Password">
                            </div>
                        </div>

                        <button type="button" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
            <div class="d-none d-lg-block d-xl-block col-lg-4" id="login-right">
                <div class="login-right">
                    <img src="layout/graphic/auth.png">
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once $sectionPath . 'section/process.php'; ?>

<?php require_once $sectionPath . 'section/body.php'; ?>

</body>
</html>