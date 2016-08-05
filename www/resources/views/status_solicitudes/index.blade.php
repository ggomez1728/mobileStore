@extends('layouts.app')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> StatusSolicitudes
            <a class="btn btn-success pull-right" href="{{ route('status_solicitudes.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($status_solicitudes->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITLE</th>
                        <th>INFO</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($status_solicitudes as $status_solicitude)
                            <tr>
                                <td>{{$status_solicitude->id}}</td>
                                <td>{{$status_solicitude->title}}</td>
                    <td>{{$status_solicitude->info}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('status_solicitudes.show', $status_solicitude->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('status_solicitudes.edit', $status_solicitude->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('status_solicitudes.destroy', $status_solicitude->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $status_solicitudes->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif
            <div class="well well-sm">
                <a href="/status_solicitudes/create" class="btn btn-primary">Nuevo Estado de Sistema</a>
            </div>
        </div>
    </div>

@endsection