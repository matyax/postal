angular.module('postalApp').controller('WorksController', function ($scope) {

    var currentId = null,
        interval  = null;

    init();

    /* Functions */
    function init() {
        $(function () {
            $('#cases-nav a:first').trigger('click');

            if ($('.banner-item').length) {
                slide();
                interval = setInterval(slide, 5000);
            }
        });
    }

    function slide() {
        if ($('.banner-item').length == 1) {
            clearInterval(interval);

            return showBanner($('.banner-item'));
        }

        var $current = $('.banner-item.displayed'),
            $next = $current.next('.banner-item');

        if (! $next.length) {
            $next = $('.banner-item:first');
        }

        hideBanner($current);
        showBanner($next);
    }

    function showBanner($banner) {
        $banner.css('left', '0');

        $banner.addClass('displayed');
    }

    function hideBanner($banner) {
        if (! $banner.length) {
            return false;
        }

        $banner.css('left', '100%');

        $banner.removeClass('displayed');
    }

    function showWork($work) {
        $work.css('left', '0');

        $work.addClass('displayed');

        $('.description-container[data-work-id="'+$work.data('id')+'"]').fadeIn('fast');
    }

    function hideWork($works) {
        $works.css('left', '100%');

        $works.removeClass('displayed');

        $('.description-container').fadeOut('fast');
    }

    $scope.displayCategory = function ($event, categoryId) {
        $event.preventDefault();

        $('#cases-nav .active').removeClass('active');
        $('#cases-nav a[data-id="' + categoryId + '"]').parent().addClass('active');

        currentId = categoryId;

        hideWork($('.cases-item'));
        showWork($('.cases-item[data-category="'+categoryId+'"]:first'));
    };

    $scope.prev = function ($event) {
        $event.preventDefault();

        var $current = $('.cases-item.displayed'),
            $next    = $current.prev('[data-category="'+currentId+'"]');

        if (! $next.length) {
            $next = $('.cases-item[data-category="'+currentId+'"]:first');
        }

        hideWork($current);
        showWork($next);
    };

    $scope.next = function ($event, $next) {
        $event.preventDefault();

        var $current = $('.cases-item.displayed');

        $next = $next || $current.next('[data-category="'+currentId+'"]');

        if (! $next.length) {
            $next = $('.cases-item[data-category="'+currentId+'"]:last');
        }

        hideWork($current);
        showWork($next);
    };

    $scope.goToCase = function($event, categoryId, workId) {
        $scope.displayCategory($event, categoryId);

        $scope.next($event, $('.cases-item[data-id="' + workId + '"]'));

        $('html, body').animate({
            scrollTop: $('#cases').position().top
        }, 1000, 'swing');
    };
});