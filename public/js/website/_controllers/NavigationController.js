angular.module('postalApp').controller('NavigationController', function ($scope, navigationService) {
    /* Functions */
    $scope.navigateTo = function ($event) {
        navigationService.navigateTo($event);
    }

    $scope.toggleMobileMenu = function(){
       if (! $("#mobile-menu-window").hasClass('open')) {
            $("body").removeClass("mobile-menu-open");
            $("#mobile-menu-window").addClass('open').show();
       } else {
            $("body").addClass("mobile-menu-open");
            $("#mobile-menu-window").removeClass('open').hide();
       }

    }
});