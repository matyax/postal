var adminApp = angular.module('adminApp', ['ngResource', 'ui.router', 'angularFileUpload', 'ui.bootstrap']);

adminApp.config(function($stateProvider, $urlRouterProvider, $interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');

    //
    // For any unmatched url, redirect to /admin/landing
    $urlRouterProvider.otherwise('/dashboard');
    //
    // Now set up the states
    $stateProvider
        .state('dashboard', {
            url: '/dashboard',
            templateUrl: '/dashboard'
        });

    var resources = {
        "user"  : true,
        "work"  : true
    };

    for (var resource in resources) {
        setResourceRoutes(resource);
    }

    function setResourceRoutes(resource) {
        $stateProvider.state(resource + '_list', {
            url: '/' + resource + '/list:filters',
            templateUrl: '/' + resource,
            data: {
                resource: resource
            }
        });
        $stateProvider.state(resource + '_add', {
            url: '/' + resource + '/add',
            templateUrl: '/' + resource + '/create',
            data: {
                resource: resource
            }
        });
        $stateProvider.state(resource + '_edit', {
            url: '/' + resource + '/:id',
            templateUrl: function ($stateParams){
                return '/' + resource + '/' + $stateParams.id + '/edit';
            },
            data: {
                resource: resource
            }
        });
        $stateProvider.state(resource + '_view', {
            url: '/' + resource + '/:id/view',
            templateUrl: function ($stateParams){
                return '/' + resource + '/' + $stateParams.id;
            },
            data: {
                resource: resource
            }
        });
    }
});

angular.module('adminApp').directive('ckEditor', function() {
  return {
    require: '?ngModel',
    link: function(scope, elm, attr, ngModel) {
      var ck = CKEDITOR.replace(elm[0]);

      if (!ngModel) return;

      ck.on('pasteState', function() {
        scope.$apply(function() {
          ngModel.$setViewValue(ck.getData());
        });
      });

      ngModel.$render = function(value) {
        ck.setData(ngModel.$viewValue);
      };
    }
  };
});

$(function () {
    $('body').on('click', '.nav-tabs a', function (e) {
        e.preventDefault();
    });

    $("#nav-toogle-btn").click(function() {
        $("body").toggleClass("nav-open");
    });
});