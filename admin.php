<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/** @var mysqli $db */
require_once 'includes/connection.php';
require_once 'includes/secure.php';


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
            <a class="navbar-item" href="information.php">
                Informatie
            </a>

            <a class="navbar-item" href="availabilities.php">
                Beschikbaarheid
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
                            <div class="columns is-centered"><a href="availblities.php">
                                    <button class="button is-normal reserve-button" > Beschikbaarheid</button>
                                </a>
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
                                <p class="title">Voetbal</p>
                                <p class="subtitle">Ik heb een voetbal gemaakt voor mijn buurjongen omdat die van voetballen houd</p>
                                <figure class="image is-4by3">
                                    <img src="images/voetbal.jpg">
                                </figure>

                            </article>
                        </div>
                    </div>
                    <div class="column">
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-info example-projects">
                                <p class="title">Katten</p>
                                <p class="subtitle">Ik heb deze gemaakt omdat een zoontje van mijn vriendin in het ziekhuis lag</p>
                                <figure class="image is-4by3">
                                    <img src="images/kat.jpg">
                                </figure>

                            </article>
                        </div>
                    </div>
                    <div class="column">
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-info example-projects">
                                <p class="title">Snowboardende honden</p>
                                <p class="subtitle">
                                    Met haaknaald en creativiteit heb ik schattige snowboardende honden gemaakt. Ze brengen plezier en winterse energie in elke verzameling.</p>
                                <figure class="image is-4by3">
                                    <img src="images/snowboard.jpg">
                                </figure>

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
