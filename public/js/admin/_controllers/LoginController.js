adminApp.controller('LoginController', function ($scope, $http) {
    $scope.message = '';

    $(function () {
        $('[type="email"]').focus();
    });

    $scope.doLogin = function () {

        $http.post('/api/login', $scope.login)
            .success(function (response) {

                if (response.success == true) {
                    return window.location.assign('/admin');
                }

                $scope.message = 'Usuario y/o contaseña incorrecta.';
            })
            .error(function () {
                $scope.message = 'Error desconocido.';
            });
    };
});