@extends('layouts.app')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Solicitudes / Edit #{{$solicitude->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="panel-heading">Welcome</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('solicitudes.update', $solicitude->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group @if($errors->has('mobile')) has-error @endif">
                        <label for="mobile-field">Mobile</label>
                        <select class="form-control" name="mobile">
                            @foreach ($mobiles as $mobil)
                                @if($mobil->id == $solicitude->mobile)
                                    <option value="{{$mobil->id}}" selected>
                                @else
                                    <option value="{{$mobil->id}}">
                                        @endif
                                        {{$mobil->name}}
                                    </option>
                                    @endforeach
                        </select>
                        @if($errors->has("mobile"))
                            <span class="help-block">{{ $errors->first("mobile") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                        <label for="status-field">Status</label>
                        <select class="form-control" name="status">
                            @foreach ($status_solicitudes as $state)
                                @if($state->id == $solicitude->status)
                                    <option value="{{$state->id}}" selected>
                                @else
                                    <option value="{{$state->id}}">
                                        @endif
                                        {{$state->title}}
                                    </option>
                                    @endforeach
                        </select>
                        @if($errors->has("status"))
                            <span class="help-block">{{ $errors->first("status") }}</span>
                        @endif
                    </div>

                    <input type="hidden"  name="id_client" value="{{$solicitude-> id_client}}">

                    <div class="form-group @if($errors->has('fails')) has-error @endif">
                        <label for="fails-field"> fails</label>
                        <textarea class="form-control" id="fails-field" rows="3"
                                  name="fails">{{ is_null(old("fails")) ? $solicitude-> fails : old("fails") }}</textarea>
                        @if($errors->has("fails"))
                            <span class="help-block">{{ $errors->first("fails") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('others')) has-error @endif">
                        <label for="others-field">Others</label>
                        <textarea class="form-control" id="others-field" rows="3"
                                  name="others">{{ is_null(old("others")) ? $solicitude->others : old("others") }}</textarea>
                        @if($errors->has("others"))
                            <span class="help-block">{{ $errors->first("others") }}</span>
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ URL::previous() }}"><i
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
