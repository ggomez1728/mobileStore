@extends('layouts.app')
@section('header')
<div class="page-header">
        <h1>Solicitudes / Show #{{$solicitude->id}}</h1>
        <form action="{{ route('solicitudes.destroy', $solicitude->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('solicitudes.edit', $solicitude->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                    <p class="form-control-static">{{$solicitude->id}}</p>
                </div>
                <div class="form-group">
                     <label for="mobile">MOBILE</label>
                     <p class="form-control-static">{{$solicitude->mobile}}</p>
                </div>
                    <div class="form-group">
                     <label for="status">STATUS</label>
                     <p class="form-control-static">{{$solicitude->status}}</p>
                </div>
                    <div class="form-group">
                     <label for=" id_client"> ID_CLIENT</label>
                     <p class="form-control-static">{{$solicitude-> id_client}}</p>
                </div>
                    <div class="form-group">
                     <label for=" fails"> FAILS</label>
                     <p class="form-control-static">{{$solicitude-> fails}}</p>
                </div>
                    <div class="form-group">
                     <label for="others">OTHERS</label>
                     <p class="form-control-static">{{$solicitude->others}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('solicitudes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection