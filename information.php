<?php
/** @var mysqli $db */
require_once "includes/connection.php";

// start sessie
session_start();

$user_id = $_SESSION['user_id'];

print_r();

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

<?php if (isset($user_id)) { ?>




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
            <a class="navbar-item" href="index.php">
                Home
            </a>

            <a class="navbar-item">
                Reserveren
            </a>


        </div>
        <!-- Navbar logo in het midden -->
        <div>
            <a href="index.php"><img src="images/wilmaLogo.png" width="100" class="logo"></a>
        </div>

        <!-- Navbar rechter kant -->
        <div class="navbar-end pr-4">
            <a class="navbar-item" href="register.php">
                Register
            </a>

            <a class="navbar-item" href="login.php">
                Login
            </a>



        </div>
    </div>

</nav>

<main>
    <section class="hero is-medium is-primary information-hero">
        <div class="hero-body">
            <h2 class="has-text-centered is-size-1 pb-5">Informatie over mij en het bedrijf</h2>
            <div class="tile is-parent">
                <article class="tile is-child notification is-danger info-section">
                    <div class="content">
                        <div class="columns">
                            <div class="column">
                                <p>Over mij</p>
                                <p>
                                    Hey, ik ben Wilma, 34 jaar en verslaafd aan haken!
                                    In mijn gezellige dorp ontdekte ik de magie van haken dankzij mijn oma.
                                    Van kleurrijke dekens tot schattige amigurumi,
                                    creatief bezig zijn met een haaknaald is mijn ontspanning.
                                    Naast haken geniet ik van simpele geneugten zoals wandelingen en boeken.
                                    Elke dag brengt nieuwe creatieve avonturen en glimlachmomenten.
                                    Hier wil ik mijn haakpassie delen, inspiratie opdoen en misschien wat patronen uitwisselen.
                                    Laten we samen genieten van handgemaakte schoonheid!</p>
                                <div class="columns">
                                    <div class="column is-left">
                                        Welkom bij wilma, het haakparadijs. Met passie
                                        haak ik warmte in elke steek en breng ik mijn
                                        liefde voor handwerk tot leven. Elk handgemaakt
                                        stuk, van sjaals tot amigurumi, draagt een uniek
                                        verhaal. Wilma is niet alleen een plek voor
                                        prachtige creaties, maar ook voor het delen van
                                        kennis en het verspreiden van de vreugde van het
                                        haken. Ontdek de magie van handwerk en laat
                                        wilma je inspireren. Bedankt voor het verkennen
                                        van mijn wereld van draden en dromen - waar elk
                                        stuk met liefde is gehaakt.
                                    </div>
                                </div>
                            </div>
                            <div class="column is-one-third">
                                <figure class="image is-1by1">
                                    <img src="images/wilma-foto.jpeg">
                                </figure>

                            </div>
                        </div>
                    </div>
                </article>
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
                    <a href="#">
                        <p>
                            Informatie
                        </p>
                    </a>
                    <a href="#">
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

<?php } else header("Location: login.php"); ?>

</html>
