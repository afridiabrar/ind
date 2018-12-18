<!doctype html>
<html lang="en">
<head>
    <title>IEP Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="IEP">
    <meta name="author" content="IEP">
    <link rel="icon" href="<?= site_url('assets_b/images/logo222.png') ?>" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?= base_url('assets_b')?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets_b')?>/vendor/animate-css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('assets_b')?>/vendor/font-awesome/css/font-awesome.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url('assets_b')?>/css/main.css">
    <link rel="stylesheet" href="<?= base_url('assets_b')?>/css/color_skins.css">
</head>
<body class="theme-blue">
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle auth-main">
            <div class="auth-box">
                <div class="mobile-logo"><a href="javascript:void(0)">
                        <img src="https://thememakker.com/templates/mplify/html/assets/images/logo-icon.svg" alt="Mplify"></a>
                </div>
                <div class="auth-left">
                    <div class="left-top">
                        <img src="<?= base_url('assets_b')?>/images/logo222.png" style="width: 150px" class="img-fluid" alt="">
                        <span>IEP</span>

                    </div>
                    <div class="left-slider">
                        <img src="<?= base_url('assets_b')?>/images/login/1.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="auth-right">
                    <div class="card">
                        <div class="header">
                            <p class="lead">Log in</p>
                        </div>
                        <?php if(!empty($msg)){ ?>
                            <span style="width: 100%" class="btn btn-danger"><?= $msg ?></span>
                        <?php } ?>
                        <div class="body">
                            <form class="form-auth-small" method="post" action="<?= site_url('super/do_login')?>">
                                <div class="form-group">
                                    <label class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control"  placeholder="flash@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="*****">
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
