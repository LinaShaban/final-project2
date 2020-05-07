<?php
include ("globals.php");
session_start();
// Create connection
$conn=new mysqli("localhost","root","","readers community");

mysqli_set_charset($conn,"utf8-general-ci");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>