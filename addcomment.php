<?php
$con=new mysqli("localhost","root","","readers community");

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{

$comment=$_POST['user_comm'];
$name=$_POST['user_name'];
$id=$_POST['book_id'];

$user_id=$_SESSION['id'];

$insert="insert into comments(`username`,`book_id`,`comment`,`commenter_id`)values('$name','$id','$comment','$user_id')";
mysqli_query($con,$insert);


?>