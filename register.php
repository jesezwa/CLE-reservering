
<?php
/** @var mysqli $db */
require_once "includes/connection.php";
require_once 'includes/secure.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// variablen opstellen voor errors en om de data terug te schrijven
$firstNameError = $lastNameError = $phoneNumberError = $emailError = $passwordError = $termsError = '';
$firstName_POST = $lastName_POST = $phoneNumber_POST = $email_POST = $password_POST = '';

// Wanneer er gepost is
if (isset($_POST['submit'])) {
    // If data valid
    if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['phoneNumber']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['acceptTerms'])) {
        // als een veld leeg is
        if (empty($_POST['firstName'])) {
            // laat error zien
            $firstNameError = 'Voer je voornaam in.';
        } else {
            // POST naar de form
            $firstName_POST = $_POST['firstName'];
        }
        if (empty($_POST['lastName'])) {
            // laat error zien
            $lastNameError = 'Voer je achternaam in.';
        } else {
            // POST naar de form
            $lastName_POST = $_POST['lastName'];
        }
        if (empty($_POST['phoneNumber'])) {
            // laat error zien
            $phoneNumberError = 'Voer je telefoonnummer in.';
        } else {
            // POST naar de form
            $phoneNumber_POST = $_POST['phoneNumber'];
        }
        if (empty($_POST['email'])) {
            // laat error zien
            $emailError = 'Voer je email in.';
        } else {
            // POST naar de form
            $email_POST = $_POST['email'];
        }
        if (empty($_POST['password'])) {
            // laat error zien
            $passwordError = 'Voer je wachtwoord in.';
        }
        if (empty($_POST['acceptTerms'])) {
            // laat error zien
            $termsError = 'Acepteer de terms en conditions.';
        }
    } else {
        // post in variabelen zetten
        $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
        $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);
        $admin = mysqli_real_escape_string($db, $_POST['admin']);

        // query maken om data in database te zetten
        $query = "INSERT INTO `users`( `email`, `password`, `first_name`, `last_name`, `phone_number`, `user_created`, `admin`) VALUES ( '$email','$password','$firstName','$lastName','$phoneNumber',NOW(), '$admin')";
        $result = mysqli_query($db, $query)
        //or die statement
        or die('Error ' . mysqli_error($db) . ' with query ' . $query);

        // Redirect to login page
        header("Location: login.php");
        // Exit the code
        exit;
    }
}
// connectie sluiten
mysqli_close($db)
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
                                            <input class="input" id="firstName" type="text" name="firstName" value="<?= $firstName_POST ?>" />
                                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <p class="help is-danger">
                                            <?= $firstNameError ?>
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
                                            <input class="input" id="lastName" type="text" name="lastName" value="<?= $lastName_POST ?>" />
                                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <p class="help is-danger">
                                            <?= $lastNameError ?>
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
                                            <input class="input" id="email" type="text" name="email" value="<?= $email_POST ?>" />
                                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <p class="help is-danger">
                                            <?= $emailError ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label" for="password">Wachtwoord</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control has-icons-left">
                                            <input class="input" id="password" type="password" name="password" value=""/>
                                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <p class="help is-danger">
                                            <?= $passwordError ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Telefoonnummer -->
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label" for="phoneNumber">Telefoon nummer</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control has-icons-left">
                                            <input class="input" id="phoneNumber" type="text" name="phoneNumber" value="<?= $phoneNumber_POST ?>" />
                                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <p class="help is-danger">
                                            <?= $phoneNumberError ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- terms -->
                            <div class="field is-horizontal">
                                <div class="field-label"></div>
                                <div class="field-body">
                                    <div class="field">
                                        <label class="checkbox">
                                            <input type="checkbox" name="acceptTerms">
                                             I accept the Terms & conditions
                                        </label>
                                        <p class="help is-danger">
                                            <?= $termsError ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- admin -->
                            <input class="input" id="admin" type="hidden" name="admin" value="0"/>

                            <!-- Submit -->
                            <div class="field is-horizontal">
                                <div class="field-label is-normal"></div>
                                <div class="field-body">
                                    <button class="button is-link is-fullwidth register-button" type="submit" name="submit" onclick="return validateForm()">Register</button>
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
    </section>
</footer>
</body>
</html>
 