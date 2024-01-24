<?php
/** @var mysqli $db */
require_once 'includes/connection.php';
require_once 'includes/secure.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not, redirect to the login page
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Check if the user is an admin
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db));

if (mysqli_num_rows($result) > 0) {
    $user_row = mysqli_fetch_assoc($result);
    if ($user_row['admin'] != 1) {
        // If not an admin, redirect to the index page
        header("Location: index.php");
        exit;
    }
} else {
    // If user does not exist, redirect to the login page
    header("Location: login.php");
    exit;
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a form with input fields named selectedDate, selectedBeginTime, and selectedEndTime
    $selectedDate = $_POST['selectedDate'];
    $selectedBeginTime = $_POST['selectedBeginTime'];
    $selectedEndTime = $_POST['selectedEndTime'];

    // Your SQL query to insert data into the database
    $query = "INSERT INTO `availablities`(`date`, `timestamp_begin`, `timestamp_end`) VALUES ('$selectedDate', '$selectedBeginTime', '$selectedEndTime')";

    // Execute the query
    $result = mysqli_query($db, $query);

    // Check if the query was successful
    if ($result) {
        // Do something if the insertion is successful
    } else {
        echo "Error: " . mysqli_error($db);
    }
}

// Retrieve available times for the selected date
$selectedDate = date('Y-m-d'); // Replace this with the selected date

$query = "SELECT `timestamp_begin`, `timestamp_end` FROM `availablities` WHERE `date` = '$selectedDate'";
$result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db));

$availableTimes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $availableTimes[] = $row;
}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your meta tags, stylesheets, and title -->
</head>
<body>

<!-- Your existing HTML code -->



<!-- Your existing HTML code -->

</body>
</html>


<!doctype html>
<html lang="en">
<!-- The rest of your HTML code remains unchanged -->
</html>


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
<!-- Homepagina, wanneer er niet is ingelogd -->
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
        <!-- Navbar linker kant-->
        <div class="navbar-start pl-4">

            <a class="navbar-item" href="availblities.php">
                beschikbaarheid
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

<header>

</header>
<main>
    <main>


                <h2>Afspraken: <?php echo $selectedDate; ?></h2>
                <?php
                foreach ($availableTimes as $time) {
                    echo "<p>{$time['timestamp_begin']} - {$time['timestamp_end']}</p>";
                }
                ?>
        <div class="timetable" >
        </div>
    </main>

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
                    <a href="admin.php"><img src="images/wilmaLogo.png" width="150" class="logo"></a>
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
