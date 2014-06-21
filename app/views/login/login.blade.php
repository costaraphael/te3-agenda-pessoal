<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agenda Pessoal</title>
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
</head>

<body>
{{ HTML::script('js/jquery1-10-2.min.js') }}
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand">Agenda Pessoal</a>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">

            @if (Session::has('message'))
            <div class="alert alert-danger">
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                {{ Form::open(array('route' => 'logar')) }}
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                {{ Form::text('login', Input::old('login'), array('class'=>'form-control', 'placeholder'=>'Login')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                {{ Form::input('password' , 'password', Input::old('password'), array('class'=>'form-control', 'placeholder'=>'Password')) }}
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 0">
                                {{ Form::input('checkbox' , 'remember_me', Input::old('remember_me')) }}
                            Permanecer logado?
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-block btn-primary" style="padding-left: 10px; padding-right: 10px">
                            <i class="glyphicon glyphicon-log-in pull-left"></i>
                            <span>Entrar</span>
                        </button>
                    </div>
                {{ Form::close() }}
            </div>

        </div>
    </div>
</div>

{{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>