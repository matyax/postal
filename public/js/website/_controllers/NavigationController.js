angular.module('postalApp').controller('NavigationController', function ($scope, navigationService) {
    /* Functions */
    $scope.navigateTo = function ($event) {
        navigationService.navigateTo($event);
    }

    $scope.toggleMobileMenu = function(){
       $("#mobile-menu-window").toggleClass("open");
       $("body").toggleClass("mobile-menu-open");
    }
});