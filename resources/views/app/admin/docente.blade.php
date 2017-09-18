@extends('layouts.app')

@section('content')

<div class="container-fluid" ng-app="docenteApp" ng-controller="dCtrl">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Docentes</div>

                <div class="panel-body">
                    <button ng-click="show(1)">Lista</button>
                    <button ng-click="show(2)">Agregar</button>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif       
                    <div class="form" ng-show="add" >
                        <form name="formDocente">
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
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" name="titulo" ng-model="datos.titulo">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña login</label>
                                <input type="password" class="form-control" name="password" ng-model="datos.password">
                            </div>

                            <div class="form-group">
                                <button  class="btn btn-primary"  ng-click="addD(datos)">Agregar</button>
                            </div>


                        </form>
                    </div>
                    <div class="form" ng-show="edit" >
                        <form name="formDocente">
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
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" name="titulo" ng-model="slc.titulo">
                            </div>
                            <div class="form-group">
                                <button ng-click="show(3)"> Cambiar contraseña  </button>
                                <div ng-show="pass">
                                <label for="password">Contraseña login</label>
                                <input type="text" class="form-control" name="password" ng-model="slc.password">
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success"  ng-click="updateD(slc)">Guardar</button>
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
                            
                             <tr ng-repeat="d in docentes">
                                    <td ><% d.dni %></td>
                                    <td ><% d.nombre %> <% d.apellidos %></td>
                                    <td ><% d.titulo %></td>
                                    <td><% d.telefono %></td>
                                    <td><button class="btn btn-warning btn-xs" ng-click="editD($index)" ><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        <button class="btn btn-danger btn-xs" ng-click="deleteD($index)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    
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
