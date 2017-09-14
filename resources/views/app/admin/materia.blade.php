@extends('layouts.app')

@section('content')
<div class="container" ng-app="materiaApp" ng-controller="mCtrl">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif       

                    <div class="form">
                        <form name="formMateria">
                            <div class="form-group">
                                <label for="materia">Materia</label>
                                <input type="text" name="materia" ng-model="datos.materia">
                            </div>

                            <div class="form-group">
                                <label for="clave">Clave Materia</label>
                                <input type="text" name="clave" ng-model="datos.clave">
                            </div>

                            <div class="form-group">
                                <label for="horai">Hora inicio</label>
                                <input type="time" name="horai" ng-model="datos.horai">
                            </div>

                            <div class="form-group">
                                <label for="horaf">Hora fin</label>
                                <input type="time" name="horaf" ng-model="datos.horaf">
                            </div>

                            <div class="form-group">
                                <label for="docente">Docente</label>
                                <select ng-model="datos.docente">
                                    <option ng-repeat="d in docente" value="<% d.id %>"> <% d.nombre %> </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="grado">Grado</label>
                                <select ng-model="datos.grado">
                                    <option ng-repeat="g in grados" value="<% g.id %>"> <% g.grado %></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button ng-click="addM(datos)">Agregar</button>
                            </div>


                        </form>
                    </div>


                    <div>
                        <h2>Lista MATERIAS</h2>
                    </div>
                    <div class="lista" >
                        <table>
                            <caption>Lista de Materias</caption>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Materia</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="materia in materias">
                                    <td> <% materia.id %></td>
                                    <td> <% materia.materia %> </td>
                                    <td> <% materia.hora_inicio %></td>
                                    <td><% materia.hora_fin %></td>
                                    {{-- <td><button ng-click="updateS($index)"></button></td> --}}
                                    <td><button ng-click="deleteM($index)">Eliminar</button></td>
                                    
                                </tr>
                            </tbody>
                        </table>                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
