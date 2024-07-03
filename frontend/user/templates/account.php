<?php
include "../libs/load.php";
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
	<head>
		<script src="/frontend/user/vendor/assets/js/color-modes.js"></script>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<meta name="generator" content="Hugo 0.112.5" />
		<link rel="shortcut icon" type="image/x-icon" href="../asset/icons/icon.ico" />
		<title>Parko</title>
		<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
		<link href="../vendor/assets/dist/css/bootstrap.min.css" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
		<link href="https://fonts.googleapis.com/css?family=Albert+Sans" rel="stylesheet" />
		<script src="vendor/assets/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="/frontend/user/css/header.css" />
		<link rel="stylesheet" href="/frontend/user/css/footer.css" />
		<link rel="stylesheet" href="/frontend/user/css/account.css" />
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

		<div class="p-5 mb-4 rounded-3 jumbo-tron-container">
			<div class="container py-1 jumbo-tron">
				<h1 class="display-6 fw-bold">Host</h1>
				<p class="col-md-8 fs-5">Go to profile, <a class="btn btn-primary btn" href="profile.php">Profile</a></p>
			</div>
		</div>

	    <div class="container-content">
        <div class="container container-acc py-1 mt-2 light">
            <div class="row row-cols-1 row-cols-md-3 g-3 mt-2">
                <!-- Personal Info Card and Modal -->
                <div class="col">
                    <button type="button" class="card-button light" data-bs-toggle="modal" data-bs-target="#infoModal">
                        <i class="bi bi-person-lines-fill"></i>
                        <h5 class="card-title">Personal Info</h5>
                        <p>Your personal details</p>
                    </button>
                    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
							<div class="modal-content  card-caro light">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="infoModalLabel">Info</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
                                <form id="user-form">
                                <div class="mb-3">
                                <label for="legalName" class="form-label">Legal Name</label>
                                <input type="text" class="form-control" id="legalName" required>
                                </div>
                                <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" required>
                                </div>
                                <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" required>
                                </div>
                                <div class="mb-3">
                                <label for="governmentId" class="form-label">Government ID</label>
                                <input type="text" class="form-control" id="governmentId" required>
                                </div>
								</div>
								<div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
								</div>
                                </form>
							</div>
						</div>
                    </div>
                </div>

                <!-- Security Policy Card and Modal -->
                <div class="col">
                    <button type="button" data-bs-toggle="modal" class="card-button light"
                        data-bs-target="#securityModal">
                        <i class="bi bi-shield-check"></i>
                        <h5 class="card-title">Security Policy</h5>
                        <p>Security policies of the Parko</p>
                    </button>
                    <div class="modal fade" id="securityModal" tabindex="-1"
                        aria-labelledby="securityModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
							<div class="modal-content card-caro light">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="securityModalLabel">Security</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
                                <p>Welcome to Parko. This security policy outlines our commitment to protecting your data and ensuring a secure experience.</p>
                                
                                <h4>1. Data Collection and Usage</h4>
                                <p>We collect and process personal data for parking reservations and related communication. Your data is securely stored and only used for reservation purposes.</p>
                                
                                <h4>2. Data Security Measures</h4>
                                <ul>
                                <li>All data transmissions are encrypted using SSL/TLS protocols.</li>
                                <li>Secure payment gateways handle transactions.</li>
                                <li>Access to data is restricted to authorized personnel.</li>
                                <li>Regular security audits and assessments are conducted.</li>
                                </ul>
                                
                                <h4>3. User Authentication</h4>
                                <p>We employ strong user authentication mechanisms to ensure that only authorized users can access and manage their reservations.</p>
                                
                                <h4>4. Privacy</h4>
                                <p>We respect your privacy and adhere to applicable data protection laws. Please review our separate Privacy Policy for more details on how we handle your personal information.</p>
                                
                                <h4>5. Incident Response</h4>
                                <p>In the event of a data breach or security incident, we have a well-defined incident response plan in place. We will notify affected users and take appropriate measures to mitigate the impact of the incident.</p>
                                
                                <h4>6. User Responsibility</h4>
                                <p>While we implement stringent security measures, your active cooperation is essential:</p>
                                <ul>
                                <li>Keep your login credentials confidential.</li>
                                <li>Regularly update your password.</li>
                                <li>Log out of your account after each session, especially on shared devices.</li>
                                </ul>
                                
                                <h4>7. Contact Information</h4>
                                <p>If you have security concerns or need to report a security-related issue, please contact our security team at <a href="mailto:security@email.com">security@email.com</a>.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
							</div>
						</div>
                    </div>
                </div>

                <!-- Payments and Payouts Card and Modal -->
                <div class="col">
                    <button type="button" data-bs-toggle="modal" class="card-button light"
                        data-bs-target="#paymentModal">
                        <i class="bi bi-credit-card"></i>
                        <h5 class="card-title">Payments and Payouts</h5>
                        <p>Review payments, payouts methods</p>
                    </button>
                    <div class="modal fade" id="paymentModal" tabindex="-1"
                        aria-labelledby="paymentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
							<div class="modal-content card-caro light">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="paymentModalLabel">Payment</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
                                    <p>Choose your preferred payment option for making parking reservations:</p>
                                    
                                    <h4>1. Credit Card</h4>
                                    <p>Pay using your credit card. We accept Visa, MasterCard, and American Express.</p>
                                    
                                    <h4>2. UPI</h4>
                                    <p>Use your UPI account for a convenient and secure payment experience.</p>
                                    
                                    <h4>3. Digital Wallets</h4>
                                    <p>Pay with popular digital wallets such as Paytm and Google Pay.</p>
                                    
                                    <h4>4. Bank Transfer</h4>
                                    <p>Transfer funds directly from your bank account to make your reservation.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
							</div>
						</div>
                    </div>
                </div>
            </div>

            <!-- Earnings Card and Modal -->
            <div class="row row-cols-1 row-cols-md-3 g-3 mt-2">
                <div class="col">
                    <button type="button" data-bs-toggle="modal" class="card-button light"
                        data-bs-target="#savedModal">
                        <i class="bi bi-bookmarks"></i>
                        <h5 class="card-title">Saved</h5>
                        <p>You saved park spaces</p>
                    </button>
                    <div class="modal fade" id="savedModal" tabindex="-1"
                        aria-labelledby="savedModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
							<div class="modal-content card-caro light">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="savedModalLabel">Saved</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
                                    <div class="card mb-2 mt-1 book-card">
                                        <div class="card-header "></div>
										<div class="card-body">
                                                <p class="card-text">Private Commercial</p>
                                                <p class="card-text">₹5 per hour</p>
                                                <p class="card-text">
                                                <div id="rating-container" class="align-items-center">
                                                <span id="star-container"></span>
                                                <span id="rating-count">(1307)</span>
                                            </div>
                                            </p>
                                            <a href="reserve.php" class="btn btn-info">More</a>
                                            <a href="map.php?lat=9.9315573&lon=78.1022729" class="btn btn-primary">Directions</a>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
                    </div>
                </div>
                <div class="col">
                    <button type="button" data-bs-toggle="modal" class="card-button light"
                        data-bs-target="#walletModal">
                        <i class="bi bi-wallet2"></i>
                        <h5 class="card-title">Wallet</h5>
                        <p>Your Saved Money</p>
                    </button>
                    <div class="modal fade" id="walletModal" tabindex="-1"
                        aria-labelledby="walletModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
							<div class="modal-content card-caro light">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="walletModalLabel">Saved</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
                                    <div class="card mb-2 mt-1 book-card">
                                        <div class="card-header ">Wallet</div>
                                            <div class="card-body">
                                                <p class="card-text">Balance</p>
                                                <p class="card-text">Rs. 5648</p>
                                            </div>
                                            <a href="#" class="btn btn-info">Add +</a>
                                        </div>
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
        <script src="/frontend/user/js/account.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
</html>




											