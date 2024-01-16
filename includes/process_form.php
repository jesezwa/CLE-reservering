<?php

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $selectedMonth = $_POST['selected_month'] ?? ''; // Use the null coalescing operator to handle undefined keys
    $selectedDay = $_POST['selected_day'] ?? '';
    $selectedBeginTime = $_POST['selected_begin_time'] ?? '';
    $selectedEndTime = $_POST['selected_end_time'] ?? '';
    $selectedYear = 2024;



    // Combine month, day, and year into one variable
    $selectedDate = $selectedYear . '-' . $selectedMonth . '-' . $selectedDay;
    echo $selectedDate;
    echo $selectedDay;
    echo $selectedMonth;

    // Connect to the database
    require_once 'connection.php';

    // Your SQL query to insert data into the database

     $query = "INSERT INTO `availablities`(`date`, `timestamp_begin`, `timestamp_end`) VALUES ('$selectedDate', '$selectedBeginTime', '$selectedEndTime')";

    // Execute the query
    $result = mysqli_query($db, $query);

    // Check if the query was successful
    if ($result) {
        echo "Data has been successfully inserted into the database.";
    } else {
        echo "Error: " . mysqli_error($db);
    }

    // Close the database connection
    mysqli_close($db);
}
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
