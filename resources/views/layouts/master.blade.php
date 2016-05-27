<html>
<head>
    <title>E-Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">




</head>
<body>
@section('sidebar')
    <nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Botiga</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::user())
                        <li><a href="/auth/login">Iniciar Sessió</a></li>
                        <li><a href="/auth/register">Registrar-se</a></li>
                    @elseif(Auth::user()->isBuyer())
                        <li><a href="/order">Les meves comandes<span class="fa fa-truck"></span></a></li>
                        <li><a href="/cart">Carret <span class="fa fa-shopping-basket"></span></a></li>
                    @elseif(Auth::user()->isAdmin())
                        <li><a href="/admin/products">Llista de productes <span class="fa fa-list-alt"></span></a></li>
                        <li><a href="{{route('usersList')}}">Llista d'usuaris <span class="fa fa-users"></span></a></li>
                    @endif
                    @if(Auth::user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hola, {{ Auth::user()->name}}!<span class="caret"></span></a>
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

<div class="container">
    @yield('content')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/9131e865b7.js"></script>
</body>
</html>