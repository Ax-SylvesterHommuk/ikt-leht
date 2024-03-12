<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$event_id = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "SELECT Urituse_ID, Kuupaev, Pealkiri, Tekst";
$sql .= " FROM Uritused";

if ($event_id) {
    $sql .= " WHERE Urituse_ID = $event_id";
}

$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $event = array(
            'Urituse_ID' => $row['Urituse_ID'],
            'Kuupaev' => $row['Kuupaev'],
            'Pealkiri' => $row['Pealkiri'],
            'Tekst' => $row['Tekst']
        );

        $events[] = $event;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($events);
?>