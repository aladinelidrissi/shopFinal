<html>
<head>
    <title>E-Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Istok Web">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Molengo">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Homemade Apple">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cinzel">

    <link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body>
@section('sidebar')
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">The Buyer's Shop</a>
            </div>
            <div class="collapse navbar-collapse navright" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::user())
                        <li><a href="/auth/login">Iniciar Sessió</a></li>
                        <li><a href="/auth/register">Registrar-se</a></li>
                    @elseif(Auth::user()->isBuyer())
                        <li><a href="/charge">Les meves comandes<span class="fa fa-truck"></span></a></li>
                        <li><a href="/trolley">Carret <span class="fa fa-shopping-basket"></span></a></li>
                    @elseif(Auth::user()->isAdmin())
                        <li><a href="/admin/charges">Llista de comandes <span class="fa fa-truck"></span></a></li>
                        <li><a href="/admin/products">Llista de productes <span class="fa fa-list-alt"></span></a></li>
                        <li><a href="{{route('usersList')}}">Llista d'usuaris <span class="fa fa-users"></span></a></li>
                    @endif
                    @if(Auth::user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hola, <strong>{{ Auth::user()->name}}!</strong><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/user/edit">Editar perfil </a></li>
                                <li class="divider"></li>
                                <li><a href="/auth/logout">Sortir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
@show
<br><br><br><br>

@section('messages')
    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class')}}">
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
@show

<div class="container">
    @yield('content')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/9131e865b7.js"></script>
<script src="/js/psw_validate.js"></script>
</body>
</html>