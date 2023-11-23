<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HealthVoyage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/navigation_style.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="images/logo.png" alt="HealthVoyage">
        </div>
        <div class="toggleMenu" onclick="toggleMenu();"></div>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="#">About</a>
            <a href="booking.php">Booking</a>
            <a href="contact.php">Contact</a>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Primary Care</a>
                    <a class="dropdown-item" href="#">Diagnostic Services</a>
                    <a class="dropdown-item" href="#">Women's Health</a>
                    <a class="dropdown-item" href="#">Dental Services</a>
                    <a class="dropdown-item" href="#">Mental Health</a>
                    <a class="dropdown-item" href="#">Emergency Services</a>
                    <a class="dropdown-item" href="#">Home Healthcare</a>
                </div>
            </div>
        </nav>


        <div class="icons">
            <?php
            session_start();

            if (isset($_SESSION['logged']) && $_SESSION['logged'] === TRUE) {
                // Display the user's last name from the session variable
                echo '<a class="btn-login-logout" href="logout.php">Logout</a>';
            } else {
                echo '<a class="btn-login-logout" href="login.php">Login</a>';
            }
            ?>
        </div>

    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>