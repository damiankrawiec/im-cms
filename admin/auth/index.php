<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IM-CMS</title>
    <link rel="stylesheet" href="../../app/composer/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../module/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../module/lightcase/css/lightcase.css">
    <link rel="stylesheet" href="../layout/css/main.css">
</head>
<body>
<div id="background">
    <div class="container">
        <div class="row window-back">
            <div class="col-12 col-lg-8">
                <div class="login-left">
                <div id="auth-header">IM-CMS/auth</div>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
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
<script src="../../app/composer/vendor/components/jquery/jquery.min.js"></script>
<script src="../../app/composer/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../app/composer/vendor/components/jqueryui/jquery-ui.min.js"></script>
<script src="../../module/lightcase/js/lightcase.js"></script>
</body>
</html>