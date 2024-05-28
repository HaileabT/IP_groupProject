<?php
$username = "root";
$password = "e mandefro1216";
$serverName = "localhost";
$connection = mysqli_connect($serverName, $username, $password, "ip_project_db");
if (!$connection) {
    // die("connection failed" . mysqli_connect_error());
} else {
    // echo "connected successfully";
}
