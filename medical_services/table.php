<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/table.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/solid.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .delete-btn,
    .update-role-btn {
        border: none;
        background: none;
        color: #007BFF;
        cursor: pointer;
        font-size: 1.2em;
        display: inline-block; /* Change from inline-flex to inline-block */
        margin-right: 5px;     /* Add some margin for spacing */
    }

    .delete-btn:hover,
    .update-role-btn:hover {
        color: #0056b3;
    }
</style>

</head>

<body>
    <h2>List of users :</h2>
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
            <div class="table-cell">
                <p>Action</p>
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

        // Check if the form is submitted for deletion
        if (isset($_POST['delete_email'])) {
            $delete_email = $_POST['delete_email'];

            // Prepare and execute the SQL query to delete the row
            $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
            $stmt->bind_param("s", $delete_email);
            $stmt->execute();
            $stmt->close();
        }

        // Check if the form is submitted for role update
		if (isset($_POST['update_role'])) {
			$update_email = $_POST['update_role'];
		
			// Fetch the current role
			$current_role_query = "SELECT role FROM users WHERE email = ?";
			$stmt = $conn->prepare($current_role_query);
			$stmt->bind_param("s", $update_email);
			$stmt->execute();
			$stmt->bind_result($current_role);
			$stmt->fetch();
			$stmt->close();
		
			// Update the role to the opposite
			$new_role = ($current_role == 'admin') ? 'user' : 'admin';
		
			// Prepare and execute the SQL query to update the role
			$update_role_query = "UPDATE users SET role = ? WHERE email = ?";
			$stmt = $conn->prepare($update_role_query);
			$stmt->bind_param("ss", $new_role, $update_email);
			$stmt->execute();
			$stmt->close();
		
			// Redirect to prevent form resubmission
			header("Location: ".$_SERVER['PHP_SELF']);
			exit();
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
                <div class="table-cell">
                    <form method="post">
                        <input type="hidden" name="delete_email" value="' . $row["email"] . '">
                        <button type="submit" class="delete-btn" onclick="return confirm(\'Are you sure you want to delete this user?\');"><i class="fas fa-trash-alt delete-icon"></i></button>
                    </form>
                    <form method="post" onsubmit="return confirm(\'Are you sure you want to switch the role?\');">
                        <input type="hidden" name="update_role" value="' . $row["email"] . '">
                        <button type="submit" class="update-role-btn"><i class="fas fa-exchange-alt update-icon"></i></button>
                    </form>
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
