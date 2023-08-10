<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="../asset/pics/icon.ico" />
		<title>Parko</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Albert+Sans" rel="stylesheet" />
  <style>
    /* body{
  font-family: 'Albert Sans';
} */
  .container {
    border: 8px solid #ccc;
    padding: 20px;
    border-radius: 30px;
    margin-top: 50px;
    background-color: #f8f9fa;
  }

  /* Color for form labels and text */
  label.form-check-label {
    color: #333;
    font-weight: bold;
  }

  /* Color for the checkbox */
  label.form-check-label input[type="checkbox"] {
    color: #007bff; /* Blue color */
  }

  /* Color for the button */
  .btn-primary {
    background-color: #007bff; /* Blue color */
    border-color: #007bff; /* Blue color */
  }

  .btn-primary:hover {
    background-color: #0056b3; /* Darker blue on hover */
    border-color: #0056b3; /* Darker blue on hover */
  }
</style>

</head>
<body>
  <div class="container mt-5 mb-5 d-flex justify-content-center">
    <form id="myForm" action="redirect_page.html" method="post">
    <p>
          Welcome, new ParkHosts! Your commitment to providing top-notch parking spaces on the "Parko" platform is appreciated. To ensure a consistent and secure experience for all, we want to lay down some non-negotiable guidelines.
        </p>
        <p>
          <strong>Space Quality: </strong><br>
          Your rented parking space is an extension of the "Parko" brand. It must adhere to stringent quality standards. The rented parking space must be enclosed by a protective compound to ensure the safety and security of the vehicles parked within.A roof must be present to shield parked vehicles from rain and sun exposure, maintaining the condition of the parked vehicles.
        </p>
        <p>
          <strong>Ownership Accountability: </strong><br>
          When renting out a parking space, ensure it's yours to rent. If you're managing spaces owned by others, secure proper permission before listing them on "Parko." We don't tolerate unauthorized listings.
        </p>
        <p>
          <strong>Vehicle Types: </strong><br>
          You have the freedom to define the types of vehicles your space accommodates. But remember, this freedom is within the boundaries of our guidelines.
        </p>
        <p>
          <strong>Work Hours Selection:</strong><br>
          Your work hours: Choose from Office Time (9:00 AM - 6:00 PM), Home Time (5:00 AM - 10:00 PM), or Alltime (24/7). Stick to the hours you commit to. No compromises.
        </p>
        <p>
          <strong>Primary Presence and Accountability:</strong><br>
          As the ParkHost, the primary responsibility of overseeing vehicle entries and exits lies with you. Be present during your selected hours. In case of unavoidable absence, you must designate a co-host. This co-host should be empowered to manage parking events. While co-hosts can update status in the app, it's your core duty.
        </p>
        <p>
          <strong>Co-Host Responsibilities:</strong><br>
          Your co-host means business. They're allowed to be the point of contact and update the status in the app, but remember, this is an extension of your responsibilities. Ensure your co-host is up to the task and fully briefed. Status updates on each parking event are mandatory.
        </p>
        <p>
          Remember, these guidelines aren't up for negotiation. Your dedication ensures "Parko" remains the premium parking solution it is. Your success as a ParkHost hinges on your adherence to these rules. Should you need guidance or run into a hiccup, our support team stands ready.
        </p>
        <p>
          Welcome to the "Parko" family – where exceptional parking spaces meet exceptional standards!
        </p>
      <label class="form-check-label">
        <input type="checkbox" name="agreementCheckbox" value="1" required><strong>
        I agree that upon confirming, I ensure, accept, and assure that I will diligently follow and adhere to the provided instructions and guidelines.
      </strong></label>
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary mb-3">I Agree</button>
      </div>
    </form>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const form = document.getElementById('myForm');
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      // Redirect to another page
      window.location.href = 'index.php'; // Replace with the actual URL
    });
  </script>
</body>
</html>
