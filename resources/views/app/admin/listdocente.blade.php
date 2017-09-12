@extends('layouts.app')

@section('content')
<script src="https://use.fontawesome.com/9ac82a5638.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Docentes</div>

                 <a href="{{url('docente/create')}}" title=""><button class="btn btn-primary ">NUEVO</button></a>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
            <table class="table">
                <caption>Docentes</caption>
                <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Materias</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

               
                @foreach($lista as $i)
                    <tr>
                        <td>{{$i->dni}}</td>
                        <td>{{$i->nombre}}</td>
                        <td>{{$i->apellidos}}</td>
                        <td>{{$i->telefono}}</td>
                        <td>
                        @foreach($lmat as $m)
                            @if($m->id_docente == $i->id)
                                {{$m->materia . '  |  '}} 
                            @endif
                        @endforeach
                         </td>
                        <td data-toggle="tooltip"><a href="{{route('docente.edit', $i->dni)}}" title="" class="btn btn-primary btn-xs" data-title="Edit" ><span class="fa fa-pencil" aria-hidden="true"></span></a></td>

                        
                        <td data-toggle="tooltip"><a href="{{url('docente/'.$i->dni.'/destroy')}}" title="" class="btn btn-danger btn-xs" data-title="Edit" ><span  class="fa fa-trash-o" aria-hidden="true"></span></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
