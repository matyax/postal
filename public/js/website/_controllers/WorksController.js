angular.module('postalApp').controller('WorksController', function ($scope, navigationService) {

    var currentCategoryId = null,
        interval          = null;

    init();

    /* Functions */
    function init() {
        $(function () {
            $('#cases-nav a:first').trigger('click');

            if ($('.banner-item').length) {
                interval = setInterval(slide, 5000);
            }
        });
    }

    window.slide = slide;

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
        $banner.show();
        $banner.css('left', '0');

        $banner.addClass('displayed');
    }

    function hideBanner($banner) {
        if (! $banner.length) {
            return false;
        }

        $banner.css('left', '-100%');
        setTimeout(function () {
            $banner.hide();
            $banner.css('left', '100%');
            setTimeout(function () {
                $banner.show();
            }, 1100);
        }, 1100);

        $banner.removeClass('displayed');
    }

    function showWork($work) {
        if ($work.data('category') != currentCategoryId) {
            currentCategoryId = $work.data('category');

            $('#cases-nav .active').removeClass('active');
            $('#cases-nav a[data-id="' + currentCategoryId + '"]').parent().addClass('active');
        }

        $work.css('left', '0');

        $work.addClass('displayed');

        $('.description-container[data-work-id="'+$work.data('id')+'"]').show();
    }

    function hideWork($works) {
        $works.css('left', '-100%');
        setTimeout(function () {
            $works.hide();
            $works.css('left', '100%');
            setTimeout(function () {
                $works.show();
            }, 1100);
        }, 1100);

        $works.removeClass('displayed');

        $('.description-container').hide();
    }

    $scope.displayCategory = function ($event, categoryId) {
        if ($event) {
            $event.preventDefault();
        }

        $('#cases-nav .active').removeClass('active');
        $('#cases-nav a[data-id="' + categoryId + '"]').parent().addClass('active');

        currentCategoryId = categoryId;

        hideWork($('.cases-item:not([data-category="'+categoryId+'"]:first)'));
        showWork($('.cases-item[data-category="'+categoryId+'"]:first'));

        $(".cases-nav").removeClass("open");
        $("#mobile-cases-menu-button").removeClass("open");
    };

    $scope.prev = function ($event) {
        $event.preventDefault();

        var $current = $('.cases-item.displayed'),
            $next    = $current.prev('.cases-item');

        if (! $next.length) {
            $next = $('.cases-item:last');
        }

        hideWork($current);
        showWork($next);
    };

    $scope.next = function ($event, $next) {
        $event.preventDefault();

        var $current = $('.cases-item.displayed');

        $next = $next || $current.next('.cases-item');

        if (! $next.length) {
            $next = $('.cases-item:first');
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


    $scope.toggleMobileMenu = function(){
        $(".cases-nav").toggleClass("open");
        $("#mobile-cases-menu-button").toggleClass("open");
    }

});