<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url() ?>/template/AdminBSBMaterialDesign/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url() ?>/template/AdminBSBMaterialDesign/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="background-image: url('<?= base_url() ?>/assets/img/background2.png'); background-size: cover;">
    <div class="login-box">
        <div class="logo">

            <img src="<?= base_url() ?>/assets/img/LOGO_PAL_INDONESIA.png" alt="" width="250">
            <small>PT Pal Indonesia (Persero)</small>

        </div>
        <div class="card">
            <div class="body">
                <form action="/auth/authLogin" method="POST">
                    <div class="msg">Login</div>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nip" placeholder="NIP" required autofocus value="<?= set_value('nip') ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 m-t-5">
                            <button class="btn btn-block bg-blue waves-effect" type="submit">LOGIN</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/js/admin.js"></script>
    <script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/js/pages/examples/sign-in.js"></script>
</body>

</html>