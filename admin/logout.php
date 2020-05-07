<?php
include "../includes/functions.php";
if(session_destroy()) // Destroying All Sessions
{
header("location:http://localhost/ReadersCommunity/index.php"); // Redirecting To Home Page
}
?>