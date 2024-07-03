<?php
include "../libs/load.php";
?>
  <!DOCTYPE html>
  <html lang="en" data-bs-theme="auto">
    <head>
      <script src="/frontend/user/vendor/assets/js/color-modes.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="generator" content="Hugo 0.112.5">
		<link rel="shortcut icon" type="image/x-icon" href="/frontend/user/asset/icons/icon.ico" />
		<title>Parko</title>
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <link href="../vendor/assets/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
		<link href="https://fonts.googleapis.com/css?family=Albert+Sans" rel="stylesheet" />
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
      <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
      </script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
      <link rel="stylesheet" href="/frontend/user/css/header.css">
      <link rel="stylesheet" href="/frontend/user/css/footer.css">
      <link rel="stylesheet" href="/frontend/user/css/index.css">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
      <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
      <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
      <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
      <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
    </head>
    <body data-bs-scheme="light">
    <header class="navbar navbar-expand-md custom-common-container light">
	<div class="container-md custom-common-header light">
		<a class="navbar-brand light" href="#">
			<img class="icon light" height="40px" src="/frontend/user/asset/pics/parko.png" alt="Parko Logo" />
		</a>

		<button class="navbar-toggler light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon light"></span>
		</button>

		<div class="collapse navbar-collapse light" id="navbarNav">
		<ul class="navbar-nav mx-auto light">
      <li class="nav-item light mx-2">
          <a class="nav-link light" href="#" onclick="check_home('Add',{{user_id}})" >Home</a>
      </li>
      <li class="nav-item light mx-2">
          <a class="nav-link light" href="#" onclick="check_booking('Add',{{user_id}})" >Booking</a>
      </li>
    </ul>
			<ul class="navbar-nav ml-auto d-flex align-items-center light">
				<li class="me-3 light">
					<div class="form-check form-switch light">
						<input class="form-check-input light" type="checkbox" id="dark-mode-switch" />
						<label class="form-check-label light" for="dark-mode-switch">
							<i class="bi bi-moon light" id="moon-icon"></i>
							<i class="bi bi-brightness-high light" id="sun-icon" style="display: none;"></i>
						</label>
					</div>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto d-flex align-items-center light">
				<li class="nav-item dropdown light">
					<a class="nav-link dropdown-toggle light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<span class="bi bi-person light"></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-end light" aria-labelledby="navbarDropdown" data-bs-popper="static" style="text-align: center;">
						<li>
							<a href="#" onclick="check_account('Add',{{user_id}})" class="light"><i class="bi bi-person"></i> Account</a>
						</li>
						<li><hr class="dropdown-divider light" /></li>
						<li>
							<a href="#" onclick="check_notification('Add',{{user_id}})" class="light"><i class="bi bi-bell"></i> Notification</a>
						</li>
						<li>
							<a href="#" onclick="check_help('Add',{{user_id}})" class="light"><i class="bi bi-headset"></i> Help Center</a>
						</li>
						<li>
							<a href="#" onclick="check_about('Add',{{user_id}})" class="light"><i class="bi bi-info-circle"></i> About</a>
						</li>
						<li><hr class="dropdown-divider light" /></li>
						<li><a href="#" onclick="check_switchHost('Add',{{user_id}})"class="tog">Switch - Host</a></li>
						<li><a href="#" onclick="check_logout('Add',{{user_id}})" class="tog">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</header>
      <div class="p-5 mt-2 rounded-3 jumbotron-container light">
			<div class="container jumbotron mt-5 light">
				<h2 class="display-6 fw-bold light">Hello {{name.name}},</h2>
				<p class="col-md-8 fs-5 light">Welcome to RentalHome, Start your journey by searching for home  in your desired city. Find convenient and secure  options.</p>
			</div>
		</div>
      <div class="container search-space mt-4">
  <div class="row justify-content-center"> 
    <div class="col-10">
      <form class="d-flex" id="searchForm" method="get" action="/get_search_city/{{current_user}}/">
        <label for="searchSpace" class="visually-hidden">Search</label>
        <input type="text" class="form-control me-1 search-box" id="searchSpace" name="searchSpace" placeholder="Search a city.." list="datalistOptions">
        <datalist id="datalistOptions">
          <option value="Tirumangalam">
          <option value="Mattuthavani">
          <option value="Thiruparankundram">
          <option value="Aarapalayam">
          <option value="Usilampatti">
          <option value="Simmakkal">
          <option value="Melur">
          <option value="Peraiyur">
          <option value="Vaadipatti">
          <option value="Palamedu">

        </datalist>
        <button type="submit" class="btn btn-primary bi bi-search search-button"></button>
      </form>
    </div>
    <div class="col-2">
      <form class="d-flex">
        <button type="button" class="btn btn-primary bi bi-filter filter-button" data-bs-toggle="modal" data-bs-target="#filterModal"> Filters</button>
      </form>
    </div>
  </div>
