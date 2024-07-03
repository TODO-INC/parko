var map = L.map('map').setView([9.939093, 78.121719], 10);
var userCoordinates = {}; // Store user's coordinates

if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function (position) {
        var x = position.coords.latitude;
        var y = position.coords.longitude;
        map.setView([x, y], 10);
        var userMarker = L.marker([x, y], { draggable: true }).addTo(map).bindPopup("Your Location");
        userCoordinates = { lat: x, lng: y };
        var flag = 0;

        // Create a geocoder control
        var geocoder = L.Control.geocoder({
            defaultMarkGeocode: false
        }).on('markgeocode', function (e) {
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
            });
            var marker = L.marker(e.geocode.center, { draggable: true }).addTo(map);
            marker.bindPopup(e.geocode.name).openPopup();
            map.setView(e.geocode.center, 13);

            function updateCoordinates() {
                var coordinatesContainer = document.getElementById('coordinates_container'); // Update with your HTML element's ID
                coordinatesContainer.value = marker.getLatLng().lat + ', ' + marker.getLatLng().lng;
                if (flag == 0) {
                    coordinatesContainer.value = userCoordinates.lat + ', ' + userCoordinates.lng;
                }
            }

            marker.on('move', function (e) {
                flag = 1;
                updateCoordinates();
            });

            updateCoordinates();
        }).addTo(map);

    }, function (error) {
        console.error("Error getting user's location:", error.message);
    });
} else {
    console.error("Geolocation is not supported in this browser.");
}

var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
googleStreets.addTo(map);













// // JavaScript
// function validateFiles() {
//     const fileInput = document.getElementById("spaceFileMultiple");
//     const files = fileInput.files;

//     if (files.length < 6) {
//     displayErrorMessage("Please select at least six files.");
//     } else {
//     // Clear the error message when the validation passes
//     displayErrorMessage("");
//     }

//     for (let i = 0; i < files.length; i++) {
//     const file = files[i];
//     const allowedFormats = ["image/jpeg", "image/jpg", "image/png"];

//     if (!allowedFormats.includes(file.type)) {
//         displayErrorMessage("Please select files in JPG, JPEG, or PNG format only.");
//         return;
//     }
//     }
// }

// function displayErrorMessage(message) {
//     const errorMsgElement = document.getElementById("error-msg");
//     errorMsgElement.textContent = message;
// }




// JavaScript - Optional if you want to handle selections
const checkboxes = document.querySelectorAll('.form-check-input');
const dropdownButton = document.getElementById('dropdownMenuButton');

dropdownButton.addEventListener('click', function () {
  let selectedOptions = [];
  checkboxes.forEach(checkbox => {
    if (checkbox.checked) {
      selectedOptions.push(checkbox.value);
    }
  });

  console.log("Selected options:", selectedOptions);
});
    

function return_listing(action){
    if (action === "yes") {
      window.location.href = "/get_listing";
    }
  }
