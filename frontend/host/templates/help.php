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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
		<link rel="stylesheet" href="../css/help.css" />
</head>
<body data-bs-scheme="light">
<?php load_temp("header.php"); ?>
<div class="container-yet">
    <form style="text-align:center;" id="queryForm">
        <div class="mb-3">
            <label for="spaceInstructions" class="form-label">Submit your query in as a detailed description:</label>
            <textarea class="form-control" id="spaceInstructions" required rows="6"></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Report</button>
    </form>
</div>
<?php load_temp("footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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


       
        const queryForm = document.getElementById("queryForm");

        queryForm.addEventListener("submit", function (event) {
            event.preventDefault();

            // Get the textarea element
            const textarea = document.getElementById("spaceInstructions");

            // Create a Bootstrap alert
            const alertElement = document.createElement("div");
            alertElement.classList.add("alert", "alert-success", "mt-3");
            alertElement.textContent = "Query submitted to the Help Center. You will receive a reply soon. Check the Notifications.";

            // Append the alert to the container
            const container = document.querySelector(".container-yet");
            container.appendChild(alertElement);

            // Reset the form
            queryForm.reset();

            // Automatically remove the alert after 5 seconds
            setTimeout(function () {
                alertElement.remove();
            }, 3000);
        });
    </script>
</body>