@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Materias</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['route' => ['materia.update',$materias->clave_materia], 'method' => 'patch', 'role' => 'form' ]) !!}
                                <div class="form-group">

                                {!! Form::label('clave_m', 'Clave' ) !!}
                                {!! Form::text('clave_m', $materias->clave_materia,['class' => 'form-control','readonly' => 'true']) !!}
                                 
                                </div>
                                <div class="form-group">
                                    {!! Form::label('materia', 'Materia' ) !!}
                                {!! Form::text('materia', $materias->materia,['class' => 'form-control','required' => 'true']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('horai', 'Hora Inicio' ) !!}
                                {!! Form::time('horai', $materias->hora_inicio,['class' => 'form-control','required' => 'true']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('horaf', 'Hora Inicio' ) !!}
                                {!! Form::time('horaf', $materias->hora_fin,['class' => 'form-control','required' => 'true']) !!}
                                </div>

                                <div class="form-group ">
                                    {!! Form::label('docente', 'Docente') !!}
                                 
                                    {!! Form::select('docente', $docentes) !!}

                                </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('materia.index')}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>

                                </div>
                            </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
