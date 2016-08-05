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
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection