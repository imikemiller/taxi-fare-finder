<!doctype html>
<html ng-app="application">
<head>
    <script src='//maps.googleapis.com/maps/api/js?key=AIzaSyBdqtsA61qdtkCJttglUvMzQ7YTvzOPW1Q'></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.7/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.13.1/lodash.min.js"></script>
    <script src='//cdn.rawgit.com/nmccready/angular-simple-logger/0.1.7/dist/angular-simple-logger.js'></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-google-maps/2.3.3/angular-google-maps.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.7/angular-route.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.7/angular-resource.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/1.3.3/ui-bootstrap.min.js"></script>

    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">


    <title>Taxi Fare Finder</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .content-wrap{
            width:1400px;
            margin:auto;
        }
        
        #navigation-container{
            height:60px;
            position: absolute;
            width:100%;
            background-color: white;
            border-bottom:thin solid grey;
            z-index: 999;
            line-height:60px;
        }
    </style>
    <script>
        var base_url = "<?=url('/');?>"
    </script>
</head>
<body>
<!-- Navigation -->
<div id="navigation-container">
    <div class="container">Header & Navigation</div>
</div>
<!-- Begin page content -->
<div class="container layout-fill" ng-view>

</div>

<script src="scripts/Config/application.js"></script>
<script src="scripts/Controllers/MapController.js"></script>
</body>
</html>