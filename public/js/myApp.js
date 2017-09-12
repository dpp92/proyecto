var app = angular.module('salonesApp', []);


app.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
 




app.controller('salonesController', function($scope, $http) {
 
	$scope.salones = [];
	$scope.loading = false;
 
	$scope.init = function() {
		$scope.loading = true;
		$http({
			method : 'GET',
			url : 'salones/lista'
		}).then(function successCallback(data, status, headers, config){
			
			$scope.salones = data;
		    $scope.loading = false;
		    console.log($scope.salones);

		},function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			  });
 
	}

	$scope.addsalones = function() {
				$scope.loading = true;
 
		$http.post('salones', {
			title: $scope.salones.title,
			done: $scope.salones.done
		}).success(function(data, status, headers, config) {
			$scope.saloness.push(data);
			$scope.salones = '';
				$scope.loading = false;
 
		});
	};
 
	$scope.updatesalones = function(salones) {
		$scope.loading = true;
 
		$http.put('salones/' + salones.id, {
			title: salones.title,
			done: salones.done
		}).success(function(data, status, headers, config) {
			salones = data;
				$scope.loading = false;
 
		});;
	};
 
	$scope.deletesalones = function(index) {
		$scope.loading = true;
 
		var salones = $scope.salones[index];
 
		$http.delete('salones/' + salones.id)
			.success(function() {
				$scope.salones.splice(index, 1);
					$scope.loading = false;
 
			});;
	};
 
 
	$scope.init();
 
});