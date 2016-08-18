@extends('layouts.app')
@section('header')
    <div class="page-header">
        <h1>Clients / Show #{{$client->id}}</h1>

        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;"
              onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('clients.edit', $client->id) }}"><i
                            class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')

    <div class="panel-heading">
        <div>
            DATOS DEL CLIENTE
        </div>
        <a href="{{route('clients.edit', $client->id)}}" class="btn btn-xs  btn-warning"><i class="glyphicon glyphicon-edit"></i>
            Editar Cliente
        </a>
        <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
              style="display: inline;"
              onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger"><i
                        class="glyphicon glyphicon-trash"></i> Delete
            </button>
        </form>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="form-horizontal">
                <form action="#" class="col-md-12">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">ID</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$client->id}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-sm-2 control-label">Nombre:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$client->first_name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-2 control-label">Apellido:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$client->last_name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-2 control-label">Numero Telefónico:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$client->phone_number}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Correo:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$client->email}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Codigo Qr:</label>
                        <img class="img-thumbnail"  src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($qrCode)) !!} ">
                    </div>
                </form>


            </div>
        </div>
    </div>
    <div class="well well-sm">
        <H4>SOLICITUDES</H4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                @if($solicitudes->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dispositivo</th>
                            <th>Estado</th>
                            <th>Falla</th>
                            <th>Fecha</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($solicitudes as $solicitude)
                            <tr onclick="document.location = '{{ route('solicitudes.show', $solicitude->id) }}';">
                                <td>{{$solicitude->id}}</td>
                                <td>{{$solicitude->mobile_type->name}}</td>
                                <td>{{$solicitude->state_type->title}}</td>
                                <td>{{$solicitude->fails}}</td>
                                <td>{{$solicitude->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $solicitudes->render() !!}
                @else
                    <h5 class="text-center alert alert-info">Sin Solicitudes</h5>
                @endif
            </div>
        </div>
        <div class="well well-sm">
            <a href="/solicitudes/create?user={{$client->id}}" class="btn btn-primary">Nueva Solicitud</a>

            <a href="{{route('clients.index') }}" class="btn btn-url  pull-right">
                <i class="glyphicon glyphicon-backward"></i>
                Atras</a>
        </div>
    </div>



@endsection