<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/contact_table_style.css">
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
        <?php
		include('navbarDashboard.php');
		?>

<body>
<div class="table-users">
			<div class="header">Messages & Feedback List</div>

			<table cellspacing="0">
				<tr>
					<th>Nom</th>
					<th>Email</th>
					<th>Message</th>
					<th>Action</th>
				</tr>

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
            $stmt = $conn->prepare("DELETE FROM contact WHERE email = ?");
            $stmt->bind_param("s", $delete_email);
            $stmt->execute();
            $stmt->close();
        }

        // Fetch messages from the database
        $query = "SELECT full_name, email, message FROM contact";
        $result = $conn->query($query);

        // Handle query execution errors
        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {

                echo '
                <tr>
                    <td>' . $row["full_name"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["message"] . '</td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete_email" value="' . $row["email"] . '">
                            <button type="submit" class="delete-btn" onclick="return confirm(\'Are you sure you want to delete this message?\');"><i class="fas fa-trash-alt delete-icon"></i></button>
                        </form>
                    </td>
                </tr>';
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
