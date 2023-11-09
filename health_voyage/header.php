<link rel="stylesheet" href="styles/style.css">
<header class="header">
    <div class="logo">
        <img src="images/logo.png" alt="HealthVoyage">
    </div>
    <div class="toggleMenu" onclick="toggleMenu();"></div>
    <nav class="navbar">
			<a href="home.php">home</a>
			<a href="#">about</a>
			<a href="#">services</a>
			<a href="#">gallery</a>
			<a href="contact.php">contact</a>
            <a href="#" id="translate-link">Translate</a>
		</nav>

  
	<div class="icons">
            <div id="menubar" class="fas fa-bars"></div>
            
            <?php
            session_start();
			
            if(isset($_SESSION['logged']) && $_SESSION['logged'] === TRUE) {
                // Display the user's last name from the session variable
                echo '<a href="logout.php">Logout</a>';
            } else {
                echo '<a href="login.php">Login</a>';
            }
            ?>
        </div>
        
</header>
