angular.module('postalApp', ['ngResource', 'ui.router'])
    .config(function($stateProvider, $urlRouterProvider, $interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });