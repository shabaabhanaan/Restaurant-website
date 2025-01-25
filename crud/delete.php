<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contacts WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: contact_process.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
