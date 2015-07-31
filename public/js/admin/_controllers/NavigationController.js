adminApp.controller('NavigationController', function ($scope, $http, $stateParams, $state, shiftDataService, usedRequestService) {
    $('body').addClass('nav-open');
    $('nav').on('click', 'a', function () {
        $('body').removeClass('nav-open');
    });

    $scope.pendingShifts = 0;

    setInterval(updateNavigationIndicators, 10000);

    updateNavigationIndicators();

    /* Functions */
    function updateNavigationIndicators()
    {
        shiftDataService.getPendingShifts()
            .then(function (response) {
                $scope.pendingShifts = response.quantity;
            });

        usedRequestService.getPendingRequests()
            .then(function (response) {
                $scope.usedRequests = response.quantity;
            });
    }
});