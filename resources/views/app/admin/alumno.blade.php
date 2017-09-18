@extends('layouts.app')

@section('content')

<div class="container" ng-app="alumnoApp" ng-controller="aCtrl">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alumnos</div>

                <div class="panel-body">
                    <button ng-click="show(1)">Lista</button>
                    <button ng-click="show(2)">Agregar</button>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif       
                    <div class="form" ng-show="add" >
                        <form name="formAlumno">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" ng-model="datos.nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" name="apellidos" ng-model="datos.apellidos">
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" name="dni" ng-model="datos.dni">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="tel" name="telefono" ng-model="datos.telefono">
                            </div>
                            <div class="form-group">
                              <label for="grado">Grado</label>
                                <select name="grado" ng-model="slc.grado" ng-options=" a.id as a.grado  for a in grados">
                                <option >Seleccione el grado actual</option>
                                </select>
                                <input type="text" name="grado" ng-model="slc.grado">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña login</label>
                                <input type="password" name="password" ng-model="datos.password">
                            </div>

                            <div class="form-group">
                                <button ng-click="addA(datos)">Agregar</button>
                            </div>

                        </form>
                    </div>
                    <div class="form" ng-show="edit" >
                        <form name="formAlumno">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" ng-model="slc.nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" name="apellidos" ng-model="slc.apellidos">
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" name="dni" ng-model="slc.dni">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="tel" name="telefono" ng-model="slc.telefono">
                            </div>
                            <div class="form-group">
                                <label for="grado">Grado</label>
                                <select name="grado" ng-model="slc.grado" ng-options=" a.id as a.grado  for a in grados">
                                </select>
                                <!-- <input type="text" name="grado" ng-model="slc.grado"> -->
                            </div>
                            <div class="form-group">
                                <button ng-click="show(3)"> Cambiar contraseña  </button>
                                <div ng-show="pass">
                                <label for="password">Contraseña login</label>
                                <input type="text" name="password" ng-model="slc.password">
                                </div>
                            </div>

                            <div class="form-group">
                                <button ng-click="updateA(slc)">Guardar</button>
                            </div>

                        </form>
                    </div>

                    
                    <div class="lista" ng-show="list" >
                        <table>
                            <caption>Lista de Docentes</caption>
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>NOMBRE</th>
                                    <th>TITULO</th>
                                    <th>TELEFONO</th>
                                </tr>
                            </thead>
                            <tbody>

                            <!-- Prueba de templates para editar  -->
                            
                             <tr ng-repeat="a in alumnos">
                                    <td ><% a.dni %></td>
                                    <td ><% a.nombre %> <% a.apellidos %></td>
                                    <td ><% a.titulo %></td>
                                    <td><% a.telefono %></td>
                                    <td><button ng-click="editA($index)" >Editar</button></td>
                                    <td><button ng-click="deleteA($index)">Eliminar</button></td>
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
