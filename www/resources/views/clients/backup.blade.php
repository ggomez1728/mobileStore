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
    <div class="panel-heading">Backup de Sistema</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <p>Sistema de respaldo de datos de VCARDs </p>
                <div class="well well-sm">
                    <a href="/clients/generate" class="btn btn-primary">Generar respaldo</a>
                </div>
            </div>
        </div>
    </div>

@endsection