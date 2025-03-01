<?php
$host = "localhost";  // Change to your database host (default: localhost)
$user = "root";       // Your MySQL username (default: root)
$pass = "";           // Your MySQL password (default: empty)
$dbname = "market"; // Your database name
//phpinfo();
// Create connection
error_reporting(0); // bo awe hich eerror neshan nadat
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>
