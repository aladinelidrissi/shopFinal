@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('messages')
    @parent
@endsection

@section('content')
        <form class="form-horizontal" method="POST" action="/user/edit/save/{{Auth::user()->id}}">
            {!! csrf_field() !!}
            <h2 class="section-heading" style="font-weight: bold" >Editar Perfil</h2><br><br>
            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Nom</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Usuari/E-Mail</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Contrassenya</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="password" id="password" pattern="[a-zA-Z0-9_\-\.~]{6,}" >
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-lg-2 control-label">Confirmar contrassenya</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" pattern="[a-zA-Z0-9_\-\.~]{6,}" >
                </div>
            </div>

            <div class="form-group">
                <label for="address" class="col-lg-2 control-label">Adreça</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="address" id="address" value="{{Auth::user()->address}}">
                </div>
            </div>
            <div class="form-group">
                <label for="city" class="col-lg-2 control-label">Població</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="city" id="city" value="{{Auth::user()->city}}">
                </div>
            </div>
            <div class="form-group">
                <label for="cp" class="col-lg-2 control-label">Codi postal</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="cp" id="cp" value="{{Auth::user()->cp}}">
                </div>
            </div>
            <div class="form-group">
                <label for="number" class="col-lg-2 control-label">Numero de telefon</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="number" id="number" value="{{Auth::user()->number}}">
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

