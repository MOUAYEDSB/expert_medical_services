<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "careprovider";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $birth = $_POST['birth'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $services = isset($_POST['services']) ? $_POST['services'] : '';
    $serviceDetails = $_POST['serviceDetails'];
    $accommodation = isset($_POST['accommodation']) ? $_POST['accommodation'] : '';

    // Assuming 'accommodation' is a VARCHAR field; adjust if it's a different type
    $stmt = $conn->prepare("INSERT INTO book (fullname, email, number, birth, gender, address, country, city, postalcode, services, serviceDetails, accommodation) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the prepare statement is successful
    if ($stmt) {
        $stmt->bind_param("ssisssssssis", $fullname, $email, $number, $birth, $gender, $address, $country, $city, $postalcode, $services, $serviceDetails, $accommodation);

        if ($stmt->execute()) {
            echo "Record inserted successfully";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>



<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- <title>Registration Form in HTML CSS</title> -->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="styles/registration.css" />
  </head>
<body>
    <section class="container">
      <header>Registration Form</header>
      <form class="form" method="POST" action="">
        <div class="input-box">
          <label>Patient Name</label>
          <input type="text" name="fullname" placeholder="Enter patient full name" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" name="number" placeholder="Enter phone number" required />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="birth" placeholder="Enter birth date" required />
          </div>
        </div>

        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" />
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>

        <div class="input-box address">
          <label>Address</label>
          <div class="select-box">
            <select name="address">
              <option hidden>Country</option>
              <option>America</option>
              <option>Japan</option>
              <option>India</option>
              <option>Nepal</option>
            </select>
          </div>
        </div>

        <div class="column">
          <input type="text" name="city" placeholder="Enter your city" required />
          <input type="number" name="postalcode" placeholder="Enter postal code" required />
        </div>

        <div class="input-box address">
          <label>Booking Details:</label>
          <div class="select-box">
            <select name="services">
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
          <label for="serviceDetails">Details about the demanded service:</label><br/>
          <textarea name="serviceDetails" id="serviceDetails" placeholder="Enter details about the demanded service" rows="10" cols="215" required></textarea>
        </div>

        <label>Do you need accommodation?</label>
        <input type="radio" name="accommodation" value="yes" id="accommodationYes" required />
        <label for="accommodationYes">Yes</label>

        <input type="radio" name="accommodation" value="no" id="accommodationNo" required />
        <label for="accommodationNo">No</label>

        <div class="column">
          <div class="button input-box">
            <input type="submit" name="submit">
          </div>
        </div>
      </form>
    </section>
  </body>
</html>
