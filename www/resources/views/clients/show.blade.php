@extends('layouts.app')
@section('header')
<div class="page-header">
        <h1>Clients / Show #{{$client->id}}</h1>
        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('clients.edit', $client->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="identify">IDENTIFY</label>
                     <p class="form-control-static">{{$client->identify}}</p>
                </div>
                    <div class="form-group">
                     <label for="first_name">FIRST_NAME</label>
                     <p class="form-control-static">{{$client->first_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="last_name">LAST_NAME</label>
                     <p class="form-control-static">{{$client->last_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="phone_number">PHONE_NUMBER</label>
                     <p class="form-control-static">{{$client->phone_number}}</p>
                </div>
                    <div class="form-group">
                     <label for="email">EMAIL</label>
                     <p class="form-control-static">{{$client->email}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('clients.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection