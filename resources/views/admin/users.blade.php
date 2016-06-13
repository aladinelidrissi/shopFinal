@extends('layouts.master')

@section('Admin shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('messages')
    @parent
@endsection

@section('content')

        <div class="row">
            <h2 class="section-heading" style="font-weight: bold" >Usuaris</h2><br><br>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <td><strong>ID</strong></td>
                    <td><strong>Nom</strong></td>
                    <td><strong>E-mail</strong></td>
                    <td><strong>Ùltima connexió</strong></td>
                    <td><strong>Poblacio</strong></td>
                    <td><strong>Direccio</strong></td>
                    <td><strong>Codi Postal</strong></td>
                    <td><strong>Telefon</strong></td>
                    <td><strong>Rol</strong></td>
                    <td></td>
                    <td></td>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}$</td>
                            <td>{{$user->updated_at}}</td>
                            <td>{{$user->city}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->cp}}</td>
                            <td>{{$user->number}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <form method="POST" action="/admin/user/delete/{{$user->id}}" enctype="multipart/form-data" role="form" class="form-horizontal">
                                    {!! csrf_field() !!}
                                    <a href="/admin/user/delete/{{$user->id}}"><button class="btn btn-danger eliminar">Eliminar</button></a>
                                </form>

                            <td>
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal{{$user->id}}">Editar</button>

                                <!-- Modal -->
                                <div id="myModal{{$user->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edició Usuari</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/user/edit/{{$user->id}}" class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="user">ID de l'usuari</label>
                                                        <div class="col-md-9">
                                                            <input id="user" name="user" type="text" value="{{$user->id}}" class="form-control input-md" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="user">Nom:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="name" value="{{$user->name}}" class="form-control input-sm" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="user">E-mail:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="email" value="{{$user->email}}" class="form-control input-sm" required/>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="user">Rol de l'usuari:</label>
                                                        <div class="col-md-9">

                                                            <input type="radio"name="role" id="optionsRadios1" value="admin" checked="" class="form-control"> Usuari administrador
                                                            <input type="radio" name="role" id="optionsRadios2" value="buyer" class="form-control"> Usuari normal
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="user">Adreça:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="address" value="{{$user->address}}" class="form-control input-sm" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="user">Poblacio:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="city" value="{{$user->city}}" class="form-control input-sm" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="user">Codi Postal:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="cp" value="{{$user->cp}}" class="form-control input-sm" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="user">Numero telefon:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="number" value="{{$user->number}}" class="form-control input-sm" required/>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-sm btn-success" >Guardar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="/admin/user/new"><button class="btn btn-success">Crear Usuari</button></a>
            </div>
        </div>
@endsection
