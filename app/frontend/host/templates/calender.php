<!-- <?php // include "../libs/load.php"; ?>

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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
		<link href="https://fonts.googleapis.com/css?family=Albert+Sans" rel="stylesheet" />

		<link rel="stylesheet" href="../css/header.css" />
		<link rel="stylesheet" href="../css/footer.css" />
		<link rel="stylesheet" href="../css/calender.css" />
	</head>

	<body data-bs-scheme="light">

  <?php //load_temp("header.php"); ?>

  <div class="container mt-5 mb-5">
    <h1>Booking Calendar with Events</h1>
    <div class="controls">
      <button onclick="prevMonth()">Previous Month</button>
      <button onclick="goToToday()">Go to Today</button>
      <button onclick="nextMonth()">Next Month</button>
      <hr>
      <h2 id="monthName"></h2>
    </div>
    <div class="calendar" id="calendar"></div>
    <div class="popup-card" id="popupCard">
      <div class="popup-content">
        <h2>Day Details</h2>
        <p id="popupDate"></p>
        <button id="closePopupButton" onclick="closePopup()">Close</button>
      </div>
    </div>

    <div class="calendar" id="calendar"></div>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-header">
        <h5 class="Parkings"</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <p id="popupDate">Try scrolling the rest of the page to see this option in action.</p>
        <button id="closePopupButton" onclick="closePopup()">Close</button>
      </div>
    </div>
  </div>

  <?php load_temp("footer.php"); ?>
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







        let currentYear, currentMonth;
let selectedDate = null;
const blockedDates = [];

function createCalendar(year, month) {
  const calendar = document.getElementById("calendar");
  calendar.innerHTML = "";

  const today = new Date();
  currentYear = year || today.getFullYear();
  currentMonth = month || today.getMonth();

  const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
  const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();

  const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

  for (let i = 0; i < daysOfWeek.length; i++) {
    const dayName = daysOfWeek[i];
    const dayHeader = document.createElement("div");
    dayHeader.classList.add("day");
    dayHeader.textContent = dayName;
    calendar.appendChild(dayHeader);
  }

  for (let day = 1; day <= daysInMonth + firstDayOfMonth; day++) {
    const dayElement = document.createElement("div");
    dayElement.classList.add("day");

    if (day > firstDayOfMonth) {
      const date = new Date(currentYear, currentMonth, day - firstDayOfMonth);
      dayElement.textContent = date.getDate();
      dayElement.dataset.date = date.toDateString();
      dayElement.addEventListener("click", () => selectDate(date, dayElement));

      if (date < today) {
        dayElement.classList.add("highlighted");
      }

      if (selectedDate && date.toDateString() === selectedDate.toDateString()) {
        dayElement.classList.add("selected");
      }

      if (date.toDateString() === today.toDateString()) {
        dayElement.classList.add("current-day");
      }

      if (blockedDates.some(blockedDate => blockedDate.toDateString() === date.toDateString())) {
        dayElement.classList.add("blocked");
      }
    }

    calendar.appendChild(dayElement);
  }
}

function updateMonthName() {
  const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  const monthName = monthNames[currentMonth];
  document.getElementById("monthName").textContent = `${monthName} ${currentYear}`;
}

function goToToday() {
  const today = new Date();
  selectedDate = today;
  currentYear = today.getFullYear();
  currentMonth = today.getMonth();
  createCalendar(currentYear, currentMonth);
  updateMonthName();
}

function prevMonth() {
  currentMonth--;
  if (currentMonth < 0) {
    currentYear--;
    currentMonth = 11;
  }
  createCalendar(currentYear, currentMonth);
  updateMonthName();
}

function nextMonth() {
  currentMonth++;
  if (currentMonth > 11) {
    currentYear++;
    currentMonth = 0;
  }
  createCalendar(currentYear, currentMonth);
  updateMonthName();
}

function openPopup(date, clickedDayElement) {
  const popupDate = document.getElementById("popupDate");
  popupDate.textContent = date.toDateString();

  const offcanvas = new bootstrap.Offcanvas(document.getElementById("offcanvasScrolling"));
  offcanvas.show();
}

function closePopup() {
  const offcanvasScrolling = new bootstrap.Offcanvas(document.getElementById("offcanvasScrolling"));
  offcanvasScrolling.hide();
}

function selectDate(date, clickedDayElement) {
  selectedDate = new Date(date);
  createCalendar(currentYear, currentMonth);
  openPopup(selectedDate, clickedDayElement);
}


function addEvent(date, event) {
  event.stopPropagation();
  const eventTypeInput = document.getElementById("eventTypeInput");
  const eventType = eventTypeInput.value.trim();

  if (eventType) {
    const dayElement = event.target.closest(".day");
    const eventButton = dayElement.querySelector(".event-button");

    eventButton.textContent = eventType;
    eventButton.classList.add("event-set");

    eventTypeInput.value = "";
    eventTypeInput.focus();

    alert(`Event added for ${date.toDateString()} with type: ${eventType}`);
  }
}

function addEventFromInput() {
  if (selectedDate) {
    const eventTypeInput = document.getElementById("eventTypeInput");
    const eventType = eventTypeInput.value.trim();

    if (eventType) {
      const dayElement = document.querySelector(`[data-date="${selectedDate.toDateString()}"]`);
      const eventButton = dayElement.querySelector(".event-button");

      eventButton.textContent = eventType;
      eventButton.classList.add("event-set");

      eventTypeInput.value = "";
      eventTypeInput.focus();

      alert(`Event added for ${selectedDate.toDateString()} with type: ${eventType}`);
    }
  }
}

createCalendar();
updateMonthName();

  </script>
</body>
</html> -->
