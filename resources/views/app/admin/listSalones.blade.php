@extends('layouts.app')

@section('content')
<script src="https://use.fontawesome.com/9ac82a5638.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alumnos Inscritos</div>

                <a href="{{url('alumno/create')}}" title=""><button class="btn btn-primary ">NUEVO</button></a>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>

    <!-- Listas  -->

HOLA                   
                <div class="container" ng-app="salonesApp" ng-controller="salonesController">
                    <h1>Index Salones</h1>
                    <div class="row">
                        <div class="col-md-4">
                        <input type='text' ng-model="salones.salon">
                        <button class="btn btn-primary btn-md"  ng-click="addsalones()">Add</button>
                        <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-striped">
                        <caption>Materias</caption>
                                <thead>
                                    <tr>
                                        <th>salone</th>
                                        <th>Nivel escolar</th>
                                    </tr>
                        </thead>
                           
                        <tbody>                    
                            <tr ng-repeat="salon in salones">

                                    <td><input type="checkbox" ng-true-value="1" ng-false-value="'0'" ng-model="salones.done" ng-change="updatesalones(salones)"></td>

                                    <td><% salon.id %></td>

                                    <td><button  ng-click="deletesalones($index)"> Eliminar</span></button></td>
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
