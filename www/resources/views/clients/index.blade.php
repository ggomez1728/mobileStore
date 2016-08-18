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
                    <form class="form-inline" action="{{ route('clients.search') }}" method="GET">

                        <select class="form-control  input-lg" name="search">
                            <option value="id">ID</option>
                            <option value="first_name">Nombre</option>
                            <option value="last_name">Apellido</option>
                            <option value="phone">Numero Celular</option>
                            <option value="email">Correo</option>
                        </select>

                        <div class="form-group">
                            <input type="text" name="dataSearch" class="form-control" id="identify"
                                  placeholder="Que Buscas?" value="{{ old("identify") }}">
                        </div>

                        <button type="submit" class="btn  btn-primary">Encontrar</button>
                    </form>
                </div>


                @if($clients->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Numero Celular</th>
                            <th class="text-right">Correo</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($clients as $client)

                            <tr onclick="document.location = '{{ route('clients.show', $client->id) }}';">
                                <td>{{$client->id}}</td>
                                <td>{{$client->first_name ." ". $client->last_name}}</td>
                                <td>{{$client->phone_number}}</td>
                                <td class="text-right">{{$client->email}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {!! $clients->links() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>

@endsection