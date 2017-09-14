@extends('layouts.app')

@section('content')
<div class="container" ng-app="salonApp" ng-controller="sCtrl">
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
                    <form name="formSalon">
                        <div class="form-group">
                            <label for="name">Nombre Salon</label>
                            <input type="text" name="name" ng-model="datos.salon">
                        </div>
                        <div class="form-group">
                            <label for="grado">Grado</label>
                        <select ng-model="datos.grado">
                            <option ng-repeat="x in grados" value="<% x.id %>"> <% x.nombre %></option>
                        </select>           
                        <div class="from-group">
                            <button type="submit" ng-click="addsalones(datos)">Añadir</button>
                        </div>                              
                        </div>
                    </form>

                </div>

                    <div>
                        <h2>Salones</h2>
                    </div>
                    <div class="lista" >
                        <table>
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
                                    <td> <a href="salon/" title="Editar"> <span>Edit</span></a></td>
                                    <td><button ng-click="deleteS($index)">Eliminar</button></td>
                                    
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
