@extends('layouts.app')

@section('content')

<div class="container" ng-app="gradoApp" ng-controller="gCtrl">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Grados</div>

                <div class="panel-body">
                    <button ng-click="show(1)">Lista</button>
                    <button ng-click="show(2)">Agregar</button>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif       
                    <div class="form" ng-show="add" >
                        <form name="formGrados">
                            <div class="form-group">
                                <label for="grado">Materia</label>
                                <input type="text" name="grado" ng-model="datos.grado">
                            </div>

                            <div class="form-group">
                                <button ng-click="addG(datos)">Agregar</button>
                            </div>


                        </form>
                    </div>

                    
                    <div class="lista" ng-show="list" >
                        <table>
                            <caption>Lista de Materias</caption>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Grado</th>
                                </tr>
                            </thead>
                            <tbody>

                            <!-- Prueba de templates para editar  -->
                            
                             <tr ng-repeat="g in grados">
                                    <td ><% g.grado %></td>
                                    <td><button ng-click="editG($index)" >Editar</button></td>
                                    <td><button ng-click="deleteG($index)">Eliminar</button></td>
                                </tr> 
                            </tbody>
                            <tfoot ng-show="edit">
                                <tr  id="edit" >
                                    <td> <input type="text" ng-model = "slc.grado " />  </td>
                                   
                                    <td><button ng-click="updateG(slc)" >save</button></td>
                                 </tr>
                            </tfoot>

                        </table>                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</div>
 

@endsection
