var app = angular.mode('app',[]);

app.config(function ($datosLista) {
	// body...
	$datosLista.$.when("alumno/lista",{
		controller : "homeController",
		templateUrl: "../templates/home.html"
	})
	
})