angular.module('postalApp').controller('WorksController', function ($scope) {

    var currentId = null;

    init();

    /* Functions */
    $scope.displayCategory = function ($event, categoryId) {
        $event.preventDefault();

        currentId = categoryId;

        $('.cases-item:visible').css('left', '100%');
        $('.cases-item[data-category="'+categoryId+'"]:first').css('left', '0');
    };

    function init() {
        $(function () {
            $('#cases-nav a:first').trigger('click');
        });
    }
});