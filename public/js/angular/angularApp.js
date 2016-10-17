var App = angular.module('mainApp', []);

App.config(['$interpolateProvider', '$locationProvider',
  function($interpolateProvider, $locationProvider) {

    $interpolateProvider.startSymbol('{>');
    $interpolateProvider.endSymbol('<}');

    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });
  }
]);

App.controller("mainController", ['$scope',  function($scope) {
  
}]);
