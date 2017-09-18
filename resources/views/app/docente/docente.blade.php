@extends('layouts.app')
@section('content')
<div class="container" ng-app="docenteApp" ng-controller="dCalif">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Calificaciones </div>

                <div class="panel-body">
                    <button ng-click="calificar('{{ Auth::user()->dni }}')">Calificar</button>
                    <button ng-click="show(2)">Agregar</button>
                    <!-- <input type="text" ng-model="dc.dn" value=""> <% dc.dn %> -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif       
                                        
                    <div class="lista" >
                    <div id="busqueda">
                        <select ng-model="grado">
                            <option value="">Grados</option>
                            <option  ng-repeat="gr in listas" value="<%gr.grado%>"><% gr.grado %></option>
                        </select>
                        <select ng-model="materia">
                            <option value="">Materias</option>
                            <option  ng-repeat="mt in listas" value="<%mt.materia%>"><% mt.materia %></option>
                        </select>

                        <% grado %>
                    </div>


                        <table>
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
                                <tr ng-repeat="al in alumnos | filter:{grado,materia}">
                                    <td> <% al.dni_alumno %></td>
                                    <td> <% al.nombre %> <% al.apellidos %></td>
                                    <td> <% al.grado %></td>
                                    <td> <% al.materia %></td>
                                    <td> <input ng-model='al.cal' type="number" > <% al.cal %></td>
                                </tr>
                            </tbody>
                            <button ng-click="calif(alumnos)">calificar</button>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
 

@endsection
