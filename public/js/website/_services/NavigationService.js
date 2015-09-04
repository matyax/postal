angular.module('postalApp').factory('navigationService', ['$http', function navigationServiceFactory($http) {
    return {
        navigateTo: navigateTo
    };

    function navigateTo($event) {
        $event.preventDefault();

        $("#mobile-menu-window").removeClass("open");
        $("body").removeClass("mobile-menu-open");

        var targetId  = $($event.currentTarget).attr('href'),
            $target   = $(targetId),
            scrollTop = $target.position().top;

        if (targetId == '#services') {
            scrollTop -= $('header').outerHeight();
        }

        scrollTo(scrollTop);
    }

    function scrollTo(top) {
        $('html, body').animate({
            scrollTop: top
        }, 1000, 'swing');
    }

}]);