@extends('layouts.app')
@section('content')
<div class="container-fluid" ng-app="docenteApp" ng-controller="dCalif" ng-init="init('{{ Auth::user()->dni }}')" >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Calificaciones </div>

                <div class="panel-body">
                    <button  ng-click="calificar('{{ Auth::user()->dni }}')">Calificar</button>
                    <button  ng-click="show(2)">Editar</button>

                    <!-- <button ng-click="show(2)">Agregar</button> -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif       
                                        
                    <div class="calif" ng-show="calif">
                    <div id="busqueda">
                        <select ng-model="grado">
                            <option value="">Grados</option>
                            <option  ng-repeat="gr in listas" value="<%gr.grado%>"><% gr.grado %></option>
                        </select>
                        <select ng-model="materia">
                            <option value="">Materias</option>
                            <option  ng-repeat="mt in listas" value="<%mt.materia%>"><% mt.materia %></option>
                        </select>

                    </div>
                        <table  class="table table-striped">
                            <caption>Calificaciones</caption>
                            <thead class="thead-inverse">
                                <tr>
                                    <th>DNI ALUMNO</th>
                                    <th>ALUMNO</th>
                                    <th>GRADO</th>
                                    <th>MATERIA</th>
                                    <th>CALIFICACION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="al in alumnos | filter:{grado,materia}">
                                    <td> <% al.dni_alumno %></td>
                                    <td> <% al.nombre %> <% al.apellidos %></td>
                                    <td> <% al.grado %></td>
                                    <td> <% al.materia %></td>
                                    <td> <input ng-model='al.cal' type="number" > <% al.cal %></td>
                                </tr>
                            </tbody>
                            <tfoot> <tr><td><button ng-click="calif(alumnos)">calificar</button></td></tr>
                            </tfoot>
                        </table>                        
                    </div>

                    <div  ng-show='edit'>
                        <table class="table table-striped">
                            <caption>Calificaciones</caption>
                            <thead>
                                <tr>
                                    <th>DNI ALUMNO</th>
                                    <th>ALUMNO</th>
                                    <th>GRADO</th>
                                    <th>MATERIA</th>
                                    <th>CALIFICACION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="clf in califs | filter:{grado,materia}">
                                    <td> <% clf.dni_alumnos %></td>
                                    <td> <% clf.nombre %> <% clf.apellidos %></td>
                                    <td> <% clf.grado %></td>
                                    <td> <% clf.materia %></td>
                                    <td> <input ng-model='clf.calificacion' type="number" > </td>
                                </tr>
                            </tbody>
                            <tfoot> <tr><td><button ng-click="updC(califs)">Guardar</button></td></tr>
                            </tfoot>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>
                   
    
</div>
 

@endsection
