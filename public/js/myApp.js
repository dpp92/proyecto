var app = angular.module('salonApp', []);


app.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
 
app.controller('sCtrl', function($scope, $http) {
 
	$scope.salones = [];
	$scope.loading = false;
 
	$scope.init = function() {
		$scope.add = false;
		$scope.list= true;
		$scope.edit = false;
		$scope.grados = [];
		$scope.loading = true;
		$http({
			method : 'GET',
			url : 'salon/lista'
		}).then(function successCallback(data, status, headers, config){
			$scope.grados  = data.data.grados;
			$scope.salones = data.data.salones;
		    $scope.loading = false;
		    console.log($scope.salones);
		},function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
		});
	}

	$scope.show = function(i){
		switch (i) {
			case 1:
				// statements_1
				$scope.list = true;
				$scope.add = false;

				break;
			case 2:
				// statements_def
				$scope.add = true;
				$scope.list = false;

				break;
		}
	};


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
		$scope.init(); 
	};
 
 	$scope.editS = function(index){
 			$scope.loading= true;
			$salon = $scope.salones[index];
			$scope.slc = $salon;
			console.log($scope.slc);
			$scope.loading= false;
			$scope.edit = true; 
 	}

	$scope.updateS = function(update) {

		console.log(update);
		$http.put('salon/'+update.id,update)
		.then(function success(data, status, headers, config){
				console.log(data.succes);
				alert("Actualizacion Exitosa");
				$scope.list  = false;
		},function error(error){
			console.log(error);
		});		
		$scope.init();
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
		$scope.list = false;
		$scope.add = false;
		$scope.edit = false;
		$scope.loading = true;
		$http({
			method : 'GET',
			url : 'materia/lista'
		}).then(function successCallback(data, status, headers, config){
					 console.log(data);
			
			$scope.materias = data.data.materias;
			$scope.grados   = data.data.grados;
			$scope.docente = data.data.docente;
		    $scope.loading = false;		   
	},function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response);
			  });
	};

	
	$scope.show = function(i){

		switch (i) {
			case 1:
				// Lista
				$scope.add = false;
				$scope.list  = true; 
				break;
			case 2:
				//Agregar
				$scope.add = true;
				$scope.list  = false;
				$scope.edit = false; 
				break;
		}
		$scope.isShown= true;
	}
	$scope.addM = function(datos) {
		$scope.loading = true;
		$scope.reset = {};
		console.log(datos);
		$http.post('materia',datos )
		.then(function successCallback(data, status, headers, config){
					 console.log(data);
					 $scope.datos = angular.copy($scope.reset); 
					 $scope.init();
		},function errorCallback(response) {
			   alert('Error \n Revise los datos ingresados');
		});
		$scope.init();
	};

	// Agregandop la function editar 
		
	$scope.editM = function(index){
			$scope.loading= true;
			$materia = $scope.materias[index];
			$scope.slc = $materia;
			$scope.loading= false;
			$scope.edit = true; 
	}


	$scope.updateM = function(update){
		//imprimir los datos modificados
		console.log(update);
		//enviar los datos a update de laravel
		$http.put('materia/'+update.clave_materia,update)
		.then(function success(data, status, headers, config){
				console.log(data.succes);
				alert("Actualizacion Exitosa");
				$scope.list  = false;
		},function error(error){
			console.log(error);
		});		
		$scope.init();
	}

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


//app Para grados
var gradoApp = angular.module('gradoApp', []);

gradoApp.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

gradoApp.controller('gCtrl', function($scope, $http) {
	$scope.salones = [];
	$scope.loading = false;
 	

 	$scope.init = function(){
 		$scope.list = true;
 		$scope.loading = true;
 		$scope.datos = [];

 		$http({
			method : 'GET',
			url : 'grado/lista'
		}).then(function successCallback(data, status, headers, config){
		   
		    $scope.grados = data.data.grados;
		     console.log(data.data.grados);
		},function errorCallback(response) {
			console.log(response);
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
		});
 	};

 	$scope.addG = function(datos){
 		$scope.reset = {};
 		console.log(datos);
 		$http.post('grado', datos).then(function successCallback(data){
 				console.log(data);
 		},function error(response){
 			console.log(response);	
 		});
 	};


 	$scope.init();
});