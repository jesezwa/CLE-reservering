<?php

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
            <a class="navbar-item" href="index.php">
                Home
            </a>

            <a class="navbar-item">
                Login
            </a>



        </div>
    </div>

</nav>

<main>
    <div class="section is-medium">
    <div class="columns">
        <div class="column">
            <h1 class="has-text-centered is-size-3 mb-4">Maak een afspraak</h1>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Subject</label>
                    <div class="control">
                        <div class="select">
                            <select>
                                <option>Select dropdown</option>
                                <option>With options</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Subject</label>
                    <div class="control">
                        <div class="select">
                            <select>
                                <option>Select dropdown</option>
                                <option>With options</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Subject</label>
                    <div class="control">
                        <div class="select">
                            <select>
                                <option>Select dropdown</option>
                                <option>With options</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
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



</footer>
</body>
</html>
