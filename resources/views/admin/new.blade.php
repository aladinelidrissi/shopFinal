@extends('layouts.master')

@section('New Product', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('messages')
    @parent
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">New Product</div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="/admin/product/save" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Nom</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="Product name" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textarea">Petit resum de l'article</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea" name="intro"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textarea">Descripcio</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="price">Preu</label>
                        <div class="col-md-9">
                            <input id="price" name="price" type="text" placeholder="Product price" class="form-control input-md" required="">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="file">Arxiu</label>
                        <div class="col-md-9">
                            <input id="file" name="file" class="input-file" type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="submit"></label>
                        <div class="col-md-9">
                            <button id="submit" name="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>

                </fieldset>

            </form>
        </div>
    </div>
@endsection