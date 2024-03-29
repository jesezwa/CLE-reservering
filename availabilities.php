<?php
//Connectie leggen met de database
/** @var mysqli $db */
require_once 'includes/connection.php';
//Secure maken
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
        // Niet admin stuur naar index
        header("Location: index.php");
        exit;
    }
} else {
    // Gebruiker bestaat niet stuur naar log in
    header("Location: login.php");
    exit;
}

if (!empty($_POST['date'])) {
    $to = $user_id['email'];
    $subject = "Bevestiging afspraak WILMA";
    $txt = "Heel erg bedankt met het maken van een afsrpaak bij WILMA! Ik kijk uit naar onze afspraak op. Het adres is Bob de brouwerstraat 25 in Bodegraven.";
    $headers = "From: wilmahaakt@gmail.com" . "\r\n";

    mail($to, $subject, $txt, $headers);
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
                Beschikbaarheid
            </a>


        </div>
        <!-- Navbar logo in het midden -->
        <div>
            <a href="admin.php"><img src="images/wilmaLogo.png" width="100" class="logo"></a>
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



    <!-- ... Other HTML code ... -->


    <div class="availblities">
        <form method="post" action="process.php">
            <div class="columns">
             <div class="column">
                    <div class="field">
                    <label class="label">Datum</label>
                     <div class="control">
                            <input class="input" type="date" name="selected_date">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Begintijd</label>
                    <div class="control">
                        <div class="select">
                            <select name="selected_begin_time">
                                <option>Selecteer een begin tijd</option>
                                <option>9:00:00</option>
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

                            </select>
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

        <!-- Submit button -->
        <div class="field is-horizontal">
            <div class="field-label is-normal"></div>
            <div class="field-body">
                <button class="button login-button is-link is-fullwidth has-text-centered" type="submit" name="submit">Verzenden</button>
            </div>
        </div>
    </form>
</main>

<footer>
    <div class="hero is-small is-primary footer-hero">
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
    </div>
    </div>

    </section>


</footer>
</body>
</html>
