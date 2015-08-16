adminApp.controller('NavigationController', function ($scope, $http, $stateParams, $state) {
    $('body').addClass('nav-open');
    $('nav').on('click', 'a', function () {
        $('body').removeClass('nav-open');
    });
});