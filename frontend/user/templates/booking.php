<?php include "../libs/load.php"; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<meta name="generator" content="Hugo 0.112.5" />
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<link rel="shortcut icon" type="image/x-icon" href="forntend/user/asset/icons/icon.ico" />
		<title>Parko</title>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

		<!-- Bootstrap Icons CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Albert+Sans" rel="stylesheet" />

		<!-- Custom CSS -->
		<link rel="stylesheet" href="/frontend/user/css/header.css" />
		<link rel="stylesheet" href="/frontend/user/css/footer.css" />
		<link rel="stylesheet" href="/frontend/user/css/booking.css" />
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

    <div class="container mt-5 mb-5 booking-container">
    <div class="row">
    {% for data in data %}
    <div class="col-lg-4 col-md-6 mb-5 mt-1 book-card">
      <div class="card light">
        <div class="card-header">
          {{data.vehicleNumber}} <span class="badge bg-success text-white">{% if data.booking_status == 0%} Not Yet {% elif data.booking_status == 2 %} Parked {% elif data.booking_status == 3 %} Completed {% endif %} </span>
          </div>
            <div class="card-body">
              <p class="card-text">Booking ID : #176-590</p>
              <p class="card-text">Vehicle Type : {{ data.vehicleType }}</p>
              <p class="card-text">Booked Date : {{ data.created_at[:10] }}</p>
              <input type="hidden" id="starttime{{ data.id }}" name="starttime" value="{{ data.startTime }}">
              <input type="hidden" id="endtime{{ data.id }}" name="endtime" value="{{ data.endTime }}">
                <p class="card-text">
                    Parking Time: {{ data.startTime.strftime('%H:%M') }} ({{ data.startDate }}) -
                    {{ data.endTime.strftime('%H:%M') }} ({{ data.endDate }})
                </p>

                <p class="card-text" id="remaininghours{{ data.id }}" name="remaininghours"></p>

                {% if data.booking_status == 0 or data.booking_status == 1 %}
              
                  <a href="#" class="btn btn-primary" type="button" onclick="add_user('{{data.id}}')">Extend Time</a>
                  <a href="#" class="btn btn-danger" type="button">HELP</a>
                  <a href="map.php?lat=9.9315573&lon=78.1022729" class="btn btn-primary">Directions</a>
                
              
                {% elif data.booking_status == 2 %}
                <a href="#" class="btn btn-danger" type="button">HELP</a>
                <a href="#" class="btn btn-primary" type="button" onclick="add_user1('{{data.id}}')" >Review</a>
                {% endif %}
            </div>
          </div>
        </div>
        {% endfor %}
    </div>
  
</div>

    </div>
    
    <!-- <div class="col-lg-4 col-md-6 mb-5 mt-1 book-card">
      <div class="card light">
        <div class="card-header">
          TN 96 E 3448 <span class="badge bg-info text-white">yet to go</span>
        </div>
        <div class="card-body">
          <p class="card-text">Booking ID : #176-590</p>
          <p class="card-text">Vehicle Type : Motor Two Wheeler</p>
          <p class="card-text">Booked Date : 04/08/2023</p>
          <p class="card-text">Parking Time : 2.00PM - 5.30 PM</p>
          <p class="card-text">3.30 Hours]</p>
          <a href="map.php?lat=9.9315573&lon=78.1022729" class="btn btn-primary">Directions</a>
          <a href="#" class="btn btn-danger" type="button">HELP</a>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-5 mt-1 book-card">
      <div class="card light">
        <div class="card-header">
          TN 96 E 3448 <span class="badge bg-secondary text-white">completed</span>
        </div>
        <div class="card-body">
          <p class="card-text">Booking ID : #176-590</p>
          <p class="card-text">Vehicle Type : Motor Two Wheeler</p>
          <p class="card-text">Booked Date : 04/08/2023</p>
          <p class="card-text">Parking Time : 2.00PM - 5.30 PM </p>
          <p class="card-text">3.30 Hours]</p>
          <a href="#" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#reviewModal">Review</a>
          <a href="#" class="btn btn-danger" type="button">HELP</a>
        </div>
      </div>
    </div> -->
  </div>
    </div>

