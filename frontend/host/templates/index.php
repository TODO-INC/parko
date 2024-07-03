<?php
include "../libs/load.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="/frontend/host/vendor/assets/js/color-modes.js"></script>

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
    <link rel="stylesheet" href="/frontend/host/css/header.css">
    <link rel="stylesheet" href="/frontend/host/css/footer.css">
    <link rel="stylesheet" href="/frontend/host/css/index.css">
  </head>

<body>
  <!-- header -->
  <header class="navbar navbar-expand-md custom-common-container light">
	<div class="container-md custom-common-header light">
		<a class="navbar-brand light" href="#">
			<img class="icon light" height="40px" src="/frontend/host/asset/pics/parko.png" alt="Parko Logo" />
		</a>

		<button class="navbar-toggler light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon light"></span>
		</button>

		<div class="collapse navbar-collapse light" id="navbarNav">
		<ul class="navbar-nav mx-auto light">
    <li class="nav-item light mx-2">
        <a class="nav-link light" href="#" onclick="check_home('Add',{{user_id}})">Home</a>
    </li>
    <li class="nav-item light mx-2">
        <a class="nav-link light" href="#"onclick="check_listing('Add',{{user_id}})" >Listing</a>
    </li>
    <li class="nav-item light mx-2">
        <a class="nav-link light" href="#" onclick="check_profile('Add',{{user_id}})">Profile</a>
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
						<li><a href="#" onclick="check_switchGuest('Add',{{user_id}})"class="tog">Switch - Guest</a></li>
						<li><a href="#" onclick="check_logout('Add',{{user_id}})" class="tog">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</header>


    <!-- jumbotron -->
    <div class="p-5 mb-4 rounded-3 jumbo-tron-container">
      <div class="container-fluid py-5 jumbo-tron">
        <h1 class="display-6 fw-bold">Hello Host</h1>
        <p class="col-md-8 fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, corporis enim, ex itaque temporibus laudantium sunt ab earum officiis eum laboriosam eius nam </p>
        <a class="btn btn-primary btn-lg" onclick="add_space('Add')">Listing</a>
      </div>
    </div>

    <!-- control card -->
    <div class="container mt-2 custom-manage-card light">
			<div class="card custom-manage-card light">
				<div class="card-header light">
					<button type="button" class="btn btn-primary active light" data-target="content1">Present</button>
					<button type="button" class="btn btn-primary light" data-target="content2">Upcoming</button>
					<button type="button" class="btn btn-primary light" data-target="content3">Past</button>
				</div>
				<div class="card-body custom-card-body light">
        <div id="content1" class="content">
						<div class="custom-card light">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 light gy-3">
                {%for data in data%}
                {% for i in data %}
                {% if i.booking_status!=2 and (i.booking_status == 1 or  i.startDate==date) %}
								<div class="col">
                  
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">VehicleType : {{i.vehicleType}}</h7><br />
											<h7 class="card-text">Time : {{i.startTime.strftime('%H:%M')}}</h7><br />
											<h7 class="card-text">Contact: 6382247911</h7><br />
                      {% if i.booking_status == 0 and i.startDate == date %}
                      <form>
                          <button type="button" class="btn btn-info" id="user_id" name="user_id" value="{{i.id}}" onclick="check_user('Add', '{{i.user_id}}')">Parked In</button>
                      </form>
                      {% elif i.booking_status == 1 %}
                      <form>
                          <button type="button" class="btn btn-info" id="user_id" name="user_id" value="{{i.id}}" onclick="check_userr('Add', '{{i.user_id}}')">Parked out</button>
                      </form>
                      {% endif %}
										</div>
									</div>
								</div>
                {% endif %}
                {% endfor %}
                {% endfor %}		
						  </div> 
					  </div>
          </div>
					<div id="content2" class="content" style="display: none;">
          <div class="custom-card light">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 light gy-3">
                {%for data in data%}
                {% for i in data %}
                {% if i.booking_status==0 and i.startDate!=date %}
								<div class="col">
                  
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">VehicleType : {{i.vehicleType}}</h7><br />
											<h7 class="card-text">Time : {{i.startTime.strftime('%H:%M')}}</h7><br />
											<h7 class="card-text">Contact: 6382247911</h7><br />
										</div>
									</div>
								</div>
                {% endif %}
                {% endfor %}
                {% endfor %}		
						  </div> 
					  </div>
					</div>
					<div id="content3" class="content" style="display: none;">
          <div class="custom-card light">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 light gy-3">
                {%for data in data%}
                {% for i in data %}
                {% if i.booking_status==2%}
								<div class="col">
                  
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">VehicleType : {{i.vehicleType}}</h7><br />
											<h7 class="card-text">Time : {{i.startTime.strftime('%H:%M')}}</h7><br />
											<h7 class="card-text">Contact: 6382247911</h7><br />
										</div>
									</div>
								</div>
                {% endif %}
                {% endfor %}
                {% endfor %}		
						  </div> 
					  </div>
					</div>
				</div>
			</div>
		</div>
    {% include "footer.php" %}
    <!-- Add the Bootstrap JS and jQuery scripts -->		
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Popper.js for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function () {
                // Handle button clicks to show the corresponding content
                $('.btn').on('click', function () {
                    var targetContent = $(this).data('target');
                    $('.content').hide();
                    $('#' + targetContent).show();
                    $('.btn').removeClass('active');
                    $(this).addClass('active');
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

        

        function check_user(action, id) {
        if(action="Add"){
        alert("*");
            
        var formData = {
            id: $("#user_id").val(),
          
        };
        console.log(formData);
        $.ajax({
            type: "POST",
            url: "/post_parkin/"+id,
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data1) {
                if (data1) {
                  window.location.href = "/get_home/" + data1;
              }
                

        
        });

        event.preventDefault();


      } 
      }

      function check_userr(action, id) {
        if(action="Add"){
        alert("*");
            
        var formData = {
            id: $("#user_id").val(),
          
        };
        console.log(formData);
        $.ajax({
            type: "POST",
            url: "/post_parkout/"+id,
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data1) {
                if (data1) {
                  window.location.href = "/get_home/" + data1;
              }
                

        
        });

        event.preventDefault();


      } 
      }

      function add_space(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_listing/" + '{{current_user}}';
              }
          }
          
     function check_switchGuest(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_user_home/" + '{{current_user}}';
              }
          }

      function check_home(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_home/" + '{{current_user}}';
              }
          }

      function check_listing(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_listing/" + '{{current_user}}';
              }
          }


		  function check_profile(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_profile/" + '{{current_user}}';
              }
          }

      function check_account(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_account/" + '{{current_user}}';
              }
          }

      function check_notification(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_notification/" + '{{current_user}}';
              }
          }

          function check_help(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_help/" + '{{current_user}}';
              }
          }

          function check_about(action) {
              if (action === "Add") {
                  alert("***");
                  window.location.href = "/get_about/" + '{{current_user}}';
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
