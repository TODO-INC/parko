function showmap(){
    var x1 = 13.067439, y1 = 80.237617;
    map = L.map('map').setView([x1, y1], 10);
    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleStreets.addTo(map);
    L.marker([x1,y1]).addTo(map);
    L.marker([9.181199500150413,77.86388658712417]).addTo(map);
    L.marker([9.175967317137577,77.85968088338927]).addTo(map);
    L.marker([9.175247091569148,77.87180446813665]).addTo(map);
}