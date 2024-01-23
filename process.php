<?php
// connectie database
/** @var mysqli $db */
require_once "includes/connection.php";
require_once 'includes/secure.php';


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $selectedDate = $_POST['selected_date'] ?? '';
    $selectedBeginTime = $_POST['selected_begin_time'] ?? '';
    $selectedEndTime = $_POST['selected_end_time'] ?? '';

    // Your SQL query to insert data into the database
    $query = "INSERT INTO `availablities`(`date`, `timestamp_begin`, `timestamp_end`) VALUES ('$selectedDate', '$selectedBeginTime', '$selectedEndTime')";

    // Execute the query
    $result = mysqli_query($db, $query);

    // Check if the query was successful
    if ($result) {

    } else {
        echo "Error: " . mysqli_error($db);
    }

    // Close the database connection
    mysqli_close($db);
}






?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=GFS+Neohellenic:wght@700&family=Gentium+Book+Plus:wght@400;700&family=Gentium+Plus:ital,wght@0,400;1,700&family=Young+Serif&display=swap" rel="stylesheet">
    <title>Wilma haakt</title>
</head>

<body>

<nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
           data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>


    <div id="navbarBasicExample" class="navbar-menu">
        <!-- Navbar linker kant -->
        <div class="navbar-start pl-4">
            <a class="navbar-item" href="information.php">
                Informatie
            </a>

            <a class="navbar-item" href="reservate1.php">
                Reserveren
            </a>


        </div>
        <!-- Navbar logo in het midden -->
        <div>
            <a href="index.php"><img src="images/wilmaLogo.png" width="100" class="logo"></a>
        </div>

        <!-- Navbar rechter kant -->
        <?php if(isset($user_id)) {?>
            <form action="" method="post">
                <input type="submit" name="logout" value="Logout">
            </form>
        <?php } else { ?>
        <div class="navbar-end pr-4">
            <a class="navbar-item" href="register.php">
                Register
            </a>

            <a class="navbar-item" href="login.php">
                Login
            </a>

            <?php }?>
        </div>
    </div>

</nav>

<main>
    <section class="hero is-medium is-primary information-hero">
        <div class="hero-body">
            <h2 class="has-text-centered is-size-1 pb-5">Beschikbaarheid door gegeven!</h2>
            <div class="tile is-parent">

                    <div class="content">
                        <div class="columns">
                            <div class="column">

                                <!-- Formulier voor knop naar index.php -->
                                <form action="availblities.php" method="post">
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal"></div>
                                        <div class="field-body">
                                            <button class="button login-button is-link is-fullwidth has-text-centered" type="submit" name="submit">Nog meer beschikbaarheid invullen?</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Formulier voor knop naar availablities.php -->
                                <form action="index.php" method="post">
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal"></div>
                                        <div class="field-body">
                                            <button class="button login-button is-link is-fullwidth has-text-centered" type="submit" name="submit">Terug naar de home pagina</button>
                                        </div>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>
</main>

<footer>
    <section class="hero is-small is-primary footer-hero">
        <div class="hero-body">
            <div class="columns">
                <!-- Linker kant van de footer -->
                <div class="column footer-start is-one-third mt-6">
                    <a href="information.php">
                        <p>
                            Informatie
                        </p>
                    </a>
                    <a href="terms%20&%20conditions.php">
                        <p>
                            Terms & conditions
                        </p>
                    </a>
                    <a href="contact.php">
                        <p>
                            Contact
                        </p>
                    </a>
                </div>

                <!-- Logo in het midden -->
                <div class="column is-one-third has-text-centered">
                    <a href="#"><img src="images/wilmaLogo.png" width="150" class="logo"></a>
                </div>


                <!-- Rechterkant van de footer met de sociale media -->
                <div class="column footer-end mt-6 pt-5">
                    <a href="#">
                        <p class="has-text-centered">
                            <img src="images/fb-icon.png">
                        </p>
                    </a>
                </div>
                <div class="column footer-end mt-6 pt-5">
                    <a href="#">
                        <p class="has-text-centered">
                            <img src="images/linkedin-icon.png">
                        </p>
                    </a>
                </div>
                <div class="column footer-end mt-6 pt-5">
                    <a href="#">
                        <p class="has-text-centered">
                            <img src="images/insta-icon.png">
                        </p>
                    </a>
                </div>




            </div>

        </div>

    </section>
</footer>
</body>

</html>
