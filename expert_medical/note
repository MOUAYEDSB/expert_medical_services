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
    $address = $_POST['address'];
    $adressline2 = $_POST['adressline2'];
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postalcode = $_POST['postalcode'];
    $services = isset($_POST['services']) ? $_POST['services'] : '';
    $accommodation = isset($_POST['accommodation']) ? $_POST['accommodation'] : '';

    $stmt = $conn->prepare("INSERT INTO booking (fullname, email, number, birth, gender, address, adressline2, country, city, region, postalcode, services, accommodation) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssisssssssiss", $fullname, $email, $number, $birth, $gender, $address, $adressline2, $country, $city, $region, $postalcode, $services, $accommodation);

    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
