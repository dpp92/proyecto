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
	$scope.grados = [];
	$scope.loading = false;
 	

 	$scope.init = function(){
 		$scope.list = true;
 		$scope.edit = false;
 		$scope.loading = true;

 		$http({
			method : 'GET',
			url : 'grado/lista'
		}).then(function successCallback(data, status, headers, config){
		    $scope.grados = data.data.grados;
		},function errorCallback(response) {
			console.log(response);
		});
 	};
 	$scope.show = function(i){
 		switch (i) {
 			case 1:
 				// statements_1
 				$scope.list= true;
 				$scope.add = false;
 				break;
 			case 2:
 				// statements_def
 				$scope.list= false;
 				$scope.add = true;
 				break;
 		}
 	};
 	$scope.addG = function(datos){
 		$scope.reset = {};
 		$http.post('grado',{"grado":datos.grado} ).then(function successCallback(data){
 				console.log(data);
 				$scope.add = false;
 				$scope.init();
 		},function error(response){
 			console.log(response);	
 		});
 	};
 	$scope.editG = function(index){
 		
 		$editG = $scope.grados[index];
 		$scope.slc = $editG;
 		console.log($editG);
 		$scope.edit = true;
 	};

 	$scope.updateG = function(datos){
 		console.log(datos);

 		$http.put('grado/'+datos.id,datos)
 		.then(function success(data, status, headers, config){
				console.log(data.data.succes);
				alert("Actualizacion Exitosa");
				$scope.edit  = false;
				$scope.init();
		},function error(error){
			console.log(error);
		});	
 	};

 	$scope.deleteG= function(index){
 		$gDel = $scope.grados[index].id;
 		console.log($gDel);
 		$http.delete('grado/'+$gDel)
			  .then(function successCallback(data, status, headers, config){
			  		console.log(data.data);
        			$scope.init();
		});
 	};



 	$scope.init();
});

var docenteApp = angular.module('docenteApp', []);

docenteApp.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

docenteApp.controller('dCtrl', function($scope, $http) {
	$scope.docentes =[];
	$scope.reset={};
	$scope.loading  = true;
	$scope.list = true;

	$scope.init = function(){
		$http.get('docente/lista')
		.then(function successCallback(data,status){
			$scope.docentes = data.data.docentes;
			console.log($scope.docentes);
		},function errorCallback(error){
			console.log(error);
		});
	};

	$scope.show = function(i){
		switch (i) {
			case 1:
				// statements_1
				$scope.lista = true;
				$scope.add   = false; 
				break;
			case 2:
				// statements_def
				$scope.lista = false;
				$scope.add   = true;
				break;
			case 3:
				$scope.pass = true;
		}
	};

	$scope.addD  = function(datos){
		console.log(datos);
		$http.post('docente',datos)
		.then(function successCallback(data,status){
			console.log(data);
			$scope.init();
		},function errorCallback(error){
			console.log(error);
		});
	};

	$scope.editD = function(index){
		$docente = $scope.docentes[index];
		$scope.slc = $docente;
		$scope.edit= true;
		$scope.pass = false;

	};

	$scope.updateD = function(datos){

		$http.put('docente/'+datos.id,datos)
		.then(function successCallback(data,status){
			console.log(data.data);
		},function errorCallback(response){
			console.log(response);
		});
	}

	$scope.deleteD = function(index){
		$docdni  = $scope.docentes[index].dni;

		$http.delete('docente/'+$docdni)
		.then(function successCallback(data, status, headers, config){
			  		console.log(data.data);
        			$scope.init();
        },function errorCallback(response){
			alert('Actualice las materias del docente para poder eliminar');
        });	
	};

	$scope.init();
});

docenteApp.controller('dCalif', function($scope, $http) {
	$scope.alumnos = [];
	cal  = {"cal":0};


	$scope.calificar = function(dni){
		console.log(dni);

		//function que permite recabar la relacion de alumnos materias del docente
		$http.get('califica/'+dni)
		.then(function successCallback(data,status){
			$scope.alumnos = data.data.alumnos;
			
			angular.forEach($scope.alumnos, function(value,key){
					value.cal =0;
			});

			console.log($scope.alumnos);
			// $scope.alumnos.push(cal);
			// console.log($scope.alumnos);
			$scope.listas  = data.data.matgr;
			// 	console.log(data.data.matgr);
		},function errorCallback(response){
			console.log(response)
		});//fin de function $http

	};

	$scope.calif = function (datos){
		console.log(datos);
		$http.post('calificar',angular.fromJson(datos))
		.then(function successCallback(data){
			console.log(data.data)
		},function errorCallback(response){
			console.log(response);
		});
	}

});


//alumnos appp

var alumnoApp = angular.module('alumnoApp', []);

alumnoApp.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

alumnoApp.controller('aCtrl', function($scope, $http) {
	$scope.alumnos =[];
	$scope.reset={};
	$scope.loading  = true;
	$scope.list = true;

	$scope.init = function(){
		$http.get('alumno/lista')
		.then(function successCallback(data,status){
			$scope.grados   = data.data.grados;
			$scope.alumnos = data.data.alumnos;
			console.log($scope.alumnos);
		},function errorCallback(error){
			console.log(error);
		});
	};

	$scope.show = function(i){
		switch (i) {
			case 1:
				// statements_1
				$scope.lista = true;
				$scope.add   = false; 
				break;
			case 2:
				// statements_def
				$scope.lista = false;
				$scope.add   = true;
				break;
			case 3:
				$scope.pass = true;
		}
	};

	$scope.addA  = function(datos){
		$scope.edit=false;
		console.log(datos);
		$http.post('alumno',datos)
		.then(function successCallback(data,status){
			console.log(data);
			$scope.init();
		},function errorCallback(error){
			console.log(error);
		});
	};

	$scope.editA = function(index){
		$docente = $scope.alumnos[index];
		$scope.slc = $docente;
		$scope.edit= true;
		$scope.pass = false;

	};

	$scope.updateA = function(datos){

		$http.put('alumno/'+datos.id,datos)
		.then(function successCallback(data,status){
			console.log(data.data);
			$scope.edit=false;
		},function errorCallback(response){
			console.log(response);
		});
	}


	$scope.deleteA = function(index){
		$aludni  = $scope.alumnos[index].dni;

		$http.delete('alumno/'+$aludni)
		.then(function successCallback(data, status, headers, config){
			  		console.log(data.data);
        			$scope.init();
        },function errorCallback(response){
			// alert('Actualice las materias del docente para poder eliminar');
			console.log(response);
        });	
	};

	$scope.init();
});