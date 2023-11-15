<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="cover">
        <div class="front">
            <img src="images/loginpic.avif" alt="Description">
            <div class="text">
                <span class="text-1">Welcome to our groups</span>
                <span class="text-2">Let's get connected</span>
            </div>
        </div>
    </div>

    <form method="POST">
        <div class="form-content">
            <div class="signup-from">
                <div class="title">Login</div>
                <div class="input-boxes">
                    <div class="input-box">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="button input-box">
                        <input type="submit" name="login" value="Login">
                    </div>
                    <div class="text">Don't have an account? <a href="signup.php">Sign up</a></div>
                    <?php
                        if(isset($message)) {
                            echo '<div class="error-message">'.$message.'</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
session_start();
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

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT id, email, password, role FROM users WHERE email=?";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error in statement preparation: " . $conn->error);
    }

    $stmt->bind_param("s", $email);

    // Check if the statement was executed successfully
    if ($stmt->execute()) {
        $stmt->bind_result($id, $fetchedEmail, $hashedPassword, $role);
        $stmt->fetch();

        if (password_verify($pass, $hashedPassword)) {
            // Password is correct
            $_SESSION['logged'] = TRUE;
            $_SESSION['loggedInId'] = $id;
            $_SESSION['loggedInEmail'] = $fetchedEmail;

            // Redirect based on role
            if ($role == "admin") {
                header("Location: dashboardAdmin.php");
            } else {
                // Add a default redirect here if needed
                header("Location: home.php");
            }
            exit();
        } else {
            // Password is incorrect
            $message = "Incorrect email or password. Please try again.";
        }
    } else {
        // Error in query execution
        die("Error in statement execution: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

</body>
</html>
