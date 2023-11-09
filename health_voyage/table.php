<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/table.css">
</head>

<body>
	<h2>List of users : </h2>
	<div class="table-box">
		<div class="table-row table-head">
			<div class="table-cell">
				<p>nom</p>
			</div>
			<div class="table-cell">
				<p>prenom</p>
			</div>
			<div class="table-cell">
				<p>phone</p>
			</div>
			<div class="table-cell">
				<p>email</p>
			</div>
			<div class="table-cell">
				<p>role</p>
			</div>
		</div>

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

		// Fetch users from the database
		$query = "SELECT nom, prenom, email, phone, role FROM users";
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			// Output data of each row
			while ($row = $result->fetch_assoc()) {
				echo '<div class="table-row">
						<div class="table-cell first-cell">
							<p>' . $row["nom"] . '</p>
						</div>
						<div class="table-cell">
							<p>' . $row["prenom"] . '</p>
						</div>
						<div class="table-cell">
							<p>' . $row["phone"] . '</p>
						</div>
						<div class="table-cell">
							<p>' . $row["email"] . '</p>
						</div>
						<div class="table-cell">
							<p>' . $row["role"] . '</p>
						</div>
					</div>';
			}
		} else {
			echo "0 results";
		}

		// Close the database connection
		$conn->close();
		?>

	</div>
</body>

</html>
