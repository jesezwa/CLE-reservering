<?php

require_once 'connection.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $selectedDate = $_POST['selected_date'] ?? '';
    $selectedBeginTime = $_POST['selected_begin_time'] ?? '';
    $selectedEndTime = $_POST['selected_end_time'] ?? '';

    // Combine year, month, and day into one variable



    // Format the time values if needed (assuming H:i:s format)

print_r($selectedDate);
print_r($selectedBeginTime);
    print_r($selectedEndTime);
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
