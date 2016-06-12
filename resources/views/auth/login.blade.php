@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('messages')
    @parent
@endsection

@section('content')
    <form class="form-horizontal" method="POST" action="">
        {!! csrf_field() !!}
        <fieldset>
            <h2 class="section-heading"  style="font-weight: bold" >Iniciar Sessió</h2><br><br>

            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Usuari/E-Mail</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Contrassenya</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="password" required>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" checked ><strong> Recordar-me</strong>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default"><a href="/">Cancel·lar</a></button>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 control">
                    <strong><div style="border-top: 1px solid black; padding-top:10px; font-size:100%" >
                        No tens compte?
                        <a href="/auth/register" >
                            Registra't!
                        </a>
                     </div>
                    </strong>
                </div>
            </div>
        </fieldset>
    </form>

@endsection