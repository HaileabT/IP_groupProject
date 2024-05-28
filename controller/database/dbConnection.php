<?php
$username = "root";
$password = "Haile@mysql11";
$serverName = "localhost";
$connection = mysqli_connect($serverName, $username, $password, "ip_project_db");
if (!$connection) {
    // die("connection failed " . mysqli_connect_error());
} else {
    // echo "connected successfully";
}

?>