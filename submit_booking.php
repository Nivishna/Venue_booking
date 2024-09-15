<?php
// Database connection
$servername = "localhost";
$username = "root";  // Change this if your username is different
$password = "";      // Your MySQL password
$dbname = "venue_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_name = $_POST['facultyName'];
    $faculty_id = $_POST['facultyId'];
    $event_name = $_POST['eventName'];
    $event_id = $_POST['eventId'];
    $venue_type = $_POST['venueType'];
    $event_type = $_POST['eventType'];

    // Insert data into the table
    $sql = "INSERT INTO bookings (faculty_name, faculty_id, event_name, event_id, venue_type, event_type) 
            VALUES ('$faculty_name', '$faculty_id', '$event_name', '$event_id', '$venue_type', '$event_type')";

    if ($conn->query($sql) === TRUE) {
        echo "New booking created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
