<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="<?= url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?= url('assets/css/painel/space.min.css') ?>" rel="stylesheet">
    <link href="<?= url('assets/css/painel/main.css') ?>" rel="stylesheet">

    <script src="<?= url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>

</head>

<body>
    <div class="page-inner login-page">
        <div id="main-wrapper" class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-9 imageLogin" style="background-image: url(<?= url('assets/images/painel/login.jpg') ?>)">
                </div>
                <div class="col-sm-6 col-md-3 login-box">
                    <div class="">
                        <div class="text-center" style="margin-bottom: 30px;">
                        <p class="textClinic">Clinic</p>
                        </div>
                        <h4 class="login-title">Sign in to your account</h4>
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="box-input-logn">
                                    <input type="email" class="form-login" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="E-mail" title="E-mail"required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <label for="exampleInputEmail1" class="label-login">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 30px;">
                                <div class="box-input-logn">
                                    <input type="password" class="form-login" id="password" name="password" placeholder="Password"
                                        title="password" required>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <label for="exampleInputPassword1" class="label-login">Password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnLogin btn btn-primary" value="Login" title="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    $(".imageLogin").height($(window).height());

    if ($(window).width() < 768) {
        $(".imageLogin").css("display", "none");
    } else {
        $(".imageLogin").css("display", "block");
    }
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $(".imageLogin").css("display", "none");
        } else {
            $(".imageLogin").css("display", "block");
        }
    });
</script>