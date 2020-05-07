 <?php
session_start();
 $con=new mysqli("localhost","root","","readers community");
 
 $q="delete from audio_books where `id`='".$_GET['id']."'";
 
 mysqli_query($con,$q);
header("location:audio_books.php");
 
 
 
 ?>