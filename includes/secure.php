<?php
// connectie db
/** @var mysqli $db */
require_once "includes/connection.php";

// session beginnen
session_start();

// is de genruiker in gelogt
if (isset($_SESSION['user_id'])) {
    // zet de user id in sessie
    $user_id = $_SESSION['user_id'];
}

// wanneer er op uitgelogd wordt geklickt
if (isset($_POST['logout'])) {
    // destroy session
    session_destroy();
    header('Location: index.php');
    exit;
}

