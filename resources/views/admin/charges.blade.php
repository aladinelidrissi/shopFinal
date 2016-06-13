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
        <h2 class="section-heading" style="font-weight: bold" >Comandes</h2><br><br>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <td><strong>ID</strong></td>
                <td><strong>Nom de l'usuari</strong></td>
                <td><strong>Total pagat</strong></td>
                <td><strong>Data del pagament</strong></td>
                <td></td>
                <td></td>
                <td></td>
                </thead>
                <tbody>
                @foreach ($charges as $charge)
                    <tr>
                        <td class="nomproduct">{{$charge->id}}</td>
                        <?php
                            $id = $charge->user_id;
                            $user = DB::table('users')->where('id', $id)->first();
                        ?>
                        <td class="nomproduct">{{$user->name}}</td>
                        <td class="preu">{{$charge->total_paid}}€</td>
                        <td>{{$charge->created_at}}</td>
                        <td><a href="/charge/{{$charge->id}}"><i class="fa fa-search-plus"> Detalls</i></a></td>
                        <td><a href="/admin/charge/destroy/{{$charge->id}}"><button class="btn btn-danger eliminar">Eliminar</button></a> </td>
                        <td>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal{{$charge->id}}">Editar</button>

                            <!-- Modal -->
                            <div id="myModal{{$charge->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edició Comanda</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/admin/charge/edit/{{$charge->id}}" enctype="multipart/form-data" role="form" class="form-horizontal">
                                                {!! csrf_field() !!}
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="id">ID de la comanda</label>
                                                    <div class="col-md-9">
                                                        <input id="id" name="id" type="text" value="{{$charge->id}}" placeholder="Product name" class="form-control input-md" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="user">ID de l'usuari</label>
                                                    <div class="col-md-9">
                                                        <input id="user" name="user" type="text" value="{{$charge->user_id}}" class="form-control input-md" >

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="price">Preu total</label>
                                                    <div class="col-md-9">
                                                        <input id="total" name="total" type="text" placeholder="Product price" value="{{$charge->total_paid}}" class="form-control input-md" >

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
@endsection
