<?php
include "../libs/load.php";
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="../vendor/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.112.5">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="../vendor/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Heebo' rel='stylesheet'>
    <script src="vendor/assets/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/frontend/host/css/map.css">
    </script><link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="style.css"/>
    <title>MapHost</title>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />



</head>
<body>
    <div class="container custom-container">
        <form class="custom-form" action="/post_host_data/{{current_user}}" method="POST" enctype="multipart/form-data">
        <div class="mb-2 custom-dropdown">
            <label for="userType">Types of User:</label>
            <select class="form-select" id="userType" name="userType">
                <option value="public">Public</option>
                <option value="publicContracted">Public Contracted</option>
                <option value="privateCommercial">Private Commercial</option>
                <option value="privateNonCommercial">Private Non-Commercial</option>
            </select>
        </div>
        <div class="mb-2" id="spaceLicenseInput" name="spaceLicenseInput">
            <label for="spaceLicense" class="form-label">Parking License number:</label>
            <input type="text" class="form-control" id="spaceLicense" disabled>
        </div>
        
        <div class="mb-2 custom-dropdown">
            <label for="workTime">Type of home:</label>
            <select class="form-select" id="userhours" name="userhours">
                <option value="office">Appartment</option>
                <option value="home">stand alone home</option>
                
            </select>
        </div>

        <div class="mb-2">
            <label for="spaceName" class="form-label">Name of your space</label>
            <input type="text" name="spaceName" class="form-control" id="spaceName" required>
        </div>
        <div class="mb-2">
            <label for="spaceDesc" class="form-label">Simple Description on your home</label>
            <input type="text" class="form-control" id="spaceDesc"  name="spaceDesc" required>
        </div>
        <div class="mb-2">
            <label for="spaceSize" class="form-label">Space Size in Sq meter</label>
            <input type="number" name="spaceSize" class="form-control" min="1" id="spaceSize" required>
        </div>
        <div class="mb-2">
            <label for="spaceAddress" class="form-label">Address</label>
            <input type="text" name="spaceAddress" class="form-control" id="spaceAddress" required>
        </div>
        <div class="mb-2">
            <label for="spaceAddress" class="form-label">City</label>
            <input type="text" name="spaceCity" class="form-control" id="spaceCity" required>
        </div>
        <div class="mb-2">
            <label for="spacePincode" class="form-label">Pin Code</label>
            <input type="number" name="spacePincode" class="form-control" min="100000" max="999999" id="spacePincode" required>
        </div>


        <div class="mb-2">
            <label for="mapLocation" class="form-label">Location</label>
            <div class="container-map">
                <div id="map" style="height:50vh"></div>
                <input type= "text" id="coordinates_container" name="coordinates_container" class="form-control mb-2 mt-2" readonly></input>
                <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
            </div>
        </div>

        <div class="mb-2">
            <div class="row g-3 align-items-center">
                <div class="col-6">
                    <label for="spaceLength" class="col-form-label">Space Length(In Meter)</label>
                    <input type="number" id="spaceLength" name="spaceLength" class="form-control"  min=15 required>
                </div>
                <div class="col-6">
                    <label for="spaceWidth" class="col-form-label">Space Width(In Meter)</label>
                    <input type="number" id="spaceWidth"  name="spaceWidth" class="form-control"  min=7 required>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <div class="row g-3 align-items-center">
                <div class="col-6">
                    <label for="totalCar" class="col-form-label">Total rooms</label>
                    <input type="number" id="totalCar" name="totalCar" class="form-control"  min=15 required>
                </div>
                <div class="col-6">
                    <label for="totalBike" class="col-form-label">Total bathrooms</label>
                    <input type="number" id="totalBike" name="totalBike" class="form-control"  min=7 required>
                </div>
            </div>
        </div>

        <div class="mb-2">
            <label for="spaceFileMultiple" class="form-label">Image1</label>
            <input class="form-control" name="spaceFileMultiple1" type="file" id="spaceFileMultiple1" enctype="multipart/form-data" required>
        </div>
        <div id="error-msg" style="color: red;"></div>

        <div class="mb-2">
            <label for="spaceFileMultiple" class="form-label">Image2</label>
            <input class="form-control" name="spaceFileMultiple2" type="file" id="spaceFileMultiple2" enctype="multipart/form-data" required>
        </div>

        <div class="mb-2">
            <label for="spaceFileMultiple" class="form-label">Image3</label>
            <input class="form-control" name="spaceFileMultiple3" type="file" id="spaceFileMultiple3" enctype="multipart/form-data" required>
        </div>

        <div class="mb-2">
            <label for="spaceFileMultiple" class="form-label">Image4</label>
            <input class="form-control" name="spaceFileMultiple4" type="file" id="spaceFileMultiple4" enctype="multipart/form-data" required>
        </div>

        <div class="mb-2">
            <div class="row g-3 align-items-center">
                <div class="col-6">
                    <label for="spaceSurvey" class="form-label">Survey Number</label>
                    <input class="form-control" name="spaceSurvey" type="text" id="spaceSurvey" required>
                </div>
                <div class="col-6">
                    <label for="spaceAdhar" class="form-label">Adhar associated with the land</label>
                    <input class="form-control" name="spaceAdhar" type="number" id="spaceAdhar" required>
                </div>
                <div class="col-6">
                    <label for="otp" class="form-label">OTP Verification</label>
                    <input class="form-control" name="otp" type="number" id="otp" required>
                </div>
            </div>
        </div>


        <!-- HTML -->
        <div class="mb-2 custom-dropdown">
    <label for="multipleOptions">Amenities Provided:</label>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Options
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="Security Camera">
                <label class="form-check-label" for="option1">Security Camera</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="Dust Free Zone">
                <label class="form-check-label" for="option2">Dust Free Zone</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="Free Air">
                <label class="form-check-label" for="option3">Free Air</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="E-Vehicle Charge Point">
                <label class="form-check-label" for="option4">E-Vehicle Charge Point</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="Vehicle Wash">
                <label class="form-check-label" for="option5">Vehicle Wash</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="Puncture Works">
                <label class="form-check-label" for="option6">Puncture Works</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="Two Wheeler Lock">
                <label class="form-check-label" for="option7">Two Wheeler Lock</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="Four Wheeler Cover">
                <label class="form-check-label" for="option8">Four Wheeler Cover</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id=dropdownMenuButton value="Helmet Storage">
                <label class="form-check-label" for="option9">Helmet Storage</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="dropdownMenuButton" type="checkbox" id="dropdownMenuButton" value="Locker Facility">
                <label class="form-check-label" for="option10">Locker Facility</label>
            </div>
        </div>
    </div>
