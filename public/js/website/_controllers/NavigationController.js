angular.module('postalApp').controller('NavigationController', function ($scope) {

    /* Functions */
    $scope.navigateTo = function ($event) {
        $event.preventDefault();

        var $target = $($(event.currentTarget).attr('href'));

        scrollTo($target.position().top);
    }

    function scrollTo(top) {
        $('html, body').animate({
            scrollTop: top
        }, 1000, 'swing');
    }
});