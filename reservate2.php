<?php
// get first row from result (table)
// get start time
// get end time from availability
// create array $times[] with times from start time till end time with 30 minutes space (loop)
// add 30 minutes to start time

// filter

// create array $availableTimes[]

// get all appointments

// loop over all times

// boolean $isAvailable = true;

// loop over all appointments
// check if time (from all times) is equal to start time from reservation.
// set boolean isAvailable = false;
// if(isAvailable)
// add time to $availableTimes

/*
   <?php foreach ($times as $time) { ?>
                                <?php
                                $isAvailable = !in_array($time, $availabilities);
                                if ($isAvailable) {
                                    $endTime = date('H:i', strtotime($time) + $timeLenght);
                                    ?>
                                    <option value="<?= $time ?>">
                                        <?= "{$time} - {$endTime}" ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
*/

//Connectie leggen met de database

/** @var mysqli $db */
require_once "includes/connection.php";
require_once "includes/secure.php";

$user_id = $_SESSION['user_id'];

// Afspraak maken
if(isset($_POST['submit'])) {

    // Haalt de gekozen datum op
    $date = $_POST['date'];
    $times = [];
    $availableTimes = [];
    $unavailableTimes = [];
    $query = "SELECT * FROM availabilities WHERE date = '$date'";

    $result = mysqli_query($db, $query)
    or die('Error ' . mysqli_error($db) . ' with query ' . $query);

    // Zet de tijden die gekozen zijn, met juiste format in een array
    $row = mysqli_fetch_assoc($result);

    $startTime = strtotime($row['timestamp_begin']); // Begin tijd
    $endTime = strtotime($row['timestamp_end']); // Een eindtijd
    $timeLength = 60 * 30; // Rekensom voor het maken van de tijdsloten (half uur in dit geval)


    for ($time = $startTime; $time < $endTime; $time += $timeLength) {
        $times[] = date('H:i', $time); //Zet met date functie time in juiste format in array

    }

    // Haal de niet beschikbare tijden voor gekozen datum op
    $query = "SELECT * FROM appointments WHERE date = '$date'";

    $result = mysqli_query($db, $query)
    or die('Error ' . mysqli_error($db) . ' with query ' . $query);

    // Zet de opgehaalde tijden in een array met juiste format
    while($row = mysqli_fetch_assoc($result)) {
        if (isset($row['timeslot'])) {
            $timeSlot = strtotime($row['timeslot']);
            $unavailableTimes[] = date('H:i', $timeSlot);
        }
    }

    // Filter de al gekozen tijden en de beschikbare tijden en zet in een array
    $availableTimes = array_diff($times, $unavailableTimes);

    // Haalt de gekozen datum op
    if (isset($_POST['timeslot'])) {
        $timeSlot = mysqli_real_escape_string($db, $_POST['timeslot']);
        $description = isset($_POST['description']) ? mysqli_real_escape_string($db, $_POST['description']) : '';
        $userId = $_SESSION['user_id']; // Aangenomen dat de gebruikers-ID in de sessie wordt opgeslagen

        // Voer je INSERT INTO query uit
        $insertQuery = "INSERT INTO appointments (user_id, date, timeslot, description) VALUES ('$userId', '$date', '$timeSlot', '$description')";

        $result = mysqli_query($db, $insertQuery)
        or die('Error ' . mysqli_error($db) . ' with query ' . $insertQuery);

        if (!empty($_POST['date'])) {
            $to = $user_id['email'];
            $subject = "Bevestiging afspraak WILMA";
            $message = "Heel erg bedankt met het maken van een afsrpaak bij WILMA! Ik kijk uit naar onze afspraak op $date. Het adres is Bob de brouwerstraat 25 in Bodegraven.";
            $headers = "From: wilmahaakt@gmail.com\r\n";

            mail($to, $subject, $message, $headers);
        }

        header("Location: index.php");
        // Exit the code
        exit;
    }

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
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=GFS+Neohellenic:wght@700&family=Gentium+Book+Plus:wght@400;700&family=Gentium+Plus:ital,wght@0,400;1,700&family=Young+Serif&display=swap"
          rel="stylesheet">
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
        <?php if (isset($user_id)) { ?>
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

            <?php } ?>
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
                        <select name="timeslot">

                            <?php foreach ($availableTimes as $time) {  $endTime = date('H:i', strtotime($time) + $timeLength); ?>
                                <option><?= "{$time} - {$endTime}" ?></option>
                            <?php } ?>

                        </select>
                    </label>
                </div>
            </div>

            <input type="hidden" name="date" value="<?= htmlspecialchars($date) ?>">

            <div class="field">
                <div class="control">
                    <textarea class="textarea" name="description" placeholder="Geef hier een beschrijving"></textarea>
                </div>
            </div>

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
