@extends('layouts.app')
@section('header')
    <div class="page-header">
        <h1>Solicitudes / Show #{{$solicitude->id}}</h1>

        <form action="{{ route('solicitudes.destroy', $solicitude->id) }}" method="POST" style="display: inline;"
              onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group"
                   href="{{ route('solicitudes.edit', $solicitude->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')

    <div class="panel-heading">Solicitud</div>
    <div class="panel-body">

        <div class="row">
            <div class="form-horizontal">

                <form action="#" class="col-md-12">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">id:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$solicitude->id}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 control-label">Dispositivo:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$solicitude->mobile_type->name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Estado:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$solicitude->state_type->title}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=" id_client" class="col-sm-2 control-label"> Cliente: </label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$solicitude->client->first_name . " ". $solicitude->client->last_name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=" fails" class="col-sm-2 control-label"> Fallas:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$solicitude-> fails}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="others" class="col-sm-2 control-label">Otros:</label>

                        <div class="col-sm-10">
                            <p class="form-control-static">{{$solicitude->others}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <label for="others" class="col-sm-2 control-label">Atributos:</label>
                        </div>
                    </div>

                    <div class="form-group" >
                        <div class="col-md-1"></div>

                        <label class="col-lg-9" for="status-field">


                        @foreach($solicitude->features as $feature)
                                <div class="col-lg-8">

                                    <p class="form-control-static"><i class="glyphicon glyphicon-check"></i> {{$feature->name}}</p>
                                </div>
                            @endforeach
                        </label>
                    </div>
                </form>
            </div>
        </div>
        <div class="well well-sm">
            <a class="btn btn-warning"
               href="{{ route('solicitudes.edit', $solicitude->id) }}"><i
                        class="glyphicon glyphicon-edit"></i> Edit</a>
            <form action="{{ route('solicitudes.destroy', $solicitude->id) }}" method="POST"
                  style="display: inline;"
                  onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger"><i
                            class="glyphicon glyphicon-trash"></i> Delete
                </button>
            </form>
            <a class="btn btn-url  pull-right" href="{{  URL::previous() }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
        </div>
    </div>
@endsection