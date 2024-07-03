// This function calculates the average rating and displays the stars
function displayRating() {
  const starContainer = document.getElementById('star-container');
  const ratingCount = document.getElementById('rating-count');
  const averageRating = 3.5; // You can set the average rating dynamically here
  
  // Display the stars based on the average rating
  let starsHtml = '';
  for (let i = 1; i <= 5; i++) {
    if (i <= Math.floor(averageRating)) {
      starsHtml += '<i class="bi bi-star-fill"></i>';
    } else if (i === Math.ceil(averageRating) && averageRating % 1 !== 0) {
      starsHtml += '<i class="bi bi-star-half"></i>';
    } else {
      starsHtml += '<i class="bi bi-star"></i>';
    }
  }
  var total = 1307;
  starContainer.innerHTML = starsHtml;
  ratingCount.textContent = `(${total})`;
}

// Call the function to display the rating
displayRating();











// Get the current year and month
var currentYear = new Date().getFullYear();
var currentMonth = new Date().getMonth() + 1; // Months are zero-indexed, so add 1
const months_array = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Function to generate options for months
function generateMonthOptions(selectedYear) {
var selectMonth = document.getElementById("selectMonth");
var selectYear = document.getElementById("selectYear").value;
var startingYear = 2021;
var startingMonth = 2;

selectMonth.innerHTML = ''; // Clear previous options before adding new ones

var startMonth = (selectYear == startingYear) ? startingMonth : 1;
var endMonth = (selectYear == currentYear) ? currentMonth : 12;

for (var month = startMonth; month <= endMonth; month++) {
  var option = document.createElement("option");
  option.value = month < 10 ? "0" + month : month;
  option.textContent = months_array[month - 1]; // Months are zero-indexed, so subtract 1
  selectMonth.appendChild(option);
}
}

// Function to generate options for years
function generateYearOptions() {
var selectYear = document.getElementById("selectYear");
var startingYear = 2021; // Set your starting year here

selectYear.innerHTML = ''; // Clear previous options before adding new ones

for (var year = startingYear; year <= currentYear; year++) {
  var option = document.createElement("option");
  option.value = year;
  option.textContent = year;
  selectYear.appendChild(option);
}
}

// Call the functions to generate options for months and years
generateYearOptions();
generateMonthOptions();

// Function to handle changes in month and year select dropdowns
function handleSelectionChange() {
var selectedYear = document.getElementById("selectYear").value;
var selectedMonth = document.getElementById("selectMonth").value;

// Here, you can handle the logic to fetch data from the database based on the selected year and month.
// You may use AJAX to send the selected values to the server and receive the appropriate data in response.
// For this example, we will just update the numbers with dummy data.

// Dummy data, replace this with your actual data from the database.
var dummyNumber1 = 1160;
var four = 102;
var two =  737;
var bi = 321;



var dummyNumber2 = 12345;
var serviceCharge = 0.15 * dummyNumber2;
var gst = 0.18 * (dummyNumber2 - serviceCharge);
var net = dummyNumber2 - serviceCharge - gst;

// Round the calculated values to two decimal places
serviceCharge = parseFloat(serviceCharge.toFixed(2));
gst = parseFloat(gst.toFixed(2));
net = parseFloat(net.toFixed(2));

document.getElementById("number1").textContent = "Total vehicles: " + dummyNumber1;
document.getElementById("numberFour").textContent = "Four-wheelers: " +four;
document.getElementById("numberTwo").textContent = "Two-wheelers: " +two;
document.getElementById("numberBi").textContent = "Bicycle: " +bi;


document.getElementById("number2").textContent = "Total: Rs. "+(dummyNumber2);
document.getElementById("numberService").textContent = "Service Charge: - Rs. "+(serviceCharge);
document.getElementById("numberGst").textContent = "GST: - Rs. "+gst;
document.getElementById("numberNet").textContent = "Net Earnings: Rs. "+net;
}

// Add event listeners to the select dropdowns to handle changes
document.getElementById("selectMonth").addEventListener("change", handleSelectionChange);
document.getElementById("selectYear").addEventListener("change", function() {
generateMonthOptions();
handleSelectionChange();
});

// Call the function initially to show the initial data based on the current date.
handleSelectionChange();