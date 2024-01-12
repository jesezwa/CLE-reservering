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
            <a class="navbar-item">
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
    <section class="hero is-medium is-primary register-hero">
        <div class="hero-body">
            <section class="section">
                <div class="container content">


                    <div class="column">
                        <h2 class="title pl-6 has-text-centered">Register With Email</h2>
                    </div>

                    <section class="columns is-centered">
                        <form class="column is-6 register-form" action="" method="post">

                            <!-- First name -->
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label" for="firstName">First name</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control has-icons-left">
                                            <input class="input" id="firstName" type="text" name="firstName" value="" />
                                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <p class="help is-danger">

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Last name -->
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label" for="lastName">Last name</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control has-icons-left">
                                            <input class="input" id="lastName" type="text" name="lastName" value="" />
                                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <p class="help is-danger">

                                        </p>
                                    </div>
                                </div>
                            </div>




                            <!-- Email -->
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label" for="email">Email</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control has-icons-left">
                                            <input class="input" id="email" type="text" name="email" value="" />
                                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <p class="help is-danger">

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label" for="password">Password</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control has-icons-left">
                                            <input class="input" id="password" type="password" name="password" value=""/>
                                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <p class="help is-danger">

                                        </p>

                                    </div>
                                </div>
                            </div>


                            <!-- Submit -->
                            <div class="field is-horizontal">
                                <div class="field-label is-normal"></div>
                                <div class="field-body">

                                    <button class="button is-link is-fullwidth register-button" type="submit" name="submit">Register</button>


                                </div>
                            </div>

                        </form>

                    </section>
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
</html>
