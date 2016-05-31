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
        <div class="col-md-8">
            <h3>Ordre numero: {{$charge->id}}</h3>
            <h3>Feta el : {{$charge->created_at}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-sm-4">Nom</th>
                    <th class="col-sm-4">Arxiu</th>
                    <th class="col-sm-2">Preu</th>
                </tr>
                </thead>
                @foreach($charge->chargeItems as $item)
                    <tr>
                        <td>{{$item->product->name}}</td>
                        <td> {{$item->file->filename}}</td>
                        <td>$ {{number_format($item->product->price,2,',','')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection