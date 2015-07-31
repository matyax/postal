adminApp.factory('UIService', [function($http) {
    return new UIService();

    function UIService () {
        this.showSpinner = function () {
            $('#dashboardIcon').hide();
            $('#loadingDisplay').show();
        };

        this.hideSpinner = function () {
            $('#loadingDisplay').hide();
            $('#dashboardIcon').show();
        }
    }
}]);