<?php

//Checken of de admin is ingelogd met user_id

//Admin sessie beginnen

//Connectie leggen met de database
/** @var mysqli $db */
require_once 'includes/connection.php';
//Secure maken
require_once 'includes/secure.php';
//Datum select


//Begin tijdstip select

//eind tijdstip select

// Stuur datum en tijdstippen naar de database


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



    <main>
        <div class="section is-medium">
            <div class="columns">
                <div class="column">
                    <h1 class="has-text-centered is-size-3 mb-4">Maak een afspraak</h1>


                    <form method="post" action="includes/process_form.php">
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Maand</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="selected_month">
                                                <option>Selecteer een maand</option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Dag</label>
                                        <div class="control">
                                            <div class="select">
                                                <select name="selected_month">
                                                    <option>Selecteer een dag</option>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                    <option>05</option>
                                                    <option>06</option>
                                                    <option>07</option>
                                                    <option>08</option>
                                                    <option>09</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                    <option>15</option>
                                                    <option>16</option>
                                                    <option>17</option>
                                                    <option>18</option>
                                                    <option>19</option>
                                                    <option>20</option>
                                                    <option>21</option>
                                                    <option>22</option>
                                                    <option>23</option>
                                                    <option>24</option>
                                                    <option>25</option>
                                                    <option>26</option>
                                                    <option>27</option>
                                                    <option>28</option>
                                                    <option>29</option>
                                                    <option>20</option>
                                                    <option>31</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="columns">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Begintijd</label>
                                            <div class="control">
                                                <div class="select">
                                                    <select name="selected_month">
                                                        <option>Selecteer een begin tijd</option>
                                                        <option>10:00:00</option>
                                                        <option>11:00:00</option>
                                                        <option>12:00:00</option>
                                                        <option>13:00:00</option>
                                                        <option>14:00:00</option>
                                                        <option>15:00:00</option>
                                                        <option>16:00:00</option>
                                                        <option>17:00:00</option>
                                                        <option>18:00:00</option>
                                                        <option>19:00:00</option>
                                                        <option>20:00:00</option>
                                                        <option>21:00:00</option>
                                                        <option>22:00:00</option>
                                                        <option>23:00:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="column">
                                <div class="field">
                                    <label class="label">Eindtijd</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="selected_end_time">
                                                <option>Selecteer een eindtijd</option>
                                                <option>10:00:00</option>
                                                <option>11:00:00</option>
                                                <option>12:00:00</option>
                                                <option>13:00:00</option>
                                                <option>14:00:00</option>
                                                <option>15:00:00</option>
                                                <option>16:00:00</option>
                                                <option>17:00:00</option>
                                                <option>18:00:00</option>
                                                <option>19:00:00</option>
                                                <option>20:00:00</option>
                                                <option>21:00:00</option>
                                                <option>22:00:00</option>
                                                <option>23:00:00</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <!-- Submit button -->
                        <div class="field is-horizontal">
                            <div class="field-label is-normal"></div>
                            <div class="field-body">
                                <button class="button login-button is-link is-fullwidth has-text-centered" type="submit" name="submit">Verzenden</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- ... Your existing HTML code ... -->




    </select>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label is-normal"></div>
                                    <div class="field-body">
                                        <button class="button login-button is-link is-fullwidth has-text-centered" type="submit" name="submit">Verzenden</button>
                                    </div> <option>Selecteer een dag</option>















                            </div>
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
                    <a href="information.php">
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
