var map = L.map('map').setView([9.939093, 78.121719], 10);
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

if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function (position) {
        var x = position.coords.latitude;
        var y = position.coords.longitude;
        map.setView([x, y], 10);
        var userMarker = L.marker([x, y]).addTo(map).bindPopup("Your Location");
        var routingControl = L.Routing.control({
            waypoints: [
                L.latLng(x,y),
                L.latLng(x1,y1)
            ],
            routeWhileDragging: false
        }).addTo(map)        
    },function (error) {
        console.error("Error getting user's location:", error.message);
    });
} else {
    console.error("Geolocation is not supported in this browser.");
}