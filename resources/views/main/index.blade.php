@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('messages')
    @parent
@endsection

@section('content')
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading nomproduct">
                    <a href="/description/{{$product->id}}"><strong>{{$product->name}}</strong></a>
                </div>
                <div class="panel-content">
                    <a href="/description/{{$product->id}}"><img src="{{$product->file_url}}" class="img-responsive product-img " /></a>
                    <p class="label label-default"></p>
                    <p><strong>{{$product->intro}}</strong></p>
                    <p class=" preu" ><strong >Preu: </strong>{{$product->price}} €</p>

                </div>
                <div class="panel-footer">
                        @if(!Auth::user())
                        <button type="button" class="btn btn-sm btn-success">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"><a href="/auth/login" class="buy">Comprar</a></span>
                        </button>
                        @elseif(Auth::user()->isBuyer())
                            <button type="button" class="btn btn-sm btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"><a href="/addProduct/{{$product->id}}" class="buy">Comprar</a></span>
                            </button>
                        @elseif(Auth::user()->isAdmin())
                        @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection