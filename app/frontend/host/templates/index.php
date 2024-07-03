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
		<link rel="shortcut icon" type="image/x-icon" href="../asset/pics/icon.ico" />
		<title>Parko</title>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

		<!-- Bootstrap Icons CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Albert+Sans" rel="stylesheet" />

		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/header.css" />
		<link rel="stylesheet" href="../css/footer.css" />
		<link rel="stylesheet" href="../css/index.css" />
	</head>

	<body data-bs-scheme="light">
		<?php load_temp("header.php"); ?>

		<div class="p-5 mt-2 rounded-3 jumbotron-container light">
			<div class="container jumbotron mt-5 light">
				<h2 class="display-6 fw-bold light">Hello Host</h2>
				<p class="col-md-8 fs-5 light">Welcome to Parko, where you can easily monetize idle parking spots. Add and manage parking places to generate hassle-free revenue.</p>
				<a class="btn btn-primary btn-lg light" href="listing.php">Manage</a>
			</div>
		</div>
		<div class="container mt-5 prof-monetize light">
				<div class="card selector-date light mb-4 mt-3">
					<div class="card-header">Physical entry</div>
					<div class="card-body">
					<form id="vehicleCountForm">
        <div class="mb-3">
            <label for="carCount" class="form-label">Number of Cars:</label>
            <input type="number" class="form-control" id="carCount" value="5" required>
        </div>
        <div class="mb-3">
            <label for="heavyVehicleCount" class="form-label">Number of Heavy Vehicles:</label>
            <input type="number" class="form-control" id="heavyVehicleCount" value="2" required>
        </div>
        <div class="mb-3">
            <label for="motorTwoWheelerCount" class="form-label">Number of Motor Two Wheelers:</label>
            <input type="number" class="form-control" id="motorTwoWheelerCount" value="10" required>
        </div>
        <div class="mb-3">
            <label for="nonMotorTwoWheelerCount" class="form-label">Number of Non-Motor Two Wheelers:</label>
            <input type="number" class="form-control" id="nonMotorTwoWheelerCount" value="8" required>
        </div>
        <div class="modal-footer" style="display: flex;justify-content: center;">
            <button type="submit" class="btn btn-info">Add</button>
        </div>
    </form>
					</div>
				</div>
		</div>
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
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
											<a type="button" class="btn btn-info">Parked In</a>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
											<a type="button" class="btn btn-info">Parked out</a>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
											<a type="button" class="btn btn-info">Parked out</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="content2" class="content" style="display: none;">
						<div class="custom-card light ">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
											<a class="btn btn-danger">Cancel</a>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
											<a class="btn btn-danger">Cancel</a>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
											<a class="btn btn-danger">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="content3" class="content" style="display: none;">
						<div class="custom-card light ">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body">
											<h5 class="card-title">Vehicle number</h5><span class="badge text-bg-primary">Completed</span>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body light">
											<h5 class="card-title">Vehicle number</h5><span class="badge text-bg-primary">Completed</span>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card text-center mb-3 booked-card light">
										<div class="card-body light">
											<h5 class="card-title">Vehicle number</h5><span class="badge text-bg-primary">Missed</span>
											<hr />
											<h7 class="card-text">Vehicle type</h7><br />
											<h7 class="card-text">Time</h7><br />
											<h7 class="card-text">Contact</h7><br />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php load_temp("footer.php"); ?>

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
		document.getElementById("vehicleCountForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            var carCount = document.getElementById("carCount").value;
            var heavyVehicleCount = document.getElementById("heavyVehicleCount").value;
            var motorTwoWheelerCount = document.getElementById("motorTwoWheelerCount").value;
            var nonMotorTwoWheelerCount = document.getElementById("nonMotorTwoWheelerCount").value;
            
            // Do something with the values, e.g., display them
            console.log("Car Count:", carCount);
            console.log("Heavy Vehicle Count:", heavyVehicleCount);
            console.log("Motor Two Wheeler Count:", motorTwoWheelerCount);
            console.log("Non-Motor Two Wheeler Count:", nonMotorTwoWheelerCount);
        });
            
		</script>
	</body>
</html>

