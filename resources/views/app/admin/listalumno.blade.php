@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alumnos Inscritos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
            <table class="table">
                <caption>Alumnos</caption>
                <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Grado Inscrito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>data</td>

                    </tr>
                
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