</div>

        <div class="mb-2 mt-2 custom-checkboxes">
            <label for="parkingTypes">Types of users:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="subscriptionUser" name="subscriptionUser" value="subscriptionUser">
                <label class="form-check-label" for="subscriptionUser">Subscription User</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="currentUser" name="currentUser" value="currentUser">
                <label class="form-check-label" for="currentUser">Current User</label>
            </div>
        </div>

        <div class="mb-2">
            <label for="spaceInstructions" class="form-label">Add instructions for the Guest</label>
            <input type="textarea" class="form-control" id="spaceInstructions" name="spaceInstructions" required>
        </div>

        <p>By clicking the 'Submit' button, you confirm that all the details are correct and accurate to the best of your knowledge. And also you agree to the <a href="#">security policy</a> and assure are not violating the terms and conditions. Thank you for providing the necessary information.</p>


        <button id="submit" type="submit" class="btn btn-primary mt-2" >Submit</button>
        </form>
    </div>


<script src="/frontend/host/js/map.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
const parkingSelect = document.getElementById("userType");
    const licenseInput = document.getElementById("spaceLicense");

    parkingSelect.addEventListener("change", function () {
        alert("123");
        if (parkingSelect.value === "publicContracted" ||parkingSelect.value === "privateCommercial"  ) {
            licenseInput.removeAttribute("disabled");
        } else {
            licenseInput.setAttribute("disabled", "disabled");
        }
    });    
</script>

</body>