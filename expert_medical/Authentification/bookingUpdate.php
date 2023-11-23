<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "careprovider";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit'])) {
    // Retrieve form data
    $booking_id = $_GET[30]; // Ensure you get the booking ID from somewhere

    // Sanitize and collect form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $birth = $_POST['birth'];

    // Initialize $gender
    $gender = '';

    // Check which radio button is selected for gender
    if (isset($_POST['gender'])) {
      $gender = $_POST['gender'];
    }

    $country = isset($_POST['country']) ? $_POST['country'] : '';

    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $services = isset($_POST['services']) ? $_POST['services'] : '';
    $serviceDetails = $_POST['serviceDetails'];
    $accommodation = isset($_POST['accommodation']) ? $_POST['accommodation'] : '';
    $status = 'new';
    // Update query
    $sql = "UPDATE bookings SET fullname='$fullname', email='$email', number='$number' WHERE id='$booking_id'";

    if ($conn->query($sql) === TRUE) {
      $message = "Booking updated successfully";
    } else {
      $message = "Error updating booking: " . $conn->error;
    }
  }
}
?>

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="styles/bookingUpdate.css" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script>
    window.onload = function () {
      var message = "<?php echo $message; ?>";
      if (message !== "") {
        alert(message);
      }
    }
  </script>

</head>

<body>

  <?php
  include('header.php');
  ?>
  <div class="page_content">
    <section class="first-container">
      <h3>Expert medical Services : Booking and details</h3>
      <p>Please take a moment to outline your requirements below. Our team of esteemed professionals
        is ready to ensure that your healthcare journey with Expert medical service is as precise, personalized,
        and compassionate as possible.</p>
    </section>


    <br />

    <section class="container-two">
      <h2>update booking</h2>
      <span>Please Update your details before submitting;
        expect email confirmation and a follow-up call upon service booking</span>
      <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h5>Your personal informations:</h5>
        <div class="row mt-2">
          <div class="col">
            <input type="text" class="form-control" name="fullname" placeholder="Enter patient full name" required />
          </div>
          <div class="col">
            <input type="text" class="form-control" name="email" placeholder="Enter email address" required />
          </div>

        </div>
        <div class="row mt-2">
          <div class="col">
            <input type="number" class="form-control" name="number" placeholder="Enter phone number" required />
          </div>
          <div class="col">
            <input type="date" class="form-control" name="birth" placeholder="Enter birth date" required />
          </div>
        </div>

        <div class="gender-box">
          <div class="gender-option">
            <div class="gender">
              <h6>Gender :</h6>
            </div>
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="male" checked required />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female" required />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" value="prefer-not-to-say" required />
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>

        <h5 class="mt-4">Your address informations:</h5>

        <div class="input-box address">
          <div class="select-box">
            <select name="country" required>
              <option hidden>Country</option>
              <option>America</option>
              <option>Tunis</option>
              <option>India</option>
              <option>Nepal</option>
            </select>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col">
            <input type="text" class="form-control" name="city" placeholder="Enter your city" required />
          </div>
          <div class="col">
            <input type="number" class="form-control" name="postalcode" placeholder="Enter postal code" required />
          </div>
        </div>

        <h5 class="mt-4">Booking details:</h5>

        <div class="input-box address">
          <div class="select-box">
            <select name="services" required>
              <option hidden>Services</option>
              <option>Primary Care</option>
              <option>Diagnostic Services</option>
              <option>Women's Health</option>
              <option>Dental Services</option>
              <option>Mental health</option>
              <option>Emergency Services</option>
              <option>Home Healthcare</option>
            </select>
          </div>
          <textarea name="serviceDetails" id="serviceDetails" placeholder="Enter details about the demanded service"
            rows="10" cols="215" required></textarea>
        </div>

        <label>Do you need accommodation?</label>
        <input type="radio" name="accommodation" value="yes" id="accommodationYes" required />
        <label for="accommodationYes">Yes</label>

        <input type="radio" name="accommodation" value="no" id="accommodationNo" required />
        <label for="accommodationNo">No</label>

        <div class="column">
          <div class="button input-box">
            <input type="submit" name="submit" />
          </div>
        </div>
        <form method="post" onsubmit="return confirm(\'Are you sure you want to switch the role?\');">
          <input type="hidden" name="update_role" value="' . $row[" email"] . '">
               <button type="submit" class="update-role-btn"><i class="fas fa-exchange-alt update-icon"></i></button>
          </form>
      </form>
    </section>
  </div>
</body>

</html>