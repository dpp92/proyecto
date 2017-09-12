@extends('app')
@section('content')
<div class="container" ng-app="salonesApp" ng-controller="salonesController">
	<h1>Index Salones</h1>
	<div class="row">
		<div class="col-md-4">
			<input type='text' ng-model="salones.title">
			<button class="btn btn-primary btn-md"  ng-click="addsalones()">Add</button>
			<i ng-show="loading" class="fa fa-spinner fa-spin"></i>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<table class="table table-striped">
				<tr ng-repeat='salones in salon'>
					<td><input type="checkbox" ng-true-value="1" ng-false-value="'0'" ng-model="salones.done" ng-change="updatesalones(salones)"></td>
					<td><% salones.title %></td>
					<td><button class="btn btn-danger btn-xs" ng-click="deletesalones($index)">  <span class="glyphicon glyphicon-trash" ></span></button></td>
				</tr>
			</table>
		</div>
	</div>
</div>
 