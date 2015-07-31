adminApp
    .config(function ($httpProvider) {
        $httpProvider.interceptors.push('CMSInterceptor');
    })
    .factory('CMSInterceptor', function($q, UIService) {
        return {
            request: function(config) {

                if ((config.url == '/shift/pendingShifts') ||
                    (config.url == '/usedRequest/pendingRequests')) {
                    return config;
                }

                UIService.showSpinner();

                return config;
            },

            requestError: function(rejection) {

                UIService.hideSpinner();

                alert('Ocurrió un error realizando la última operación.');
                return rejection;
            },

            response: function(response) {

                UIService.hideSpinner();

                setTimeout(initComponents, 1000);

                return response;
            },

            responseError: function(rejection) {
                alert('Ocurrió un error realizando la última operación.');

                UIService.hideSpinner();

                return rejection;
            }
        };
    });