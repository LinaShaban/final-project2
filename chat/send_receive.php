<?php
session_start();
$con=new mysqli("localhost","root","","readers community");





if(isset($_POST['message'])){
	$user_id=$_SESSION['id'];
    $Re_id=$_POST['glob'];  echo $Re_id;
	$msg=$_POST['message'];
	$qu="insert into chat(idSender,idReciver,msg) values('$user_id','$Re_id','$msg')";
	mysqli_query($con,$qu);
}


else{ //Recieve

$u_id=$_POST['num'];

$user=$_SESSION['id'];




$qr="select * from chat where `idReciver`='$u_id' and `idSender`='$user' or 
`idReciver`='$user' and `idSender`='$u_id'";

$r=mysqli_query($con,$qr);

if(mysqli_num_rows($r)>0){
	
while($row=mysqli_fetch_assoc($r)){
	
	
if($row['idSender']==$user){
	
 	$qry="select `img` from `users` where `id`='$user' ";
	$qur=mysqli_query($con,$qry);
	$image=mysqli_fetch_assoc($qur);
	    $original_date = $row['dateSent'];
 
      // Creating timestamp from given date
         $timestamp = strtotime($original_date);
 
      // Creating new date format from that timestamp
        $new_date = date("h:m A", $timestamp);
echo"
                   <li class='sent'>
					<img src='images/".$image['img']."' alt='' />
					<p>".$row['msg']."</p><br>
					<small style='padding-left:40px;color:lightgray'>".$new_date."</small>
				    </li>

";

}
else  if($row['idSender']==$u_id){
	
$qry="select `img` from `users` where `id`='$u_id' ";
	$qur=mysqli_query($con,$qry);
	$image=mysqli_fetch_assoc($qur);
	 $original_date = $row['dateSent'];
 
      // Creating timestamp from given date
         $timestamp = strtotime($original_date);
 
      // Creating new date format from that timestamp
        $new_date = date("h:m A", $timestamp);
echo"
                    <li class='replies'>
					<img src='images/".$image['img']."' alt='' />
					<p>".$row['msg']."</p><br><br>
					<small style='padding-left:500px;color:lightgray'>".$new_date."</small>
			         	</li>
";
}



}

}
}

?>