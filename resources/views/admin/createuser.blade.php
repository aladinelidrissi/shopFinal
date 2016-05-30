@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('messages')
    @parent
@endsection

@section('content')
    <form class="form-horizontal" method="POST" action="{{route('registerPost')}}">
        {!! csrf_field() !!}
        <h2 class="section-heading" style="font-weight: bold">Registrar-se</h2><br><br>
        <div class="form-group">
            <label for="name" class="col-lg-2 control-label">Nom</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-lg-2 control-label">Usuari/E-Mail</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-lg-2 control-label">Contrassenya</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="password" id="password" pattern="[a-zA-Z0-9_\-\.~]{6,}"  required>
            </div>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="col-lg-2 control-label">Confirmar contrassenya</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" pattern="[a-zA-Z0-9_\-\.~]{6,}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label" for="role">Rol de l'usuari</label>
            <div class="col-lg-10">
                <div class="radio">
                    <label>
                        <input type="radio" name="role" id="optionsRadios1" value="admin" checked=""> Usuari administrador
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="role" id="optionsRadios2" value="buyer"> Usuari normal
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
    </form>
@endsection

