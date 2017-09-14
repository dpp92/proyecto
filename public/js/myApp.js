var app = angular.module('salonApp', []);


app.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
 
app.controller('sCtrl', function($scope, $http) {
 
	$scope.salones = [];
	$scope.loading = false;
 
	$scope.init = function() {
		$scope.grados = [];
		$scope.loading = true;
		$http({
			method : 'GET',
			url : 'salon/lista'
		}).then(function successCallback(data, status, headers, config){
			$scope.grados  = data.data.grados;
			$scope.salones = data.data.salones;
		    $scope.loading = false;
		    console.log($scope.grados);
		},function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			  });
	}

	$scope.addsalones = function(datos) {
		$scope.loading = true;
		$scope.reset = {};
		console.log(datos);
		$http.post('salon', datos)
		.then(function successCallback(data, status, headers, config){
					 alert("Se ha creado el salon");
			},function errorCallback(response) {
			   console.log(response);
			});
		$scope.datos = angular.copy($scope.reset); 
	};
 
	$scope.updateS = function(index) {

		console.log(index);
		// $scope.loading = true;
 
		// $http.put('salones/' + salones.id, {
		// 	title: salones.title,
		// 	done: salones.done
		// }).success(function(data, status, headers, config) {
		// 	salones = data;
		// 		$scope.loading = false;
 	};
 
	$scope.deleteS = function (index) {
		// body...
		$scope.loading = true;
 
		var salon = $scope.salones[index];
		console.log(salon.id);
		$http.delete('salon/'+salon.id)
			  .then(function successCallback(data, status, headers, config){
			  		console.log(data.data);
			  });
        $scope.init();
	};

 
 
	$scope.init();
 
});




// Creamos materiaApp

var materiaApp = angular.module('materiaApp', []);

materiaApp.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

materiaApp.controller('mCtrl', function ($scope,$http) {
	$scope.materias = [];
	$scope.loading = false;
 
	$scope.init = function() {
		$scope.loading = true;
		$http({
			method : 'GET',
			url : 'materia/lista'
		}).then(function successCallback(data, status, headers, config){
			$scope.materias = data.data.materias;
			$scope.grados   = data.data.grados;
			$scope.docente = data.data.docente;
		    $scope.loading = false;		   
	},function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			  });
	}

	$scope.addM = function(datos) {
		$scope.loading = true;
		$scope.reset = {};
		console.log(datos);
		console.log(datos.horai.getTime());
		// $http.post('materia', datos)
		// .then(function successCallback(data, status, headers, config){
		// 			 console.log(data);
		// 	},function errorCallback(response) {
		// 	   console.log(response);
		// 	});
		// $scope.datos = angular.copy($scope.reset); 
	};


	$scope.deleteM = function (index) {
		// body...
		$scope.loading = true;
 
		var materia = $scope.materias[index];
		console.log(materia.id);
		$http.delete('materia/'+materia.id)
			  .then(function successCallback(data, status, headers, config){
			  		console.log(data.data);
			  });
        $scope.init();
	};

	$scope.init();
});
