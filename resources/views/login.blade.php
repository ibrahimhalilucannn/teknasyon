<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Teknasyon Yazılım Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{asset('public/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/inovatechsoft.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/login.min.css')}}">
</head>
<body>
<div class="login">
    <div class="login-body">
        <a class="login-brand" href="#">
            Teknasyon Yazılım
        </a>
        <div class="login-form">
            <form data-toggle="validator" method="post" action="{{action('TeknasyonController@signin')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
                <div class="form-group">
                    <label for="email">Username</label>
                    <input class="form-control" type="text" name="username" spellcheck="false" data-rule-required="true" autocomplete="off" data-msg-required="Lütfen kullanıcı adını giriniz">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" spellcheck="false" data-rule-required="true" autocomplete="off" data-msg-required="Lütfen e-posta adresini giriniz">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" minlength="6" data-rule-required="true" data-msg-minlength="Lütfen 6 karakterden az girmeyiniz" data-msg-required="Lütfen şifrenizi giriniz" >
                </div>
                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('public/js/vendor.min.js')}}"></script>
<script src="{{asset('public/js/inovatechsoft.min.js')}}"></script>

@if (session()->has('user_login_danger'))
    <script type="text/javascript">
        toastr.error("{{session()->get('user_login_danger')}}", "{{trans('teknasyon/alert.info_error')}}");
    </script>
@endif

</body>
</html>