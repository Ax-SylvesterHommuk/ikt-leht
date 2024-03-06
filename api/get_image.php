<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$event_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$event_id) {
    die("Event ID is required.");
}

$sql = "SELECT Pilt FROM Uritused WHERE Urituse_ID = $event_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Set appropriate headers to indicate image content
    header("Content-Type: image/jpeg");
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Output the image data directly
    $row = $result->fetch_assoc();
    echo $row['Pilt'];
} else {
    die("Image not found for the provided event ID.");
}

$conn->close();
?>