@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Materia</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- creamos el formulario de registro --}}

                    {!! Form::open(['route' => 'materia.store', 'method' => 'post', 'role' => 'form' ]) !!}
                                <div class="form-group">
                             {!! Form::label('clave_m', 'Clave' ) !!}
                                {!! Form::text('clave_m',old('clave'),['class' => 'form-control','required' => 'true']) !!}
                                 
                                </div>
                                <div class="form-group">
                                    {!! Form::label('materia', 'Materia' ) !!}
                                {!! Form::text('materia', old('nombre'),['class' => 'form-control','required' => 'true']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('horai', 'Hora Inicio' ) !!}
                                {!! Form::time('horai', old('horai'),['class' => 'form-control','required' => 'true']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('horaf', 'Hora Inicio' ) !!}
                                {!! Form::time('horaf',old('horaf'),['class' => 'form-control','required' => 'true']) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('docente', 'Docente') !!}
                                 
                                    {!! Form::select('docente', $docentes) !!}

                                </div>
                                <div class="form-group">
                                    <a href="{{route('materia.index')}}" class="btn btn-danger">Cancelar</a>
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
