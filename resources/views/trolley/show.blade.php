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
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table ">
                <thead>
                <tr>
                    <th>Producte</th>
                    <th></th>
                    <th class="text-center"></th>
                    <th class="text-center">Preu de l'article</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="img-responsive media-object" src="{{$item->product->file_url}}" style="width: 100px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$item->product->name}}</h4>
                                </div>
                            </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->product->price}}€</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <form method="POST" action="/removeItem/{{$item->id}}" enctype="multipart/form-data" role="form" class="form-horizontal">
                                {!! csrf_field() !!}
                                <a href="/removeItem/{{$item->id}}"><button class="btn btn-danger eliminar">Eliminar</button></a>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total a pagar: </h3></td>
                    <td class="text-right"><h3><strong>{{$total}}€</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a href="/"> <button type="button" class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span> Continuar amb la compra
                            </button>
                        </a></td>
                    <td class="col-md-2">
                        <form action="/checkout" method="POST">
                            {!! csrf_field() !!}
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_M8L2fyJR9WifAH2X47RFXNJJ"
                                    data-amount="{{$total*100}}"
                                    data-name="Aladin-shop"
                                    data-description="Products"
                                    data-image="/img/pay.png"
                                    data-locale="auto">
                            </script>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
 