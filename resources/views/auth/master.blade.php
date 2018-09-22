<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="container-fluid">
    <div class="row menu-login">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <img src="{{asset('images/logo-main.png')}}" height="50px" width="auto">
        </div>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3 about-us">
        <h1>Đăng nhập ứng viên</h1>
        <p>
            <label>Tiếp cận hàng triệu nhân lực giàu kinh nghiệm</label>
            <label>Ứng tuyển nhanh chóng, dễ dàng</label>
            <label>Nhận bản tin công việc phù hợp định kỳ</label>
            <label>Nâng cao cơ hội tìm việc với chương trình ứng viên năng động</label>
        </p>
    </div>
    <div class="col-md-3">
        @yield('content')
    </div>
    <div class="col-md-3"></div>
    <!-- /.login-logo -->
    <div class="col-md-6 col-md-offset-3">
    </div>
</div>
<!-- /.login-box -->
<!-- jQuery 2.2.3 -->
<script src="{{asset('admin/plugins/jQuery/jquery-3.1.1.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
