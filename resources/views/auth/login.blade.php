<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/matrix-login.css')}}"/>
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
@if(isset($success))
    <div class="alert alert-success" role="alert">{{ $success }}</div>
@endif
@if(isset($fail))
    <div class="alert alert-danger" role="alert">{{ $fail }}</div>
@endif
<div id="loginbox">
    <form id="loginform" class="form-vertical" action="{{route('login')}}" method="POST" role="form">
        <div class="control-group normal_text"><h3><img src="{{asset('img/Image_from_Skype1.png')}}" alt="Logo"/></h3>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input type="text" name="username" placeholder="Username"/>

                </div>
            </div>
        </div>
        @if($errors->has('username')  )
        @endif
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <input type="password" name="password" placeholder="Password"/>

                </div>
            </div>
        </div>
        {!! csrf_field() !!}
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info"
                                       id="to-recover">Forgot password?</a></span>
            <span class="pull-right"><button type="submit" class="btn btn-success"> Login</button></span>
        </div>
        @if($errors->has('username')  )

            <div class="widget-content">
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <strong>Error!</strong> {{$errors->first('username')}} </div>
            </div>
        @endif
        @if($errors->has('password')  )
            <div class="widget-content">
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <strong>Error!</strong> {{$errors->first('password')}} </div>
            </div>
        @endif
        @if($errors->has('errorlogin')  )

            <div class="widget-content">
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <strong>Error!</strong> {{$errors->first('errorlogin')}} </div>
            </div>
        @endif

    </form>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form id="recoverform" action="#" class="form-vertical">
        {{ csrf_field() }}
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a
            password.</p>

        <div class="controls{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text"
                                                                                      placeholder="E-mail address"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success"
                                       id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><button type="submit" class="btn btn-info">Recover</button></span>
        </div>
    </form>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/matrix.login.js')}}"></script>
</body>

</html>
