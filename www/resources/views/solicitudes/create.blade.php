@extends('layouts.app')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Solicitudes / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')
    <div class="panel-heading"><b>Cliente:</b> {{$client->first_name . " " . $client->last_name}}</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('solicitudes.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group @if($errors->has('mobile')) has-error @endif">
                        <label for="mobile-field">Dispositivos</label>
                        <select class="form-control  input-lg" name="mobile">
                            @foreach ($mobiles as $mobil)
                                <option value="{{$mobil->id}}">{{$mobil->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has("mobile"))
                            <span class="help-block">{{ $errors->first("mobile") }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="status-field">Atributos</label>

                        @foreach($features as $feature)
                            <div>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name='features[]' value="{{$feature->id}}"> {{$feature->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group @if($errors->has('status')) has-error @endif">
                        <label for="status-field">Estatus</label>
                        <select class="form-control  input-lg" name="status">
                            @foreach ($status_solicitudes as $state)
                                <option value="{{$state->id}}">{{$state->title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has("status"))
                            <span class="help-block">{{ $errors->first("status") }}</span>
                        @endif
                    </div>
                    <input type="hidden" name="id_client" value="{{$client->id}}">

                    <div class="form-group @if($errors->has(' fails')) has-error @endif">
                        <label for=" fails-field"> Fallas</label>
                        <textarea class="form-control" id=" fails-field" rows="3"
                                  name=" fails">{{ old(" fails") }}</textarea>
                        @if($errors->has(" fails"))
                            <span class="help-block">{{ $errors->first(" fails") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('others')) has-error @endif">
                        <label for="others-field">Otros</label>
                        <textarea class="form-control" id="others-field" rows="3"
                                  name="others">{{ old("others") }}</textarea>
                        @if($errors->has("others"))
                            <span class="help-block">{{ $errors->first("others") }}</span>
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a class="btn btn-link pull-right" href="{{ URL::previous() }}"><i
                                    class="glyphicon glyphicon-backward"></i> Back</a>
                    </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.date-picker').datepicker({});
    </script>
@endsection