<div class="modal fade" id="extendModal" tabindex="-1" aria-labelledby="extendModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content book-modal ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="extendModalLabel">Extend</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            <form class="mb-3" action="/post_extend/{{current_user}}" method="post" > 
                <input type="hidden" class="form-control" id="id" name="id">
                <label for="userInput" class="form-label">Enter Time to be Extend (minimum 1 hour):</label>
                <input type="number" class="form-control" id="userInput" name="userInput" min="1" oninput="calculateValue()">
                <label for="calculatedValue" class="form-label">Price :</label>
                <input type="text" class="form-control" id="calculatedValue" name="calculatedValue" readonly>
                <button type="submit" class="btn btn-info mt-3">Pay & Proceed</button>
            </form>
          </div>
          <div class="modal-footer">
          </div>
          </div>
        </div>
    </div>


<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content book-modal ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="reviewModalLabel">Give Your Review</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="mb-3" action="/post_review/{{current_user}}" method="post" > 
              <div class="star-rating" data-rating="0" >
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
              </div>
              <input type="hidden" name="reviewRating" id="reviewRating" value="0">
              <textarea class="form-control mt-2" rows="4" placeholder="Write your review here" id="review" name="review" ></textarea>
              <input type="hidden" class="form-control" id="re_id" name="re_id">
              <button type="submit" class="btn btn-primary mt-2" onclick="submitReview()">Submit Review</button>
              </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>


</div>


{% include "footer.php" %}

    <script src="/frontend/user/js/booking.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<!-- Include Popper.js for Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
		<!-- Include Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

		<script>
              function updateRemainingTime(id) {
                alert(id);
                const startDateTime = new Date(document.getElementById('starttime'+id).value);
                const endDateTime = new Date(document.getElementById('endtime'+id).value);
                const currentTime = new Date();
                var f="remaininghours"+id;
                alert(id);

              if (currentTime >= startDateTime && currentTime <= endDateTime) {
                  const remainingMilliseconds = endDateTime - currentTime;

                  const days = Math.floor(remainingMilliseconds / (1000 * 60 * 60 * 24));
                  const hours = Math.floor((remainingMilliseconds % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  const minutes = Math.floor((remainingMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
                  const seconds = Math.floor((remainingMilliseconds % (1000 * 60)) / 1000);

                  const remainingTimeText = `${days} days, ${hours} hours, ${minutes} minutes, ${seconds} seconds`;
                  
                  
                  document.getElementById(f).textContent = remainingTimeText;
              } else if (currentTime > endDateTime) {
                  document.getElementById(f).textContent = 'Time expired';
              } else {
                  document.getElementById(f).textContent = 'Time has not started yet';
              }
              console.log("werty");
          }
         // Initial update
          setInterval(updateRemainingTime, 1000); 

        //   window.onload=updateRemainingTime;
          
        //   document.addEventListener('DOMContentLoaded', function() {
        //      updateRemainingTime(); // Initial update
        //     setInterval(updateRemainingTime, 1000); // Update every second
        // });
      
          window.onload = function() {
                {% for data in data %}
                    updateRemainingTime('{{ data.id }}');
                {% endfor %}
          };
          setInterval(function() {
              {% for data in data %}
                  updateRemainingTime('{{ data.id }}');
              {% endfor %}
          }, 1000);
          
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
                function add_user(id) {
                    alert("88");
                    console.log(id);
                    $("#id").val(id);
                    $("#extendModal").modal('show');
                }

                function add_user1(re_id) {
                    alert("88");
                    console.log(re_id);
                    $("#re_id").val(re_id);
                    $("#reviewModal").modal('show');
                }

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
</html>