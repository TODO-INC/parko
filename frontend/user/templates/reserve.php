<?php
include "../libs/load.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="generator" content="Hugo 0.112.5">
      <link rel="shortcut icon" type="image/x-icon" href="/frontend/user/asset/icons/icon.ico" />
      <title>Parko</title>

      <title>Your Page Title</title>
      <!-- Bootstrap CSS (CDN) -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!-- Bootstrap Icons (CDN) -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Albert+Sans" rel="stylesheet" />
      <!-- BaguetteBox CSS (CDN) -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
      <!-- Your Custom CSS Files -->
      <link rel="stylesheet" href="/frontend/user/css/header.css">
      <link rel="stylesheet" href="/frontend/user/css/footer.css">
      <link rel="stylesheet" href="/frontend/user/css/reserve.css">
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <!-- Popper.js -->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
      <!-- Bootstrap JS (CDN) -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <!-- BaguetteBox JS (CDN) -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
      <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
      <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
      <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
      <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
</head>


<body> 
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
  <div class="container mt-3">
    <div class="mb-4 rounded-3 jumbo-tron-container">
      <div class="container-fluid jumbo-tron">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-8">
            <h1 class="fw-bold">{{data.namespaceName}}</h1>
            <!-- <a class="btn btn-primary btn-lg" href="listing.php">Listing</a> -->
            <div class="rating-info d-flex align-items-center">
              <div id="rating-container" class="align-items-center">
                <span id="star-container"></span>
                <span id="rating-count">(1307)</span>
              </div>
              <h6 class="mb-0 ms-2">{{data.spaceCity}}, India</h6>
            </div>
          </div>
          <div class="col-md-4 text-end">
            <i id="bookmark-icon" class="bi bi-bookmark"></i>
          </div>

        </div>
        <div class="row gallery">
          <div class="col-sm-6 col-md-4 col-lg-4">
            <a href="/frontend/host/uploadimage/{{data.spaceFileMultiple1}}">
              <img class="img-fluid" src="/frontend/host/uploadimage/{{data.spaceFileMultiple1}}">
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <a href="/frontend/host/uploadimage/{{data.spaceFileMultiple1}}">
              <img class="img-fluid" src="/frontend/host/uploadimage/{{data.spaceFileMultiple1}}">
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <a href="/frontend/host/uploadimage/{{data.spaceFileMultiple1}}">
              <img class="img-fluid" src="/frontend/host/uploadimage/{{data.spaceFileMultiple1}}">
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <a href="/frontend/host/uploadimage/{{data.spaceFileMultiple1}}">
              <img class="img-fluid" src="/frontend/host/uploadimage/{{data.spaceFileMultiple1}}">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div> 

  <div class="container mt-1">
  <h2 class="mb-1">Host - {{data1.name}}</h2>
  <hr>
  <a><span class="badge bg-primary">Private Residential</span> <span class="badge bg-info">Subscription</span> <span class="badge bg-success">Current</span></a>
  <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem consequatur culpa nesciunt tempore expedita quibusdam maiores, unde quidem.</p>
  <hr>

  
  <!-- Display text in a card with a border and shadow -->

  
  <h5>Chosen Amenities</h5>
<ul class="list-group">
    {% for amenity in data2 %}
    <li class="list-group-item">
        <img src="/frontend/user/asset/icons/{{ data3[amenity] }}" style="height:25px;"> {{ amenity }}
    </li>
    {% endfor %}
</ul>



  <div class="card mb-2 mt-2">
    <div class="card-body">
      <h4>Address</h4>
      <p>{{data.spaceAddress}},</p>
      <p>{{data.spaceCity}}</p>
      <p>Pin : {{data.spacePincode}}</p>
    </div>
  </div>
  <div class="card mt-2 mb-2">
    <div class="card-body">
      <h4>Location</h4>
      </div>
  </div>

  <div class="container mt-3 prof-monetize">
      <h3 style="text-align:center;" class="mt-1 mb-1">COMMENTS</h3>
      <hr>
    <div class="row row-cols-1 mb-2">
      <div class="col-12 mb-2 mt-2">
        <div class="container comment-container">
          <h5 class="bg-1 mt-1">Ram</h5>
          <p class="bg-2 p-2">Easy to park</p>
        </div>
      </div>
    </div>
    <div class="row row-cols-1">
      <div class="col-12 mb-2 mt-2">
        <div class="container comment-container">
          <h5 class="bg-1 mt-1">Yoga</h5>
          <p class="bg-2 p-2">Safe parking </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container checkout mb-3 mt-3">
<div class="fixed">
    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#checkoutModal">Checkout</button>
  </div>
</div>




<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-checkout">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="checkoutModalLabel">Reservation Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="/post_register/{{data4}} " method="post">
                <input type="hidden" class="form-control" id="host_id" name="host_id" value="{{data.host_id}}" >
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{data2}}" >
                    <div class="mb-3">

                        <label for="vehicleType" class="form-label">Select Vehicle Type:</label>
                        <select class="form-select" id="vehicleType"  name="vehicleType" required>
                            <option value="trailer">Trailer Truck(Eight Wheeler)</option>
                            <option value="truck">Truck(Heavy Four Wheeler)</option>
                            <option value="cabinTruck">Cabin Van(Four Wheeler)</option>
                            <option value="fullCar">Full Size SUV(Four Wheeler)</option>
                            <option value="mediumCar">Medium Size car (Four Wheeler)</option>
                            <option value="compactCar">Compact Car(Four Wheeler)</option>
                            <option value="twoWheeler">Motor Two Wheeler</option>
                            <option value="bicycle">Non Motor Bicycle</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="vechileNumber" class="form-label">Vechile Number:</label>
                        <input type="text" class="form-control" id="vehicleNumber"  name="vehicleNumber">
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date:</label>
                        <input type="date" class="form-control" id="startDate"  name="startDate" min="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="startTime" class="form-label">Start Time:</label>
                        <input type="time" class="form-control" id="startTime" name="startTime"  min="<?= date('H:i', strtotime('+1 hour')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate"min="<?= date('Y-m-d', strtotime('+1 day')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="endTime" class="form-label">End Time:</label>
                        <input type="time" class="form-control" id="endTime" name="endTime" min="<?= date('H:i', strtotime('+2 hours')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Cost:</label>
                        <input type="text" class="form-control" id="cost" name="cost" readonly>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="calculateCost()">Calculate Cost</button>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Proceed</button>
            </div>
            </form>
        </div>
    </div>
</div>





{% include "footer.php" %}
  <script src="/frontend/user/js/reserve.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src = "/frontend/user/js/maploc.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
  <script>

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