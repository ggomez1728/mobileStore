@extends('layouts.app')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Clients
            <a class="btn btn-success pull-right" href="{{ route('clients.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="panel-heading">Listado de Clientes</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-inline" action="{{ route('clients.search') }}"  method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="exampleInputEmail2">ID:</label>
                            <input type="text"  name="identify" class="form-control" id="identify" value="{{ old("identify") }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2">Nombre:</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Nombre" value="{{ old("first_name") }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2">Apellido:</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Apellido"  value="{{ old("last_name") }}">
                        </div>
                        <button type="submit" class="btn btn-default">Buscar Cliente</button>
                    </form>
                </div>


                @if($clients->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cedula</th>
                            <th>Cliente</th>
                            <th>Numero Celular</th>
                            <th class="text-right">Correo</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($clients as $client)

                        <tr onclick="document.location = '{{ route('clients.show', $client->id) }}';">
                            <td>{{$client->id}}</td>
                                <td>{{$client->identify}}</td>
                                <td>{{$client->first_name ." ". $client->last_name}}</td>
                                <td>{{$client->phone_number}}</td>
                                <td class="text-right">{{$client->email}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {!! $clients->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
                <div class="well well-sm">
                    <a href="/clients/create" class="btn btn-primary">Nuevo Cliente</a>
                </div>
            </div>
        </div>
    </div>

@endsection