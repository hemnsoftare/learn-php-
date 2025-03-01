<?php
global $conn;

// Delete record if 'delete' is set in the URL
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM `food` WHERE id = $id";
    mysqli_query($conn, $deleteQuery); // Executes query but gives no feedback
}
?>