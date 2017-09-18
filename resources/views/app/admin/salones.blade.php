@extends('layouts.app')

@section('content')
<div class="container-fluid" ng-app="salonApp" ng-controller="sCtrl">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Salones</div>
                    <button class="thumbnail" ng-click="show(1)">Lista</button>
                    <button class="thumbnail" ng-click="show(2)">Agregar</button>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form">
                    <form name="formSalon" ng-show="add">
                        <div class="form-group">
                            <label for="name">Nombre Salon</label>
                            <input type="text" class="form-control" name="name" ng-model="datos.salon">
                        </div>
                        <div class="form-group">
                            <label for="grado">Grado</label>
                        <select class="form-control" ng-model="datos.grado">
                            <option ng-repeat="x in grados" value="<% x.id %>"> <% x.grado %></option>
                        </select>           
                        <div class="from-group">
                            <button type="submit" class="form-control" ng-click="addsalones(datos)">Añadir</button>
                        </div>                              
                        </div>
                    </form>

                </div>

                <div class="lista" ng-show="list" >
                        <table class="table table-stripped">
                            <caption>Lista de Salones</caption>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre Salon</th>
                                    <th>Grado Asignado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="salon in salones">
                                    <td><% salon.id %></td>
                                    <td> <% salon.salon %> </td>
                                    <td><% salon.grados_id %></td>
                                    <td> <button class="btn btn-warning btn-xs" ng-click="editS($index)"> <i class="fa fa-pencil" aria-hidden="true"></i>
</button>
                                    <button class="btn btn-danger btn-xs" ng-click="deleteS($index)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    
                                </tr>
                            </tbody>
                            <tfoot ng-show="edit">
                                <tr>
                                    <td>
                                        <input class="form-control" type="text" ng-model="slc.salon">
                                    </td>
                                    <td>
                                        <select class="form-control" ng-model="slc.grados_id" ng-options="g.id as g.grado for g in grados"></select>
                                    </td>
                                    <td>
                                        <button class="btn btn-succes btn-sm " ng-click="updateS(slc)">Guardar</button>
                                    </td>
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
