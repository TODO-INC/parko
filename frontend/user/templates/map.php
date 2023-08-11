<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
    <title>MapHost</title>
    <!-- <script src="../js/map.js"></script> -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <style>
        body{
            margin:0;
            padding:0;
        }
        #map{
            width:100%;
            height:100%;

        }
    </style>
</head>
<body>
    <div id="map" style="height:100vh"></div>
    <!-- <div id="coordinates-container">Coordinates: </div> -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <div id="map"></div>
    <!-- <div id="coordinates-container">Coordinates: </div> -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
</body>
</html>
<script>
var x1 = 13.067439, y1 = 80.237617, x = 9.9252007, y = 78.11977539999998;
var map = L.map('map').setView([x1, y1], 6);
var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
googleStreets.addTo(map);
var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});

var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});

var googleTraffic = L.tileLayer('https://{s}.google.com/vt/lyrs=m@221097413,traffic&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    minZoom: 2,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
});

var baseLayers = {
    "Street View": googleStreets,
    "Satellite View": googleSat,
    "Terrain View": googleTerrain,
    "Traffic View": googleTraffic
};

L.control.layers(baseLayers).addTo(map);
var startMarker = L.marker([x, y], { draggable: false });
var endMarker = L.marker([x1, y1], { draggable: false });
var routingControl = L.Routing.control({
    waypoints: [
        L.latLng(x, y),
        L.latLng(x1, y1)
    ],
    routeWhileDragging: false,
    createMarker: function (i, waypoint, n) {
        var markerOptions = {
            draggable: false, // Set draggable to false to prevent marker dragging
        };
        var marker = L.marker(waypoint.latLng, markerOptions);
        return marker;
    }
}).addTo(map);
startMarker.addTo(map);
endMarker.addTo(map);
routingControl.on('routeselected', function (e) {
    startMarker.dragging.disable();
    endMarker.dragging.disable();
});
routingControl.on('routingerror', function (e) {
    startMarker.dragging.enable();
    endMarker.dragging.enable();
});


</script>
