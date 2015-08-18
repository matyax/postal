adminApp.controller('EditController', function ($scope, $http, $stateParams, $state, Upload) {
    var id       = $stateParams.id,
        resource = $state.current.data.resource,
        $button  = $('.btn.btn-success');

    if (! $button.length) {
        $button = $('[ng-click="save()"]');
    }

    $http.get('/' + resource + '/'+ id +'/edit?ajax=true').
        success(function(response) {
            $('form').animate({opacity: 1});

            if (response) {
                $scope[resource] = response;

                $scope.images = response.images;
            }
        })
        .error(function () {
            $state.go('landing');
        });

    $scope.progress = '';

    $scope.onFileSelect = function($files) {

        $button.fadeOut('fast');

        for (var i = 0; i < $files.length; i++) {
            var file = $files[i];

            $scope.upload = Upload.upload({
                url: '/' + resource + '/images',
                method: 'POST',
                withCredentials: true,
                file: file,
                data: {
                    id: id
                }
            }).progress(function(evt) {
                $scope.progress = parseInt(100.0 * evt.loaded / evt.total);
            }).success(function(data, status, headers, config) {
                $button.fadeIn('fast');

                if ((! data) && (! data.thumbnail)) {
                    return;
                }

                $scope.progress = '';

                addImage(data);
            }).error(function () {
                $button.fadeIn('fast');

                alert('Error subiendo imagen.');
            });
        }
    };

    $scope.save = function () {
        if (($scope.resourceForm) && (! $scope.resourceForm.$valid)) {
            alert('Por favor complete todos los campos.');

            return false;
        }

        $button.fadeOut('fast');

        var data = {};
        data[resource] = $scope[resource];
        data['images'] = $scope.images;

        $http.put('/' + resource + '/' + id, data)
            .success(function (response, status, headers, config) {
                if (! response) {
                    alert('Error procesando la operación.');
                } else if (response.result == 'error') {
                    alert(response.message);
                } else {
                    $state.transitionTo(resource + '_list', {}, { reload: true });
                }
            })
            .error(function () {
                alert('Error guardando.');

                $button.fadeIn('fast');
            });
    };

    $scope.deleteImage = function (item) {
        if (! confirm('¿Eliminar imagen?')) {
            return;
        }

        var i = $scope.images.indexOf(item);

        $scope.images.splice(i, 1);

        $http.delete('/' + resource + '/images/' + item.id)
            .error(function () {
                alert('Error procesando la operación.');
            });
    };

    $scope.images = [];

    function addImage(image) {
        $scope.images.push(image);
    }

    window.escope = $scope;
});
