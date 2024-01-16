<?php
// connectie db
/** @var mysqli $db */
require_once "includes/connection.php";

// session beginnen
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : 0;

// wanneer er op uitgelogd wordt geklickt
if (isset($_POST['logout'])) {
    // destroy session
    session_destroy();
}
