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

if(isset($_POST['signup'])){
    // Access $_POST variables here
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Default role for new users
    $role = "user";

    // Prepare the SQL query
    $query = "INSERT INTO users (nom, prenom, phone, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if (!$stmt) {
        die("Error in statement preparation: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ssssss", $nom, $prenom, $phone, $email,  $hashed_password, $role);

    // Check if the statement was executed successfully
    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        // Error in query execution
        $message = "Error creating account. Please try again.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesom-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles/login.css">
    <title>Sign Up</title>
</head>
<body>


<div class="container">
    <div class="cover">
        <div class="front">
            <img src="images/loginpic.avif" alt="Description">
            <div class="text">
                <span class="text-1">Create an Account</span>
                <span class="text-2">Join our community</span>
            </div>
        </div>
    </div>

    <form method="POST">
        <div class="form-content">
            <div class="signup-from">
                <div class="title">Sign Up</div>
                <div class="input-boxes">
                <div class="input-box">
                        <i class="fas fa-person"></i>
                        <input type="text" name="prenom" placeholder="Enter your first name" required>
                    </div>
                    <div class="input-box">
                        <i class="fas fa-person"></i>
                        <input type="text" name="nom" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <i class="fas fa-phone"></i>
                        <input type="text" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="button input-box">
                        <input type="submit" name="signup" value="Sign Up">
                    </div>
                    <div class="text">Already have an account? <a href="login.php">Log in</a></div>
                    <?php
                        if(isset($message)) {
                            echo '<div class="message">'.$message.'</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>
