<?php
// Assuming the user just submitted the form, we'll retrieve the last booking from the database

$servername = "localhost";
$username = "root";
$password = "123123";
$dbname = "venue_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the last inserted booking
$sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$booking = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - BT Venues</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Booking Confirmation</h1>
        <table>
            <tr><th>Faculty Name</th><td><?= $booking['faculty_name'] ?></td></tr>
            <tr><th>Faculty ID</th><td><?= $booking['faculty_id'] ?></td></tr>
            <tr><th>Event Name</th><td><?= $booking['event_name'] ?></td></tr>
            <tr><th>Event ID</th><td><?= $booking['event_id'] ?></td></tr>
            <tr><th>Venue Type</th><td><?= $booking['venue_type'] ?></td></tr>
            <tr><th>Event Type</th><td><?= $booking['event_type'] ?></td></tr>
            <tr><th>Submission Time</th><td><?= $booking['submitted_at'] ?></td></tr>
        </table>
    </div>
</body>
</html>
