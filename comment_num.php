<?php 


session_start();
$con=new mysqli("localhost","root","","readers community");





if(isset($_POST['id'])){
	$id=$_POST['id'];

 $qr="select ID from comments where `book_id`='$id'";

$res=mysqli_query($con,$qr);



$result= mysqli_num_rows($res);

echo $result;
}








?>