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
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src="/{{$entry->file_url}}" >
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3>{{$entry->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>${{$entry->price}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$entry->description}}</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
@endsection