</div>

    </div>
    <div class="modal fade filter-modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="filterModalLabel">Filters</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="post_user_filter/{{current_user}}" method="post" >
              <div class="container mt-4">
              <div class="mb-2 custom-dropdown">
                  <label for="userCity">Types of Vehicle:</label>
                  <select class="form-select" id="userCity" name="userCity">
                  <option value="Tirumangalam">Tirumangalam</option>
                  <option value="Mattuthavani">Mattuthavani</option>
                  <option value="Thiruparankundram">Thiruparankundram</option>
                  <option value="Aarapalayam">Aarapalayam</option>
                  <option value="Usilampatti">Usilampatti</option>
                  <option value="Simmakkal">Simmakkal</option>
                  <option value="Melur">Melur</option>
                  <option value="Peraiyur">Peraiyur</option>
                  <option value="Vaadipatti">Vaadipatti</option>
                  <option value="Palamedu">Palamedu</option>
                  </select>
                </div>
                <div class="mb-2 custom-dropdown">
                  <label for="userType">Types of Parking:</label>
                  <select class="form-select" id="parkType" name="parkType" required>
                    <option value="public">Public</option>
                    <option value="publicContracted">Public Contracted</option>
                    <option value="privateCommercial">Private Commercial</option>
                    <option value="privateNonCommercial">Private Non-Commercial</option>
                  </select>
                </div>
                <hr>
                <div class="mb-2 custom-dropdown">
                  <label for="userType">Types of Vehicle:</label>
                  <select class="form-select" id="vehicle" name="vehicle">
                    <option value="car">Car</option>
                    <option value="heavyVehicle">Heavy Vehicle</option>
                    <option value="motorWheeler">Motor Two Wheeler</option>
                    <option value="bicycle">Bicycle</option>
                  </select>
                </div>
                <hr>
                <div class="mb-3">
                  <label for="minPrice" class="form-label">Min Price:</label>
                  <input type="number" class="form-control" id="minPrice" name="minPrice" min="2" max="100" step="2" value="2" placeholder="Enter minimum price">
                </div>
                <hr>
                <div class="mb-3">
                  <label for="maxPrice" class="form-label">Max Price:</label>
                  <input type="number" class="form-control" id="maxPrice" name="maxPrice" min="2" max="100" step="2" value="100" placeholder="Enter maximum price">
                </div>
                <hr>
                <div class="mb-3">
                  <label for="radius" class="form-label">Radius:</label>
                  <input type="number" class="form-control" id="radius" name="radius" min="2" value="1" placeholder="Enter radius from your location in Km">
                </div>
                <hr>
                <div class="container mt-4">
                  <div class="mb-2 custom-dropdown">
                    <label for="multipleOptions">Amenities :</label>
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
                  </div>
                  <hr>
                  <button style="text-align:center;" type="submit" class="btn btn-primary filter-submit" data-bs-dismiss="modal">Apply</button>
                </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
    <div class="container mt-4">
    <div class="card list-container">
        <div class="card-header">
          <button type="button" class="btn btn-primary bi bi-list-task show-button" id="showList" data-target="content1"> Show List</button>
          <button type="button" class="btn btn-primary bi bi-map show-button" id="showMap" data-target="content2"> Show Map</button>
        </div>
        <div class="card-body">
          <div id="content1" class="content" style="display: none;">
          {% for data in data%}
            <div class="card mb-2 mt-1 book-card light custom-card">
              <div class="card-header"> {{data.namespaceName}} </div>
              <div class="card-body">
                <p class="card-text">{{data.userType}}</p>
                <p class="card-text">₹69 per hour</p>
                <p class="card-text">
                <div id="rating-container" class="align-items-center">
                  <span id="star-container"></span>
                  <span id="rating-count">(10907)</span>
                </div>
                </p>
                <form action="/get_user_reserve/{{data.id}}/{{current_user}}/" method="get" >
                <button  class="btn btn-info">More</button>
                <a href="map.php?lat=9.9315573&lon=78.1022729" class="btn btn-primary">Directions</a>
                </form>
              </div>
            </div>
            {% endfor %} 
          </div>
          <div id="content2" class="content">
            <div class="container-map">
              <div id="map" style="height:50vh"></div>
              <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
            </div>
          </div>
        </div>
      </div>
    </div> 
    {% include "footer.php" %}
    <!-- Add the Bootstrap JS and jQuery scripts -->
    <script src="/frontend/user/js/map.js"></script>
    <script>

