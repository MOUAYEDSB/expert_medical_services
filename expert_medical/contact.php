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

		<!--Section: Contact v.2-->
		<section class="mb-4">
			<form id="contact-form" method="post" action="contact.php">
				<!--Section heading-->
				<h1 class="h1-responsive font-weight-bold text-center my-10">Contact us</h1>
				<!--Section description-->
				<p class="text-center w-responsive mx-auto mb-5">Have questions, need assistance, or ready to start your
					medical journey with us? Don't hesitate to reach out. Our dedicated team at HealthVoyage is here to
					assist you.</p>

				<div class="row">

					<!--Grid column-->
					<div class="col-md-9 mb-md-0 mb-5">
						<form id="contact-form" name="contact-form" action="mail.php" method="POST">

							<!--Grid row-->
							<div class="row">

								<!--Grid column-->
								<div class="col-md-6">
									<div class="md-form mb-0">
										<label for="name" class="">Your name</label>
										<input type="text" id="name" name="fullname" class="form-control">

									</div>
								</div>
								<!--Grid column-->

								<!--Grid column-->
								<div class="col-md-6">
									<div class="md-form mb-0">
										<label for="email" class="">Your email</label>
										<input type="text" id="email" name="email" class="form-control">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="md-form">
										<label for="message">Your message</label>
										<textarea type="text" id="message" name="message" rows="6"
											class="form-control md-textarea"></textarea>

									</div>

								</div>
							</div>
							<!--Grid row-->

						</form>

						<div class="text-center text-md-left">
							<br />

							<input class="btn btn-primary" type="submit" value="Send">

						</div>
						<div class="status"></div>
					</div>
					<!--Grid column-->

					<!--Grid column-->
					<div class="col-md-3 text-center">
						<ul class="list-unstyled mb-0">
							<li><i class="fas fa-map-marker-alt fa-2x"></i>
								<p>R6JM+P5C, Rue du Lac Biwa, Tunis</p>
							</li>

							<li><i class="fas fa-phone mt-4 fa-2x"></i>
								<p>+ 216 20 44 39 28</p>
							</li>

							<li><i class="fas fa-envelope mt-4 fa-2x"></i>
								<p>sabbaghmouayed@gmail.com</p>
							</li>
						</ul>
					</div>
					<!--Grid column-->

				</div>
			</form>
		</section>
		<!--Section: Contact v.2-->
	</body>
</section>