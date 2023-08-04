<!DOCTYPE html>
<html>
<head>
    <title>Leaflet Map Example</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
</head>
<body>
    <center>
        <div id="map" style="height: 100vh;"></div>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
        <script src="map.js"></script>
    </center>
</body>
</html>
<script>


const url = new URL(window.location.href);
var lat = parseFloat(url.searchParams.get("lat"));
var lon = parseFloat(url.searchParams.get("lon"));
var map = L.map('map').setView([9.939093, 78.121719], 10);
L.marker([lat,lon]).addTo(map);
var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
googleStreets.addTo(map);
if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function (position) {
        var x = position.coords.latitude;
        var y = position.coords.longitude;
        map.setView([x, y], 10);
        var userMarker = L.marker([x, y]).addTo(map).bindPopup("Your Location");
        var routingControl = L.Routing.control({
            waypoints: [
                L.latLng(x,y),
                L.latLng(lat,lon)
            ],
            routeWhileDragging: false
        }).addTo(map)        
    },function (error) {
        console.error("Error getting user's location:", error.message);
    });
} else {
    console.error("Geolocation is not supported in this browser.");
}
</script>
