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

                    {!! Form::open(['route' => 'alumno.store', 'method' => 'post', 'role' => 'form' ]) !!}
                            <div class="form-group">

                                {!! Form::label('nombre', 'Nombre(s)' ) !!}
                                {!! Form::text('nombre', old('nombre'),['class' => 'form-control','required' => 'true']) !!}
                                 @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('apellidos', 'Apellidos') !!}
                                {!! Form::text('apellidos', old('apellidos'), ['class' => 'form-control','required' => 'true']) !!}
                                @if ($errors->has('apellidos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('dni', 'Matricula') !!}
                                {!! Form::text('dni', old('dni'), ['class' => 'form-control', 'required' => 'true','min-length' =>'5']) !!}
                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('telefono','Telefóno') !!}
                                {!! Form::text('telefono', old('telefono') , ['class' => 'form-control','placeholder' => '000-000-0000']) !!}
                            </div>
                            
                            <div class='form-inline'>
                                <div class="form-group ">
                                    {!! Form::label('grado', 'Grado a inscribir') !!}
                                 
                                    {!! Form::select('grado', $grados) !!}

                                </div>
                                <div class="form-group ">
                                    {!! Form::label('password', 'Contraseña') !!}
                                    {!! Form::password('password', old('password'), ['class' => 'form-control','required' => 'true']) !!}
                                </div>

                            </div>
                                <div class="form-group">
                                    <a href="{{route('admin.index')}}" class="btn btn-danger">Cancelar</a>
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
