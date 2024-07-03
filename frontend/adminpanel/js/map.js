var x = 9.939093,y = 78.121719;
var map = L.map('map').setView([x, y], 10);
var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
googleStreets.addTo(map);
const points = [
    { name: "Point 1", latitude: x, longitude: y },
    { name: "Point 2", latitude: 9.181199500150413, longitude: 77.86388658712417 },
    { name: "Point 3", latitude: 9.175967317137577, longitude: 77.85968088338927 },
    { name: "Point 4", latitude: 9.175247091569148, longitude: 77.87180446813665 },
];
points.forEach(point => {
    const pointMarker = L.marker([point.latitude, point.longitude], { draggable: false }).addTo(map);
});
