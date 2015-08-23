angular.module('postalApp').controller('ContactController', function ($scope, $http) {

    $scope.contact        = {};
    $scope.contactSuccess = null;
    $scope.buttonStatus   = 'Enviar';

    /* Functions */
    $scope.sendForm = function () {
        $scope.buttonStatus = 'Enviando....';

        $http.post('/message', { contact: $scope.contact })
            .then(formSuccess)
            .catch(formError);
    }

    function formSuccess() {
        $scope.contactSuccess = true;
    }

    function formError() {
        $scope.contactSuccess = false;
    }
});