@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Alumno</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- creamos el formulario de registro --}}

                    {!! Form::open(['route' => ['alumno.update',$alumno->dni_alumno], 'method' => 'patch', 'role' => 'form' ]) !!}
                            <div class="form-group">

                                {!! Form::label('nombre', 'Nombre(s)' ) !!}
                                {!! Form::text('nombre', $alumno->nombre,['class' => 'form-control','required' => 'true']) !!}
                                 @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('apellidos', 'Apellidos') !!}
                                {!! Form::text('apellidos', $alumno->apellidos, ['class' => 'form-control','required' => 'true']) !!}
                                @if ($errors->has('apellidos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('dni', 'Matricula') !!}
                                {!! Form::text('dni', $alumno->dni, ['class' => 'form-control', 'required' => 'true','min-length' =>'5']) !!}
                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('telefono','Telefóno') !!}
                                {!! Form::text('telefono',$alumno->telefono , ['class' => 'form-control','placeholder' => '000-000-0000']) !!}
                            </div>
                            
                            
                                <div class="form-group">
                                    <a href="{{route('alumno.index')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>

                                </div>
                            </div>
                        </div>

                    {!! Form::close() !!}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
