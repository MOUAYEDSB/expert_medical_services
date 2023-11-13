
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="styles/contact.css">
<section>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "careprovider";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $stmt = $conn->prepare("INSERT INTO contact (full_name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $message);

    if ($stmt->execute()) {
        // Submission successful
        echo "Your message has been submitted successfully!";
    } else {
        // Submission failed
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
	<body>
		<?php include('header.php'); ?>
		<section>
			<div class="section-header">
				<div class="container">
					<h2>Cantact Us</h2>
					<p>Have questions, need assistance, or ready to start your medical journey with us? Don't hesitate to
						reach out. Our dedicated team at HealthVoyage is here to assist you.</p>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="contact-info">
						<div class="contact-info-item">
							<div class="contact-info-icon">
								<i class="fas fa-home"></i>
							</div>

							<div class="contact-info-content">
								<h4>Address</h4>
								<p>R6JM+P5C, Rue du Lac Biwa, Tunis</p>
							</div>
						</div>
						<div class="contact-info-item">
							<div class="contact-info-icon">
								<i class="fas fa-phone"></i>
							</div>
							<div class="contact-info-content">
								<h4>Phone</h4>
								<p>20443928</p>
							</div>
						</div>
						<div class="contact-info-item">
							<div class="contact-info-icon">
								<i class="fas fa-envelope"></i>
							</div>
							<div class="contact-info-content">
								<h4>Email</h4>
								<p>sabbaghmouayed@gmail.com</p>
							</div>
						</div>
					</div>
					<div class="contact-from">
						<form id="contact-form" method="post" action="contact.php">
							<h2>Send message</h2>
							<div class="input-box">
								<input type="text" placeholder="Full Name" name="fullname" required="true">
							</div>
							<div class="input-box">
								<input type="email" placeholder="Email" name="email" required="true">
							</div>
							<div class="input-box">
								<textarea placeholder="Type your Message..." name="message" required="true"></textarea>
							</div>
							<div class="input-box">
								<input type="submit" value="Send">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</section>