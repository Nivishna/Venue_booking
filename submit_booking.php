<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "123123";  // Your MySQL password
$dbname = "venue_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert booking details into the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $facultyName = $_POST['facultyName'];
    $facultyId = $_POST['facultyId'];
    $eventName = $_POST['eventName'];
    $eventId = $_POST['eventId'];
    $venueType = $_POST['venueType'];
    $eventType = $_POST['eventType'];

    $sql = "INSERT INTO bookings (faculty_name, faculty_id, event_name, event_id, venue_type, event_type)
            VALUES ('$facultyName', '$facultyId', '$eventName', '$eventId', '$venueType', '$eventType')";

    if ($conn->query($sql) === TRUE) {
        header("Location: booking_confirmation.php"); // Redirect to confirmation page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
