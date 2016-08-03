@extends('layouts.app')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Solicitudes
            <a class="btn btn-success pull-right" href="{{ route('solicitudes.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
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
                            <th>ID</th>
                            <th>MOBILE</th>
                        <th>STATUS</th>
                        <th> ID_CLIENT</th>
                        <th> FAILS</th>
                        <th>OTHERS</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($solicitudes as $solicitude)
                            <tr>
                                <td>{{$solicitude->id}}</td>
                                <td>{{$solicitude->mobile}}</td>
                    <td>{{$solicitude->status}}</td>
                    <td>{{$solicitude-> id_client}}</td>
                    <td>{{$solicitude-> fails}}</td>
                    <td>{{$solicitude->others}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('solicitudes.show', $solicitude->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('solicitudes.edit', $solicitude->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('solicitudes.destroy', $solicitude->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
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