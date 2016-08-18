@extends('layouts.app')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Clients / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="panel-heading"> <b>Nuevo Cliente</b></div>
    <div class="panel-body">

        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('clients.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group @if($errors->has('first_name')) has-error @endif">
                        <label for="first_name-field">Nombre:</label>
                        <input type="text" id="first_name-field" name="first_name" class="form-control"
                               placeholder="Nombre" value="{{ old("first_name") }}"/>
                        @if($errors->has("first_name"))
                            <span class="help-block">{{ $errors->first("first_name") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                        <label for="last_name-field">Apellido:</label>
                        <input type="text" id="last_name-field" name="last_name" class="form-control"
                               placeholder="Apellido" value="{{ old("last_name") }}"/>
                        @if($errors->has("last_name"))
                            <span class="help-block">{{ $errors->first("last_name") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('phone_number')) has-error @endif">
                        <label for="phone_number-field">Numero Celular:</label>
                        <input type="tel" id="phone_number-field" name="phone_number" class="form-control"
                               placeholder="Numero Celular" value="{{ old("phone_number") }}"/>
                        @if($errors->has("phone_number"))
                            <span class="help-block">{{ $errors->first("phone_number") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                        <label for="email-field">Correo:</label>
                        <input type="email" id="email-field" name="email" class="form-control"
                               placeholder="Correo" value="{{ old("email") }}"/>
                        @if($errors->has("email"))
                            <span class="help-block">{{ $errors->first("email") }}</span>
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a class="btn btn-link pull-right" href="{{ route('clients.index') }}"><i
                                    class="glyphicon glyphicon-backward"></i> Back</a>
                    </div>
                </form>
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
