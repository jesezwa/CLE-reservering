<?php
// connectie db
/** @var mysqli $db */
require_once "includes/connection.php";

// session beginnen
session_start();



// wanneer er op uitgelogd wordt geklickt
if (isset($_POST['logout'])) {
    // destroy session
    session_destroy();
    header('Location: index.php');
}

