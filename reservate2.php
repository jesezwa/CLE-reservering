<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Connectie leggen met de database

/** @var mysqli $db */
require_once "includes/connection.php";
require_once "includes/secure.php";

session_start();

$user_id = $_SESSION['user_id'];

$date = $_POST['date'];



$query = "SELECT * FROM availablities WHERE date = '$date'";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);





$times = [];
$availabilities = [];
while ($row = mysqli_fetch_assoc($result)) {

    $startTime = strtotime($row['timestamp_begin']); // Begin tijd
    $endTime = strtotime($row['timestamp_end']); // Een eindtijd
    $timeLenght = 60*30; // Regel voor lengte tijdsloten


    for ($time = $startTime; $time < $endTime; $time += $timeLenght) {
        $times[] = date('H:i', $time); //Zet met date functie time in juiste format in array

    }

}

$query = "SELECT * FROM appointments WHERE date = '$date'";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

$unavailable = [];

while ($row = mysqli_fetch_assoc($result)) {
    $unavailable[] = $row['reservedTimeBegin'];

}


    foreach ($times as $time) {
        if (in_array($time, $unavailable)) {
            unset($times[$time['timestamp_begin']]);
        }
    }

    $errorMessage = [];

if (isset($_POST['submit'])) {
    $timeslot = mysqli_escape_string($db, $_POST['selected_time'] ?? '');
    $description = mysqli_escape_string($db, $_POST['description'] ?? '');
    $date = mysqli_escape_string($db, $_POST['date'] ?? '');


    if ($description == '') {
        $errorMessage['description'] = "Vul een beschrijving in van wat u wilt alstublieft!";
    }

    $query = "INSERT INTO appointments (date, user_id, discription, reservedTimeBegin, reservedTimeEnd, timeslot ) VALUES  ('$date', '$user_id', '$description', NOW(), NOW(), '$timeslot' )";
    $result = mysqli_query($db, $query)
    or die('Error '.mysqli_error($db).' with query '.$query);
}



























?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">
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
    <script src="datepicker.js"></script>
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
    <section class="section is-medium">
        <h2 class="has-text-centered pb-3 is-size-2">Kies een tijdslot en geef een korte beschrijving</h2>
        <form class="column is-6 register-form" action="" method="post">
    <div class="field is-horizontal has-addons has-addons-centered">
        <div class="select">
            <label>
                <select name="selected_time">
                    <?php foreach ($times as $time){?>
                        <?php
                        $isAvailable = !in_array($time, $availabilities);
                        if ($isAvailable) {
                            $endTime = date('H:i', strtotime($time) + $timeLenght);
                            ?>
                            <option value="<?= $time ?>">
                                <?= "{$time} - {$endTime}" ?>
                            </option>
                        <?php } ?>
                    <?php }?>

                </select>
            </label>
        </div>
    </div>


        <div class="field">
            <div class="control">
                <textarea class="textarea" name="description" placeholder="Geef hier een beschrijving"></textarea>
            </div>
        </div>

            <input type="hidden" name="date" value="<?= $_POST['date']; ?>">

        <div class="field is-horizontal">
            <div class="field-label is-normal"></div>
            <div class="field-body">
                <a class="button is-link is-fullwidth" href="reservate1.php">Ga terug</a>
                <button class="button is-link is-fullwidth" type="submit" name="submit">Maak afspraak</button>



            </div>
        </div>
        </form>

</section>

</main>

<footer >
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
                    <a href="index.php"><img src="images/wilmaLogo.png" width="150" class="logo"></a>
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
