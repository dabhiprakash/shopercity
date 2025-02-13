<?php
ob_start();
if(!isset($_SESSION)) {
session_start();
}

// Define database connection parameters for local and live environments
$hostname = "localhost";
$username = "root";
$password = "";
$db = "shopercity";

$conn = mysqli_connect($hostname, $username, $password, $db);

if (!$conn == true) {
    echo "database not connected";
}
// // Determine if the environment is local or live
// if ($_SERVER['SERVER_ADDR'] == $local_hostname || $_SERVER['SERVER_NAME'] == 'localhost') {
//     // Local environment
//     $conn = mysqli_connect($local_hostname, "root", "", "shoppercity_live");
//     if (!$conn) {
//         echo "database not connected";
//     }
// } else {
//     // Live environment
//     $conn = mysqli_connect($local_hostname, $username, $password, $db);
//     if (!$conn) {
//         echo "database not connected";
//     }
// }
?>