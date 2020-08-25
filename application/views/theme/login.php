
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_name;?> | Log in</title>
        <link href='<?=base_url('assets/')?>favicon.ico' rel='image_src'/>

        <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('assets/')?>apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('assets/')?>apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/')?>apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/')?>apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/')?>apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('assets/')?>apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('assets/')?>apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('assets/')?>apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/')?>apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('assets/')?>android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/')?>favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/')?>favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/')?>favicon-16x16.png">
        <link rel="manifest" href="<?=base_url('assets/')?>manifest.json">
        <meta name="msapplication-TileColor" content="#28a745">
        <meta name="msapplication-TileImage" content="<?=base_url('assets/')?>ms-icon-144x144.png">
        <meta name="theme-color" content="#28a745">
        <meta name="robots" content="noindex, nofollow">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <a href="<?=base_url()?>"><b><?=$site_name;?></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form id="form_login" method="post">
            <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Remember Me
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-sosmed btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-sosmed btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="#">I forgot my password</a>
        </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- Swal -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $('#form_login').submit(function(e){
        e.preventDefault();
        $.ajax({
            url : '/admin/do_login',
            type : 'post',
            data : $(this).serialize(),
            dataType : 'json',
            success : function(data){
                if (data.status) {
                    swal({
                        icon : 'success',
                        title : data.message,
                    })
                    setTimeout(() => {
                        window.location.href='/manager';
                    }, 1200);
                }else{
                    swal({
                        icon : 'error',
                        title : data.message
                    })
                }
            }
        })
    });
    $('.btn-sosmed').click(function(){
        swal({
            icon : 'error',
            title : 'Layanan Tidak Tersedia'
        })
    })
</script>
</body>
</html>
