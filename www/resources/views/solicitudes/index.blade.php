@extends('layouts.app')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Solicitudes
            <a class="btn btn-success pull-right" href="{{ route('solicitudes.create') }}"><i
                        class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-inline" action="{{ route('clients.search') }}" method="POST">
                    {!! csrf_field() !!}
                    <div>
                        <div class="form-group">
                            <label for="exampleInputName2">Dispositivo:</label>
                            <select class="form-control" name="mobile">
                                @foreach ($mobiles as $mobil)
                                    <option value="{{$mobil->id}}">{{$mobil->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2">Estado:</label>
                            <select class="form-control" name="status">
                                @foreach ($status_solicitudes as $state)
                                    <option value="{{$state->id}}">{{$state->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Desde:</label>
                            <input type="date" name="identify" class="form-control" id="identify"
                                   value="{{ old("identify") }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Hasta:</label>
                            <input type="date" name="identify" class="form-control" id="identify"
                                   value="{{ old("identify") }}">
                        </div>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-default">Buscar Solicitud</button>
                    </div>
                </form>
            </div>
            @if($solicitudes->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID Ciente</th>
                        <th>Dispositivo</th>
                        <th>Estatus</th>
                        <th> Cliente</th>
                        <th class="text-right">Fecha</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($solicitudes as $solicitude)
                        <tr onclick="document.location = '{{ route('solicitudes.show', $solicitude->id) }}';">
                            <td>{{$solicitude->id_client}}</td>
                            <td>{{$solicitude->mobile_type->name}}</td>
                            <td>{{$solicitude->state_type->title}}</td>
                            <td>{{$solicitude->client->first_name . " ".$solicitude->client->last_name}}</td>
                            <td class="text-right">
                                {{$solicitude->updated_at}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $solicitudes->render() !!}
            @else
                <h3 class="text-center alert alert-info">No hay Clientes!</h3>
            @endif

        </div>
    </div>

@endsection