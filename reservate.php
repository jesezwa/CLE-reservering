<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$errorMessage = [];

if(isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/connection.php";

    // Get form data
    $month = $_POST['month'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $description = $_POST['description'];

    //zet data in een data
    $dateString = date('Y-m-d', strtotime("next $day $month"));
    print_r($dateString);
    // Server-side validation





    if($time == ''){
        $errorMessage['time'] = "Er zijn voor deze dag geen beschikbare tijden, kies een andere dag asjeblieft!";
    }

    if($description == ''){
        $errorMessage['description'] = "Je bent vergeten een beschrijving in te vullen!";
    }


    if (empty($errorMessage)) {
        $query = "INSERT INTO appointments (date, discription, user_id) VALUES ('$dateString', '$description', '9')";
//        mysqli_query($db, $query);
        header('Location: index.php');
    }





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
            <form class="column is-6 register-form" action="" method="post">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Maand</label>
                    <div class="control">
                        <div class="select">
                            <select id="month" type="text" name="month" value="">
                                <option>Januari</option>
                                <option>Februari</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Dag</label>
                    <div class="control">
                        <div class="select">
                            <select id="day" type="text" name="day" value="">
                                <option>Maandag</option>
                                <option>Dinsdag</option>
                            </select>
                            <input type="date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Tijdslot</label>
                    <div class="control">
                        <div class="select">
                            <select id="time" type="" name="time" value="">
                                <option>13.30-14.00</option>
                                <option>15.00-15.30</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-centered">
                        <div class="field">
                            <label class="label">Beschrijving</label>
                            <div class="control">
                                <textarea class="textarea" id="description" type="text" name="description" value="<?= $description ?>" placeholder="Geef een kleine bechrijving van wat je graag zou willen hebben"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-label is-normal"></div>
                            <div class="field-body">
                                <button class="button login-button is-link is-fullwidth" type="submit" name="submit">Maak afspraak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            </form>
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
