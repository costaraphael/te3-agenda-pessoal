<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agenda Pessoal</title>
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/font-awesome.css') }}
</head>

<body>
{{ HTML::script('js/jquery1-10-2.min.js') }}
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-6">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Agenda Pessoal</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('inicio') ? 'active' : '' }}">{{ link_to_route('home', 'Início') }}</li>
                <li class="{{ Request::is('contatos*') ? 'active' : '' }}">{{ link_to_route('contatos', 'Contatos') }}
                </li>
                <li class="{{ Request::is('compromissos*') ? 'active' : '' }}">{{ link_to_route('compromissos',
                    'Compromissos') }}
                </li>
                @if(Auth::user()->admin)
                <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">{{ link_to_route('usuarios', 'Usuários') }}
                </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Olá, {{Auth::user()->nome}}<b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ link_to_route('perfil', 'Alterar Dados') }}</li>
                        <li class="divider"></li>
                        <li>{{ link_to_route('logout', 'Sair') }}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-12">

            @if (Session::has('message'))
            <div class="alert alert-danger">
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif

            @if (Session::has('success'))
            <div class="alert alert-success">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif

            @yield('main')
        </div>
    </div>
</div>

{{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>