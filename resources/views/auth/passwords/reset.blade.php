<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-login.css')}}" />
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<div id="loginbox">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form id="loginform" class="form-vertical" action="{{route('password.request')}}" method="POST" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="control-group normal_text"> <h3><img src="{{asset('img/logo.png')}}" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input  placeholder="Email Address" id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                </div>
            </div>
        </div>

        <div class="control-group">
            <div class="controls{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>



                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>



                </div>
            </div>
        </div>
        @if($errors->has('email')  )

            <div class="widget-content">
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <strong>Error!</strong> {{$errors->first('email')}} </div>
            </div>
        @endif

        @if($errors->has('password')  )
            <div class="widget-content">
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <strong>Error!</strong> {{$errors->first('password')}} </div>
            </div>
        @endif

        @if($errors->has('password_confirmation')  )

            <div class="widget-content">
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <strong>Error!</strong> {{$errors->first('password_confirmation')}} </div>
            </div>
        @endif
        <div class="form-actions">
           <span class="pull-right"><button type="submit"  class="btn btn-success" >Reset Password</button></span>
        </div>


    </form>

</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/matrix.login.js')}}"></script>
</body>

</html>
