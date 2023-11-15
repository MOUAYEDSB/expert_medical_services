<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/booking_table_style.css">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css"
		integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/solid.min.css"
		integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		.update-role-btn {
			border: none;
			background: none;
			color: #007BFF;
			cursor: pointer;
			font-size: 1.2em;
			display: inline-block;
			/* Change from inline-flex to inline-block */
			margin-right: 5px;
			/* Add some margin for spacing */
		}

		.update-role-btn:hover {
			color: #0056b3;
		}
	</style>
	<script>
		function customConfirm() {
			var message = "Are you sure you want to change the status?";
			return confirm(message);
		}

		function updateStatusMessage(newStatus) {
			var message = "Status updated to '" + newStatus + "'";
			alert(message);
		}

	</script>
</head>
<?php
include('navbarDashboard.php');
?>

<body>
	<div class="table-users">
		<div class="header">booking</div>

		<table cellspacing="0">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Number</th>
				<th>Birth</th>
				<th>Gender</th>
				<th>Country</th>
				<th>City</th>
				<th>Postal Code</th>
				<th>Services</th>
				<th>Service Details</th>
				<th>Accommodation</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>

			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "careprovider";

			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			if (isset($_POST['update_status'])) {
				$emailToUpdate = $_POST['update_status'];

				// Check if the form is submitted
				if (isset($_POST['submit_status_update'])) {
					// Retrieve the current status
					$statusQuery = "SELECT status FROM book WHERE email = ?";
					$stmt = $conn->prepare($statusQuery);

					if ($stmt) {
						$stmt->bind_param("s", $emailToUpdate);

						if ($stmt->execute()) {
							$stmt->bind_result($currentStatus);

							if ($stmt->fetch()) {
								// Close the result set before preparing the update statement
								$stmt->close();

								// Toggle the status between "new" and "done"
								$newStatus = ($currentStatus == 'new') ? 'done' : 'new';

								// Update the status
								$updateQuery = "UPDATE book SET status = ? WHERE email = ?";
								$updateStmt = $conn->prepare($updateQuery);

								if ($updateStmt) {
									$updateStmt->bind_param("ss", $newStatus, $emailToUpdate);

									if ($updateStmt->execute()) {
										// Status updated successfully
										echo "<script>updateStatusMessage('" . $newStatus . "');</script>";
									} else {
										// Error updating status
										echo "Error updating status: " . $updateStmt->error;
									}

									$updateStmt->close();
								} else {
									// Error preparing update statement
									echo "Error preparing update statement: " . $conn->error;
								}
							} else {
								// Error fetching current status
								echo "Error fetching current status: " . $stmt->error;
							}
						} else {
							// Error executing status query
							echo "Error executing status query: " . $stmt->error;
						}
					} else {
						// Error preparing status query
						echo "Error preparing status query: " . $conn->error;
					}
				}
			}

			$sql = "SELECT * FROM book";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				echo "
						<tr>
							<td>" . $row['fullname'] . "</td>
							<td>" . $row['email'] . "</td>
							<td>" . $row['number'] . "</td>
							<td>" . $row['birth'] . "</td>
							<td>" . $row['gender'] . "</td>
							<td>" . $row['country'] . "</td>
							<td>" . $row['city'] . "</td>
							<td>" . $row['postalcode'] . "</td>
							<td>" . $row['services'] . "</td>
							<td>" . $row['serviceDetails'] . "</td>
							<td>" . $row['accommodation'] . "</td>
							<td>" . $row['status'] . "</td>
							<td>
							<form method='post' onsubmit='return customConfirm();'>
					<input type='hidden' name='update_status' value='" . $row["email"] . "'>
					<!-- Add a hidden input field to indicate form submission -->
					<input type='hidden' name='submit_status_update' value='1'>
					<button type='submit' class='update-role-btn'><i class='fas fa-exchange-alt update-icon'></i></button>

				    <a href='bookingUpdate.php?id=<?php>'><i class='fas fa-edit'></i></a>
					</form>
							</td>
						</tr>";
			}
			$conn->close();
			?>

		</table>
	</div>

	</div>
	</div>


</body>

</html>