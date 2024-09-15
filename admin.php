<?php
// Database connection
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$dbname = "venue_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve bookings from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bookings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <div class="logo">BT Venues - Admin</div>
    </nav>

    <div class="form-container">
        <h1>Venue Bookings</h1>
        <table>
            <tr>
                <th>Faculty Name</th>
                <th>Faculty ID</th>
                <th>Event Name</th>
                <th>Event ID</th>
                <th>Venue Type</th>
                <th>Event Type</th>
                <th>Submission Time</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["faculty_name"] . "</td>
                            <td>" . $row["faculty_id"] . "</td>
                            <td>" . $row["event_name"] . "</td>
                            <td>" . $row["event_id"] . "</td>
                            <td>" . $row["venue_type"] . "</td>
                            <td>" . $row["event_type"] . "</td>
                            <td>" . $row["submitted_at"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No bookings found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
