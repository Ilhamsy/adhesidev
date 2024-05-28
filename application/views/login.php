<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logoadhesidev.png">
    <title>AdhesiDev</title>
    <link rel="stylesheet" href="style2.css" type="text/css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h1 class="logo">AdhesiDev</h1>
            </div>
        </div>
        <div class="content">
            <h1>Start a new <br><span>Season with us</span><br>Get ready</h1>
            <p class="par">Gapai cita-citamu bersama AdhesiDev.<br></p>
        </div>
    </div>

    <body class="hold-transition login-page">
        <div class="form">
            <h2>Login Here</h2>
            <div class="form-body">
                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btnn" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>

    <!-- jQuery 3 -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="<?php echo base_url('template/admin/');?>/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('template/admin/');?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('template/admin/');?>/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>

    <div class="footer1">
        <strong>Copyright &copy; 2023-.</strong> Muh Syahrul Wajhullah J | Achmad Ilham Syahputra
    </div>
</body>
</html>