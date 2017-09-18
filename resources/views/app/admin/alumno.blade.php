@extends('layouts.app')

@section('content')

<div class="container-fluid" ng-app="alumnoApp" ng-controller="aCtrl">
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
                  
                        <form ng-show="add">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" ng-model="datos.nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" ng-model="datos.apellidos">
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" name="dni" ng-model="datos.dni">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="tel" class="form-control" name="telefono" ng-model="datos.telefono">
                            </div>
                            <div class="form-group">
                              <label for="grado">Grado</label>
                                <select class="form-control" name="grado" ng-model="slc.grado" ng-options=" a.id as a.grado  for a in grados">
                                <option >Seleccione el grado actual</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña login</label>
                                <input type="password" class="form-control" name="password" ng-model="datos.password">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" ng-click="addA(datos)">Agregar</button>
                            </div>

                        </form>
                    
                    <div class="form" ng-show="edit" >
                        <form name="formAlumno">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" ng-model="slc.nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" ng-model="slc.apellidos">
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" name="dni" ng-model="slc.dni">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="tel" class="form-control" name="telefono" ng-model="slc.telefono">
                            </div>
                            <div class="form-group">
                                <label for="grado">Grado</label>
                                <select name="grado" class="form-control" ng-model="slc.grado" ng-options=" a.id as a.grado  for a in grados">
                                </select>
                                <!-- <input type="text" name="grado" ng-model="slc.grado"> -->
                            </div>
                            <div class="form-group">
                                <button ng-click="show(3)"> Cambiar contraseña  </button>
                                <div ng-show="pass">
                                <label for="password">Contraseña login</label>
                                <input type="password" class="form-control"  name="password" ng-model="slc.password">
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" ng-click="updateA(slc)">Guardar</button>
                            </div>

                        </form>
                    </div>

                    
                    <div class="lista" ng-show="list" >
                        <table class="table table-striped">
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
                                    <td><button class="btn btn-warning btn-xs" ng-click="editA($index)" ><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        <button class="btn btn-danger btn-xs" ng-click="deleteA($index)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
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
