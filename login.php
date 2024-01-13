<?php
/** @var mysqli $db */
require_once "includes/connection.php";

// start sessie
session_start();

// variablen opstellen voor errors en om de data terug te schrijven
$emailError = $passwordError = $logInError ='';
$email_POST = '';

// Is user logged in?

// submit ingeklickt
if (isset($_POST['submit'])) {
    // als email niet is ingevoerd
    if (empty($_POST['email'])) {
        // laat error zien
        $emailError = 'Voer je email in';
    } else {
        // bewaar om terug te posten en form
        $email_POST = $_POST['email'];
    }
    // als wachtwoord niet is ingevoerd
    if (empty($_POST['password'])) {
        // laat error zien
        $passwordError = 'Voer je wachtwoord in';
    }

    // Als alles is ingevuld
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        // bescherm de post naar db
        $email = mysqli_real_escape_string($db, $_POST['email']);
        // maak query select email
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($db, $query)
        //or die statement
        or die('Error ' . mysqli_error($db) . ' with query ' . $query);

        // bestaat email
        if (mysqli_num_rows($result) > 0) {
            // haal user op
            $user_row = mysqli_fetch_assoc($result);

            // haal gehashte wachtwoord op
            $hashed_password = $user_row['password'];

            // Check if the provided password matches the stored password in the database
            if (password_verify($_POST['password'], $hashed_password)) {
                // Store the user in the session
                $_SESSION['user_id'] = $user_row['id'];
                // Redirect to secure page
                header("Location: index.php");
                // exit
                exit;
            }
            // Credentials not valid
            else {
                //error incorrect log in
                $logInError = 'De combinatie van de mail en wachtwoord is onjuist.';
            }
        }
        // User doesn't exist
        else {
            //error incorrect log in
            $logInError = 'De combinatie van de mail en wachtwoord is onjuist.';
        }
    }
}
// connectie sluiten
mysqli_close($db);
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
            <a class="navbar-item" href="register.php">
                Register
            </a>

            <a class="navbar-item" href="index.php">
                Home
            </a>



        </div>
    </div>

</nav>

<main>
    <section class="hero is-medium is-primary login-hero">
        <div class="hero-body">
    <div class="column">
        <h2 class="title pl-6 has-text-centered">Log in</h2>
    </div>
    <section class="columns is-centered">

        <form class="column is-6" action="" method="post">
            <p class="help is-danger">
                <?= $logInError ?>
            </p>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="email">Email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control has-icons-left">
                            <input class="input" id="email" type="text" name="email" value="<?= $email_POST ?>" />
                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                        </div>
                        <p class="help is-danger">
                            <?= $emailError ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="password">Password</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control has-icons-left">
                            <input class="input" id="password" type="password" name="password"/>
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                        </div>
                        <p class="help is-danger">
                            <?= $passwordError ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal"></div>
                <div class="field-body">
                    <button class="button login-button is-link is-fullwidth" type="submit" name="submit">Log in With Email</button>
                </div>
            </div>
            <div class="column make-account">
                <p class="pl-6 ml-5 has-text-centered"> No account yet? <a class="make-account" href="register.php">Make one!</a></p>

            </div>
        </form>


    </section>
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
</html>
