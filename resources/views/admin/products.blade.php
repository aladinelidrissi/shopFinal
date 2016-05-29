@extends('layouts.master')

@section('Admin shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="/admin/product/new"><button class="btn btn-success">New Product</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <td>Name</td>
                    <td>Price</td>
                    <td>File</td>
                    <td></td>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}$</td>
                            <td>{{$product->file->original_filename}}</td>
                            <td><a href="/admin/product/destroy/{{$product->id}}"><button class="btn btn-danger">Eliminar</button></a> </td>
                            <td>
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal{{$product->id}}">Editar</button>

                                <!-- Modal -->
                                <div id="myModal{{$product->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edició Producte</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/admin/product/edit/{{$product->id}}" enctype="multipart/form-data" role="form" class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="name">Name</label>
                                                        <div class="col-md-9">
                                                            <input id="name" name="name" type="text" value="{{$product->name}}" placeholder="Product name" class="form-control input-md" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="textarea">Description</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" id="textarea" name="description">{{$product->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="price">Price</label>
                                                        <div class="col-md-9">
                                                            <input id="price" name="price" type="text" placeholder="Product price" value="{{$product->price}}" class="form-control input-md" >

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="file">File</label>
                                                        <div class="col-md-9">
                                                            <input id="file" name="file" class="input-file" type="file">
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
