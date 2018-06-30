/**
 * Created by mike on 7/17/16.
 */
var application = angular.module('application', [
        'ngResource',
        'ngRoute',
        'ui.bootstrap',
        'uiGmapgoogle-maps'
    ])/*.config(function(uiGmapGoogleMapApiProvider) {

        uiGmapGoogleMapApiProvider.configure({
            key: 'AIzaSyBdqtsA61qdtkCJttglUvMzQ7YTvzOPW1Q'
        });

    })*/

application.config(['$routeProvider', '$locationProvider',
    function ($routeProvider) {
        
        $routeProvider
            .when('/', {
                templateUrl: 'views/map.html',
                controller: 'MapController'
            })
            .otherwise({
                redirectTo: '/'
            });


    }]);