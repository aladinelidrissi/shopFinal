@extends('layouts.master')

@section('Admin shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="/admin/user/new"><button class="btn btn-success">Crear Usuari</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <td>Nom</td>
                    <td>e-mail</td>
                    <td>Data de creació</td>
                    <td>Rol</td>
                    <td></td>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}$</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->role}}</td>
                            <td><a href="/admin/user/delete/{{$user->id}}"><button class="btn btn-danger">Eliminar</button></a></td>
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
                                                        <label class="col-sm-1 control-label">Nom:</label>
                                                        <input type="text" name="name" value="{{$user->name}}" class="form-control input-sm" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 control-label">Nom:</label>
                                                        <input type="text" name="email" value="{{$user->email}}" class="form-control input-sm" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-1 control-label" for="role">Rol de l'usuari</label>
                                                        <div class="col-sm-11">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" ng-model="user.role" name="role" id="optionsRadios1" value="admin" checked="" class="form-control input-sm"> Usuari administrador
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" ng-model="user.role" name="role" id="optionsRadios2" value="buyer" class="form-control input-sm"> Usuari normal
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-success" >Guardar</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">

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
    </div>

@endsection
