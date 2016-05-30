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
            <div class="col-md-4">
                @foreach ($products as $product)
                        <div class="viatge panel panel-default hover">
                            <div class="panel-heading"><a href="/description/{{$product->id}}"><strong>{{$product->name}}</strong></a></div>
                            <div class="panel-body">
                                <img src="{{$product->file_url}}" class="product-img">
                                    <h3>
                                        <label>${{$product->price}}</label>
                                    </h3>
                                <a href="/addProduct/{{$product->id}}" class="reservar btn btn-success btn-sm btn-block">Comprar.</a>
                            </div>
                        </div>
                @endforeach
        </div>
    </div>
@endsection