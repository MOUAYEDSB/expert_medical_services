<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/table.css">
</head>

<body>
    <h2>list of messages:</h2>
    <div class="table-box">
        <div class="table-row table-head">
            <div class="table-cell">
                <p>nom</p>
            </div>
            <div class="table-cell">
                <p>email</p>
            </div>
            <div class="table-cell">
                <p>message</p>
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
        $query = "SELECT full_name, email, message FROM contact";
        $result = $conn->query($query);

        // Handle query execution errors
        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="table-row">
                        <div class="table-cell first-cell">
                            <p>' . $row["full_name"] . '</p>
                        </div>
                        <div class="table-cell">
                            <p>' . $row["email"] . '</p>
                        </div>
                        <div class="table-cell">
                            <p>' . $row["message"] . '</p>
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