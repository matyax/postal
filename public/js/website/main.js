angular.module('postalApp', ['ui.router'])
    .config(function($stateProvider, $urlRouterProvider, $interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

(function() {
  var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                              window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
  window.requestAnimationFrame = requestAnimationFrame;
})();

$(function () {
    $('#home-banners img').imgpreload(function() {
        $('#preloader').remove();
        $('header, #all-sections, #contact').fadeIn('fast');
    });

    $('<img>').attr('src', '/img/loading.gif');
});