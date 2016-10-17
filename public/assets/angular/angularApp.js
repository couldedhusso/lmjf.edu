var mainApp = angular.module('mainApp', []);

mainApp.config(['$interpolateProvider', '$locationProvider',
  function($interpolateProvider, $locationProvider) {
    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });
  }
]);

mainApp.controller("mainController", ['$scope',  function($scope) {
    
}]);
