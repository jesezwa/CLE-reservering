<?php
$host = "sql.hosted.hro.nl";
$user = "prj_2023_2024_ressys_t23";
$password = "oecaesie";
$database = "prj_2023_2024_ressys_t23";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());
?>