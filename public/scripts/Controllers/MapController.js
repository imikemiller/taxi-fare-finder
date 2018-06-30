/**
 * Created by mike on 7/17/16.
 */
application.controller('MapController', ['$scope','$q','$http', function($scope,$q,$http) {

    $scope.events =[];

    var fetchEvents= function () {

        var deferred = $q.defer();

        var url = base_url+'/api/events';

        $http({

            method: 'POST',
            url: url,
            data:{ latitude: latitude, longitude: longitude}

        }).then(function successCallback(response) {
            // this callback will be called asynchronously
            // when the response is available
            // console.log('succeess response'+JSON.stringify(response.data));
            deferred.resolve(JSON.stringify(response.data));
        });

        return deferred.promise;

    }


    fetchEvents().then(function(result){
        $scope.events = angular.fromJson(result);

        console.log($scope.events);
    })

    var latitude  = 51.5583343;
    var longitude = -0.0672627;

    $scope.map = { center: { latitude: latitude, longitude: longitude}, zoom: 13 ,events:{click:function(map,event,origArgs){
                e = origArgs[0];
                latitude= e.latLng.lat(),
                longitude= e.latLng.lng()
                $scope.map.center = {
                    latitude: latitude,
                    longitude: longitude
                };

                fetchEvents().then(function(result){
                    $scope.events = angular.fromJson(result);

                    console.log($scope.events);
                })

                $scope.$apply();
            }
        }
    };

    navigator.geolocation.getCurrentPosition(function(pos) {
        $scope.map.center = {
            latitude: pos.coords.latitude,
            longitude: pos.coords.longitude
        };
        $scope.$apply();
    });


}]);