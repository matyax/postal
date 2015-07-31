adminApp.controller('ListController', function ($scope, $http, $stateParams, $state) {
    var resource = $state.current.data.resource;

    $scope.models   = [];
    $scope.search   = search;
    $scope.filters  = $scope.filters || {};

    $scope.orderByField     = 'id';
    $scope.orderByDirection = 'DESC';

    $scope.searching = true;

    if ($stateParams.filters) {
        $stateParams.filters = JSON.parse($stateParams.filters);

        for (var i in $stateParams.filters) {
            $scope.filters[i] = $stateParams.filters[i];
        }
    }

    search();

    /* Functions */

    $scope.delete = function (item) {
        if (! confirm('¿Eliminar este item?')) {
            return;
        }

        $http.delete('/' + resource + '/' + item.id)
            .error(function () {
                alert('Error procesando la operación.');
            });

        var index = $scope.models.indexOf(item);
        $scope.models.splice(index, 1);
    };

    $scope.listAll = function () {
        $scope.filters = {};

        search();
    };

    $scope.export = function () {
        var params = getParams();

        window.location.assign('/' + resource + '/export/xls?' + params);
    };

    function search () {

        var params = getParams();

        $scope.models.length = 0;
        $scope.searching     = true;

        $http.get('/' + resource + '?ajax=true&' + params)
            .success(function(response) {
                if ((response) && (response[resource])) {
                    $scope.models = response[resource]
                }

                $scope.searching = false;
            })
            .error(function () {
                $state.go('dashboard');

                $scope.searching = false;
            });
    }

    function getParams()
    {
        var orderBy = $scope.orderByField;

        if (orderBy.indexOf('%DIRECTION%') >= 0) {
            orderBy = orderBy.replace(/%DIRECTION%/g, $scope.orderByDirection);
        } else {
            orderBy += ' ' + $scope.orderByDirection;
        }

        return $scope.filters ? $.param({ search: $scope.filters, orderBy: orderBy }) : '';
    }
});
