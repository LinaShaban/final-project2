<?php 


session_start();
 $con=new mysqli("localhost","root","","readers community");
 
 $q="delete from advertisments where `id`='".$_GET['id']."'";
 
 mysqli_query($con,$q);

header("location:profile.php");
 


?>