// $(document).ready(function() {
//     $('#searchSpace').on('input', function() {
//         var userInput = $(this).val();
//         var validValues = $('#datalistOptions option').map(function() {
//             return $(this).val();
//         }).get();

//         if (!validValues.includes(userInput)) {
//             $(this).val('');
//         }
//     });
// });
$(document).ready(function() {
    $('#searchSpace').on('input', function() {
        var userInput = $(this).val().toLowerCase();
        var validValues = $('#datalistOptions option').map(function() {
            return $(this).val().toLowerCase();
        }).get();

        if (!validValues.includes(userInput)) {
            $(this).val(userInput);
        }
    });
});




      
const darkModeSwitch = document.getElementById('dark-mode-switch');
        const body = document.body;
        const moonIcon = document.getElementById('moon-icon');
        const sunIcon = document.getElementById('sun-icon');

        // Function to toggle dark mode styles
        function toggleDarkMode() {
            if (darkModeSwitch.checked) {
                body.setAttribute('data-bs-scheme', 'dark');
                toggleElementsLightToDark();
                moonIcon.style.display = 'none';
                sunIcon.style.display = 'inline-block';
            } else {
                body.setAttribute('data-bs-scheme', 'light');
                toggleElementsDarkToLight();
                moonIcon.style.display = 'inline-block';
                sunIcon.style.display = 'none';
            }
        }
        function toggleElementsDarkToLight() {
                    const elements = document.querySelectorAll('.dark');
                    elements.forEach(element => {
                        element.classList.remove('dark');
                        element.classList.add('light');
                    });
                }

                // Toggle elements from light to dark
                function toggleElementsLightToDark() {
                    const elements = document.querySelectorAll('.light');
                    elements.forEach(element => {
                        element.classList.remove('light');
                        element.classList.add('dark');
                    });
                }

        // Function to load dark mode preference from local storage
        function loadDarkModePreference() {
            const darkModePreference = localStorage.getItem('darkMode');
            if (darkModePreference === 'true') {
                darkModeSwitch.checked = true;
            } else {
                darkModeSwitch.checked = false;
            }
            toggleDarkMode();
        }

        // Listen for dark mode switch changes
        darkModeSwitch.addEventListener('change', () => {
            toggleDarkMode();
            // Store the dark mode preference in local storage
            localStorage.setItem('darkMode', darkModeSwitch.checked ? 'true' : 'false');
        });

        // Call the function to load dark mode preference on page load
        loadDarkModePreference();






      $(document).ready(function() {
        // Handle button clicks to show the corresponding content
        $('.btn').on('click', function() {
          var targetContent = $(this).data('target');
          $('.content').hide();
          $('#' + targetContent).show();
          $('.btn').removeClass('active');
          $(this).addClass('active');
        });
      });
      const priceRangeInput = document.getElementById('priceRange');
      const minPriceInput = document.getElementById('minPrice');
      const maxPriceInput = document.getElementById('maxPrice');
      priceRangeInput.addEventListener('input', () => {
        const selectedPrice = priceRangeInput.value;
        minPriceInput.value = selectedPrice;
        maxPriceInput.value = selectedPrice === "1000000" ? "1000000+" : selectedPrice;
      });
      const button1 = document.getElementById('showList');
      const button2 = document.getElementById('showMap');
      const content1 = document.getElementById('content1');
      const content2 = document.getElementById('content2');
      button1.addEventListener('click', () => {
        content1.style.display = 'block';
        content2.style.display = 'none';
        button1.classList.add('active');
        button2.classList.remove('active');
      });
      button2.addEventListener('click', () => {
        content1.style.display = 'none';
        content2.style.display = 'block';
        button1.classList.remove('active');
        button2.classList.add('active');
      });
      var map = L.map('map').setView([9.939093, 78.121719], 10);
      if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var x = position.coords.latitude;
          var y = position.coords.longitude;
          map.setView([x, y], 10);
          var userMarker = L.marker([x, y], {
            draggable: true
          }).addTo(map).bindPopup("Your Location");
          var userCoordinates = {
            lat: x,
            lng: y
          };
          var flag = 0;
          var geocoder = L.Control.geocoder({
            defaultMarkGeocode: false
          }).on('markgeocode', function(e) {
            map.eachLayer(function(layer) {
              if (layer instanceof L.Marker) {
                map.removeLayer(layer);
              }
            });
            var marker = L.marker(e.geocode.center, {
              draggable: true
            }).addTo(map);
            marker.bindPopup(e.geocode.name).openPopup();
            map.setView(e.geocode.center, 13);

            function updateCoordinates() {
              var coordinatesContainer = document.getElementById('coordinates-container');
              coordinatesContainer.textContent = marker.getLatLng().lat + ', ' + marker.getLatLng().lng;
              if (flag == 0) {
                coordinatesContainer.textContent = userMarker.getLatLng().lat + ', ' + userMarker.getLatLng().lng;
              }
            }
            marker.on('move', function(e) {
              flag = 1;
              if (flag == 1) {
                updateCoordinates();
              }
            });
            updateCoordinates();
          }).addTo(map);
        }, function(error) {
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


      const searchForm = document.getElementById('searchForm');
      const searchInput = document.getElementById('searchSpace');

      searchForm.addEventListener('submit', (event) => {
        // Modify the form action to include the user data
        searchForm.action = `/get_search_city/{{current_user}}/`;

        const selectedValue = searchInput.value;
        const currentUrl = window.location.href;
        const newUrl = currentUrl.split('?')[0] + `?searchSpace=${selectedValue}`;
        window.location.href = newUrl; // Redirect to the new URL
      });

      function check_switchHost(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_home/" + '{{current_user}}';
              }
          }

      function check_home(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_user_home/" + '{{current_user}}';
              }
          }

      function check_booking(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_user_booking/" + '{{current_user}}';
              }
          }

      function check_account(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_user_account/" + '{{current_user}}';
              }
          }

      function check_notification(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_user_notification/" + '{{current_user}}';
              }
          }

          function check_help(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_user_help/" + '{{current_user}}';
              }
          }

          function check_about(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_user_help/" + '{{current_user}}';
              }
          }

          function check_logout(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_login";
              }
          }
    </script>
    </body>
