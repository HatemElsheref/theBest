
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{env('APP_NAME')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{dashboardAssets('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{dashboardAssets('dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{dashboardAssets('plugins/iCheck/square/blue.css')}}">
    @if(app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{dashboardAssets('css/global-style.css')}}">
    @endif

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>{{env('APP_NAME')}}</b>v1.0</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{{__('dashboard.sign_msg')}}</p>
        <form method="POST" action="{{route('dashboard.login')}}">
            @csrf
            <div class="form-group has-feedback">
                <input id="email" type="email" placeholder="{{__('dashboard.enter_email')}}" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"  required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback text-danger small @if(app()->getLocale()=='ar') pull-right @endif" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <span class="glyphicon glyphicon-envelope form-control-feedback login-icon"></span>
            </div>
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-lock form-control-feedback login-icon"></span>
                <input id="password" placeholder="{{__('dashboard.enter_password')}}" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" required  name="password"  autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback text-danger small @if(app()->getLocale()=='ar') pull-right @endif" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

                @if(app()->getLocale()=='ar')
                <div class="row">
                    <div class="col-xs-12">

                        <div class="checkbox icheck pull-right ">
                            <label>
                                <span> {{__('dashboard.remember_me')}}</span>
                                <input type="checkbox"  name="remember" id="remember" @if(old('remember'))  checked @endif >
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل الدخول</button>
                    </div><!-- /.col -->
                 </div>
                    @else
                <div class="row">
                    <div class="col-xs-12">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" @if(old('remember'))  checked @endif>
                                <span> {{__('dashboard.remember_me')}}</span>
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('dashboard.login')}}</button>
                    </div><!-- /.col -->
                </div>
                    @endif

        </form>

{{--        <a href="#" class="@if(app()->getLocale()=='ar') pull-right @endif">@lang('dashboard.forget_password')</a><br>--}}


    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{dashboardAssets('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.4 -->
<script src="{{dashboardAssets('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{dashboardAssets('plugins/iCheck/icheck.min.js')}}"></script>
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
