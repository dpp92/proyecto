@extends('layouts.app')

@section('content')
<script src="https://use.fontawesome.com/9ac82a5638.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Materias </div>
                <a href="{{url('materia/create')}}" title=""><button class="btn btn-primary ">NUEVO</button></a>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
            <table class="table">
                <caption>Materias</caption>
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Materia</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Docente</th>
                    </tr>
                </thead>
                <tbody>
               
                @foreach($materias as $i)
                    <tr>
                        <td>{{$i->clave_materia}}</td>
                        <td>{{$i->materia}}</td>
                        <td>{{$i->hora_inicio}}</td>
                        <td>{{$i->hora_fin}}</td>
                        <td>{{$i->nombre}}</td>
                        <td data-toggle="tooltip"><a href="{{route('materia.edit', $i->clave_materia)}}" title="" class="btn btn-primary btn-xs" data-title="Edit" ><span class="fa fa-pencil" aria-hidden="true"></span></a></td>
                       
                            <form method="delete" action="/materia/{{ $i->clave_materia }}">
                                     {{ method_field('DELETE') }}    

                             <td><button type="submit" class="btn btn-danger btn-xs"><span  class="fa fa-trash-o" aria-hidden="true"></span></button></td>

                            </form>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
