<?php
/** @var mysqli $db */
require_once 'includes/connection.php';
require_once 'includes/secure.php';

// Check of gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    // als dit niet zo is stuur naar login
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db));

if (mysqli_num_rows($result) > 0) {
    $user_row = mysqli_fetch_assoc($result);
    if ($user_row['admin'] != 1) {
        // Niet ingelogd als admin, stuur door naar de inlogpagina
        header("Location: login.php");
        exit;
    }
} else {
    // Gebruiker niet gevonden, stuur door naar de inlogpagina
    header("Location: login.php");
    exit;
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
<!-- Homepagina, wanneer er niet is ingelogd -->
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
        <!-- Navbar linker kant-->
        <div class="navbar-start pl-4">

            <a class="navbar-item" href="availblities.php">
                beschikbaarheid
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

<header>

</header>
<main>
    <!-- Header wilma -->
    <section class="hero home-header is-medium is-info">
        <div class="hero-body">

            <div class="columns is-centered">
                <div class="column is-centered">
                    <h1 class="is-size-1 has-text-centered mb-4"> Haak vreugde bij Wilma</h1>
                    <div class="columns">
                        <div class="column">
                            <p class="has-text-centered is-size-4 pb-4"> Bestel hier de beste, mooiste en meest goedkope haakwerken
                                van Nederland
                            </p>
                            <div class="columns is-centered">
                                <button class="button is-normal reserve-button">Reserveer hier !</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- Sectie met voorbeelden van voormalige projecten -->
    <section class="section is-medium examples">
        <div class="columns">
            <div class="column">
                <h1 class="has-text-centered is-size-1">Voormalige projecten</h1>
                <div class="columns">
                    <div class="column">
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-info example-projects">
                                <p class="title">Middle tile</p>
                                <p class="subtitle">With an image</p>
                                <figure class="image is-4by3">
                                    <img src="https://bulma.io/images/placeholders/640x480.png">
                                </figure>
                                <p class="subtitle pt-3">With an image</p>
                            </article>
                        </div>
                    </div>
                    <div class="column">
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-info example-projects">
                                <p class="title">Middle tile</p>
                                <p class="subtitle">With an image</p>
                                <figure class="image is-4by3">
                                    <img src="https://bulma.io/images/placeholders/640x480.png">
                                </figure>
                                <p class="subtitle pt-3">With an image</p>
                            </article>
                        </div>
                    </div>
                    <div class="column">
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-info example-projects">
                                <p class="title">Middle tile</p>
                                <p class="subtitle">With an image</p>
                                <figure class="image is-4by3">
                                    <img src="https://bulma.io/images/placeholders/640x480.png">
                                </figure>
                                <p class="subtitle pt-3">With an image</p>
                            </article>
                        </div>
                    </div>
                </div>

    </section>
</main>

<!-- Homepagina, wanneer er wel is ingelogd komt nog hier -->

<footer>
    <section class="hero is-small is-primary footer-hero">
        <div class="hero-body">
            <div class="columns">
                <!-- Linker kant van de footer -->
                <div class="column footer-start is-one-third mt-6">
                    <a href="#">
                        <p>
                            Informatie
                        </p>
                    </a>
                    <a href="terms%20&%20conditions.php">
                        <p>
                            Terms & conditions
                        </p>
                    </a>
                    <a href="#">
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
