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
        <div class="col-sm-3">
            <!-- Profile image -->
            <img src="/{{$entry->file_url}}" class="image-bordered img-responsive img-square" alt="">
        </div>
        <!-- Profile end -->

        <div class="col-md-9 col-sm-6 nomproduct ">
            <!-- Profile description -->
            <h1 ><strong>{{$entry->name}}</strong></h1>
            <p>{{$entry->description}}</p>
            <label class="preu">€{{$entry->price}}</label><br><br>

            @if(!Auth::user())
                <button type="button" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-plus nomproduct" aria-hidden="true"><a href="/auth/login" class="buy">Comprar</a></span>
                </button>
            @elseif(Auth::user()->isBuyer())
                <button type="button" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-plus nomproduct" aria-hidden="true"><a href="/addProduct/{{$entry->id}}" class="buy">Comprar</a></span>
                </button>
                @else
                @endif
                        <!-- Final row -->
        </div>
        <!-- Final descripcio de Perfil-->
        <!--final col 3 -->
    </div>
    <!--Row about end-->
    <!-- final container-->
@endsection