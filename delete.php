<?php
// Create connection
$con = new mysqli('localhost', 'root', '', 'job');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the 'id' parameter is set in the GET request
if (isset($_GET['id'])) {
    // Sanitize the input to ensure it's a valid string
    $id = $con->real_escape_string($_GET['id']);

    // Prepare and execute the DELETE statement using prepared statements
    $stmt = $con->prepare("DELETE FROM information WHERE National_id = ?");
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        // Redirect to the table.php page after successful deletion
        header('Location: table.php');
        exit();
    } else {
        echo "Error deleting record: " . $con->error;
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$con->close();
?>

