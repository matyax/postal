angular.module('postalApp').controller('NavigationController', function ($scope) {

    /* Functions */
    $scope.navigateTo = function ($event) {
        $event.preventDefault();

        var targetId  = $(event.currentTarget).attr('href'),
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
});