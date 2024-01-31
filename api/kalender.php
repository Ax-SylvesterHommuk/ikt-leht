<?php
$servername = "localhost";
$username = "hommukax";
$password = "cfxmV,l3x*aV";
$dbname = "hommukax_ikt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Uritused.Urituse_ID, Uritused.Kuupaev, Kalender.Pealkiri 
        FROM Uritused 
        INNER JOIN Kalender ON Uritused.Urituse_ID = Kalender.Urituse_ID";
$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $events[] = array(
      'Urituse_ID' => $row['Urituse_ID'],
      'Kuupaev' => $row['Kuupaev'],
      'Pealkiri' => $row['Pealkiri']
    );
  }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($events);
?>