<?php
$servername = "localhost";
$username = "root";
$password = "123123";
$dbname = "venue_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if admin approved/rejected a booking
if (isset($_POST['action'])) {
    $bookingId = $_POST['bookingId'];
    $action = $_POST['action'];

    $status = ($action == 'approve') ? 'approved' : 'rejected';
    $sql = "UPDATE bookings SET status='$status' WHERE id='$bookingId'";

    $conn->query($sql);
}

// Retrieve all bookings from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BT Venues</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Admin Dashboard - Venue Bookings</h1>
        <table>
            <tr>
                <th>Faculty Name</th>
                <th>Event Name</th>
                <th>Venue Type</th>
                <th>Event Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['faculty_name'] ?></td>
                <td><?= $row['event_name'] ?></td>
                <td><?= $row['venue_type'] ?></td>
                <td><?= $row['event_type'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="bookingId" value="<?= $row['id'] ?>">
                        <button type="submit" name="action" value="approve">Approve</button>
                        <button type="submit" name="action" value="reject">Reject</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
