<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling GET request to fetch events
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $event_id = isset($_GET['id']) ? $_GET['id'] : null;

    $sql = "SELECT Urituse_ID, Kuupaev, Pealkiri, Korraldaja, Tekst";
    $sql .= " FROM Uritused";

    if ($event_id) {
        $sql .= " WHERE Urituse_ID = $event_id";
    }

    $result = $conn->query($sql);

    $events = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $row['Pealkiri'] = utf8_encode($row['Pealkiri']);
            $row['Tekst'] = utf8_encode($row['Tekst']);
            $row['Korraldaja'] = utf8_encode($row['Korraldaja']);

            $event = array(
                'Urituse_ID' => $row['Urituse_ID'],
                'Pealkiri' => $row['Pealkiri'],
                'Tekst' => $row['Tekst'],
                'Korraldaja' => $row['Korraldaja'],
                'Kuupaev' => $row['Kuupaev'],
            );

            $events[] = $event;
        }
    }

    // Send events data as JSON response
    header('Content-Type: application/json');
    echo json_encode($events);
}

// Handling POST request to insert new event
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // TODO: see guard clause vaja korda teha
    // // if (isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // //     http_response_code(401);
    // //     exit;
    // // }

    if (isset($_FILES['Pilt']) && $_FILES['Pilt']['error'] === UPLOAD_ERR_OK) {
        $Pealkiri = $_POST['Pealkiri'];
        $Tekst = $_POST['Tekst'];
        $Korraldaja = $_POST['Korraldaja'];
        $Kuupaev = $_POST['Kuupaev'];
        $fileContent = file_get_contents($_FILES['Pilt']['tmp_name']);

        $stmt = $conn->prepare("INSERT INTO Uritused (Pealkiri, Tekst, Korraldaja, Kuupaev, Pilt) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $Pealkiri, $Tekst, $Korraldaja, $Kuupaev, $fileContent);

        if ($stmt->execute()) {
            http_response_code(201);
        } else {
            http_response_code(500);
        }

        $stmt->close();
    } else {
        http_response_code(400);
    }
}

// Handling DELETE request to delete an event
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // TODO: see guard clause vaja korda teha
    // // if (isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // //     http_response_code(401);
    // //     exit;
    // // }

    $event_id = isset($_GET['id']) ? $_GET['id'] : null;

    if (!$event_id) {
        http_response_code(400);
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM Uritused WHERE Urituse_ID = ?");
    $stmt->bind_param("i", $event_id);

    if ($stmt->execute()) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }

    $stmt->close();
}

$conn->close();
?>