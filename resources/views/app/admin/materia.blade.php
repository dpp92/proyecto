@extends('layouts.app')

@section('content')

<div class="container-fluid" ng-app="materiaApp" ng-controller="mCtrl">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Materias</div>

                <div class="panel-body">
                    <button ng-click="show(1)">Lista</button>
                    <button ng-click="show(2)">Agregar</button>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif       

                    <div class="form" ng-show="add">
                        <form name="formMateria">
                            <div class="form-group">
                                <label for="materia">Materia</label>
                                <input type="text" class="form-control" name="materia" ng-model="datos.materia">
                            </div>

                            <div class="form-group">
                                <label for="clave">Clave Materia</label>
                                <input type="text" class="form-control" name="clave" ng-model="datos.clave">
                            </div>

                            <div class="form-group">
                                <label for="horai">Hora inicio</label>
                                <input type="time" class="form-control" name="horai"  placeholder="HH:mm" ng-model="datos.horai" >

                            </div>
                            <div class="form-group">
                                <label for="horaf">Hora fin</label>
                                <input type="time"  class="form-control" name="horaf" ng-model="datos.horaf" >
                            </div>

                            <div class="form-group">
                                <label for="docente">Docente</label>
                                <select class="form-control" ng-model="datos.docente">
                                    <option ng-repeat="d in docente" value="<% d.id %>"> <% d.nombre %> </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="grado">Grado</label>
                                <select class="form-control" ng-model="datos.grado">
                                    <option ng-repeat="g in grados"  value="<% g.id %>"> <% g.grado %></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" ng-click="addM(datos)">Agregar</button>
                            </div>


                        </form>
                    </div>

                    
                    <div class="lista" ng-show="list" >
                        <table class="table table-stripped">
                            <caption>Lista de Materias</caption>
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


                            <!-- Prueba de templates para editar  -->
                          
                            
                             <tr ng-repeat="materia in materias">
                                    <td><% materia.clave_materia %></td>
                                    <td> <% materia.materia %> </td>
                                    <td> <% materia.hora_inicio %></td>
                                    <td><% materia.hora_fin %></td>
                                    <td><% materia.nombre + materia.apellidos %> </td>
                                    
                                    <td><button class="btn btn-warning btn-xs" ng-click="editM($index)"><i class="fa fa-pencil" aria-hidden="true"></i></button><button class="btn btn-danger btn-xs" ng-click="deleteM($index)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                </tr> 
                            </tbody>
                            <tfoot ng-show="edit">
                                <tr  id="edit" >
                                    <td> <input type="text" ng-model = "slc.clave_materia " />  </td>
                                    <td> <input type="text" ng-model = "slc.materia "/>            </td>
                                    <td> <input type="text" ng-model = "slc.hora_inicio "/>         </td>
                                    <td> <input type="text" ng-model = "slc.hora_fin "/>            </td>

                                    <td> 
                                    <!-- <select ng-model="slc.id_docente">
                                         <option value="">- Select an option -</option>
                                           <option 
                                           ng-options = "<%d.id == slc.id_docente%>"
                                           ng-repeat="d in docente" value="<% d.id %>"> <% d.nombre %> </option>                               
                                         </select>-->

                                        <select ng-model="slc.id_docente"   ng-options=" d.id as d.nombre  for d in docente  "  ></select>
                                        
                                    </td>
                                    <td><button class="btn btn-succes" ng-click="updateM(slc)" >Guardar</button></td>
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
