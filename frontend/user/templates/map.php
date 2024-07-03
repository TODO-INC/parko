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
        var map = L.map('map').setView([9.939093, 78.121719], 10);

        var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });

        var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
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

        var x1 = 13.067439, y1 = 80.237617;

        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var x = position.coords.latitude;
                var y = position.coords.longitude;

                var destinationIcon = L.icon({
                    iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-red.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                });

                var userMarker = L.marker([x, y], { draggable: false });
                userMarker.addTo(map).bindPopup("Your Location");

                var destinationMarker = L.marker([x1, y1], { icon: destinationIcon, draggable: false });
                destinationMarker.addTo(map).bindPopup("Destination");

                var routingControl = L.Routing.control({
                    waypoints: [
                        L.latLng(x, y),
                        L.latLng(x1, y1)
                    ],
                    routeWhileDragging: false
                }).addTo(map);

                map.setView([x, y], 10);
            }, function (error) {
                console.error("Error getting user's location:", error.message);
            });
        } else {
            console.error("Geolocation is not supported in this browser.");
        }

</script>
