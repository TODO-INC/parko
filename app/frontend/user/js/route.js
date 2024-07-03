<!DOCTYPE html>
<html>
<head>
    <title>Map and File Validation</title>
    <!-- Include Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Include Leaflet Geocoder -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder"></script>
</head>
<body>
    <div id="map" style="width: 100%; height: 400px;"></div>
    <input type="file" id="spaceFileMultiple" multiple>
    <p id="error-msg" style="color: red;"></p>
    
    <!-- Optional checkboxes and dropdown -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" value="Option 1">
        <label class="form-check-label">Option 1</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" value="Option 2">
        <label class="form-check-label">Option 2</label>
    </div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Option 1</a>
            <a class="dropdown-item" href="#">Option 2</a>
        </div>
    </div>
    
    <script>
        var map = L.map('map').setView([9.939093, 78.121719], 10);
        
        // Define tile layers
        var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        // Define other tile layers similarly
        
        // Add layers to map
        googleStreets.addTo(map);
        // Add other layers similarly
        
        // Geolocation handling
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var x = position.coords.latitude;
                var y = position.coords.longitude;
                // Rest of geolocation logic
            }, function (error) {
                console.error("Error getting user's location:", error.message);
            });
        } else {
            console.error("Geolocation is not supported in this browser.");
        }
        
        // File validation
        const fileInput = document.getElementById("spaceFileMultiple");
        fileInput.addEventListener("change", validateFiles);
        
        function validateFiles() {
            const files = fileInput.files;
            const errorMsgElement = document.getElementById("error-msg");
            const allowedFormats = ["image/jpeg", "image/jpg", "image/png"];
            
            if (files.length < 6) {
                errorMsgElement.textContent = "Please select at least six files.";
            } else {
                errorMsgElement.textContent = "";
                
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    
                    if (!allowedFormats.includes(file.type)) {
                        errorMsgElement.textContent = "Please select files in JPG, JPEG, or PNG format only.";
                        return;
                    }
                }
            }
        }
        
        // Dropdown checkbox handling
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
    </script>
</body>
</html>
