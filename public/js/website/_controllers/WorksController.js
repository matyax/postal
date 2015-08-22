angular.module('postalApp').controller('WorksController', function ($scope) {

    var currentId = null;

    init();

    /* Functions */
    function init() {
        $(function () {
            $('#cases-nav a:first').trigger('click');
        });
    }

    function show($work) {
        $work.css('left', '0');

        $work.addClass('displayed');

        $('.description-container[data-work-id="'+$work.data('id')+'"]').fadeIn('fast');
    }

    function hide($works) {
        $works.css('left', '100%');

        $works.removeClass('displayed');

        $('.description-container').fadeOut('fast');
    }

    $scope.displayCategory = function ($event, categoryId) {
        $event.preventDefault();

        $('#cases-nav .active').removeClass('active');
        $('#cases-nav a[data-id="' + categoryId + '"]').parent().addClass('active');

        currentId = categoryId;

        hide($('.cases-item'));
        show($('.cases-item[data-category="'+categoryId+'"]:first'));
    };

    $scope.prev = function ($event) {
        $event.preventDefault();

        var $current = $('.cases-item.displayed'),
            $next    = $current.next('[data-category="'+currentId+'"]');

        if (! $next.length) {
            $next = $('.cases-item[data-category="'+currentId+'"]:first');
        }

        hide($current);
        show($next);
    }

    $scope.next = function ($event) {
        $event.preventDefault();

        var $current = $('.cases-item.displayed'),
            $next    = $current.prev('[data-category="'+currentId+'"]');

        if (! $next.length) {
            $next = $('.cases-item[data-category="'+currentId+'"]:last');
        }

        hide($current);
        show($next);
    }
});