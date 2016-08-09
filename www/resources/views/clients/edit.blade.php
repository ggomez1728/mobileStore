@extends('layouts.app')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Clients / Edit #{{$client->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')
    <div class="panel-heading">Editar Usuario</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('clients.update', $client->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group @if($errors->has('identify')) has-error @endif">
                        <label for="identify-field">Identify</label>
                        <input type="text" id="identify-field" name="identify" class="form-control"
                               value="{{ is_null(old("identify")) ? $client->identify : old("identify") }}"/>
                        @if($errors->has("identify"))
                            <span class="help-block">{{ $errors->first("identify") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('first_name')) has-error @endif">
                        <label for="first_name-field">First_name</label>
                        <input type="text" id="first_name-field" name="first_name" class="form-control"
                               value="{{ is_null(old("first_name")) ? $client->first_name : old("first_name") }}"/>
                        @if($errors->has("first_name"))
                            <span class="help-block">{{ $errors->first("first_name") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('last_name')) has-error @endif">
                        <label for="last_name-field">Last_name</label>
                        <input type="text" id="last_name-field" name="last_name" class="form-control"
                               value="{{ is_null(old("last_name")) ? $client->last_name : old("last_name") }}"/>
                        @if($errors->has("last_name"))
                            <span class="help-block">{{ $errors->first("last_name") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('phone_number')) has-error @endif">
                        <label for="phone_number-field">Phone_number</label>
                        <input type="text" id="phone_number-field" name="phone_number" class="form-control"
                               value="{{ is_null(old("phone_number")) ? $client->phone_number : old("phone_number") }}"/>
                        @if($errors->has("phone_number"))
                            <span class="help-block">{{ $errors->first("phone_number") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                        <label for="email-field">Email</label>
                        <input type="email" id="email-field" name="email" class="form-control"
                               value="{{ is_null(old("email")) ? $client->email : old("email") }}"/>
                        @if($errors->has("email"))
                            <span class="help-block">{{ $errors->first("email") }}</span>
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{  URL::previous()  }}"><i
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
