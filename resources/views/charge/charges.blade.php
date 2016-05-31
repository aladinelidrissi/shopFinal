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
        <div class="col-md-12">
            <h2>Els teus ordres fets</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-sm-2">Id</th>
                    <th class="col-sm-4">Data</th>
                    <th class="col-sm-2"></th>
                </tr>
                </thead>
                @foreach($charges as $charge)
                    <tr>
                        <td>{{$charge->id}}</td>
                        <td><a href="/charge/{{$charge->id}}"> {{$charge->created_at}}</a></td>
                        <td><a href="/charge/{{$charge->id}}"><i class="fa fa-search-plus"></i></a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection