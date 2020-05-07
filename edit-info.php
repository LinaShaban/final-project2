<?php
$con=new mysqli("localhost","root","","readers community");
          session_start();



    if(isset($_POST['edit'])){

        $name=$_POST['first_name'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];



          $sql="update `users` set `Full_Name`='$name' ,`Email`='$email',`Phone#`='$phone' where `id`='".$_SESSION['id']."' ";
           

          if (mysqli_query($con,$sql)){header("location:http://localhost/ReadersCommunity/profile.php");}

     }

   if(isset($_POST['changepass'])){
    $password=$_POST['pass1'];
    $password=md5($password);

       $sql2="update `users` set `Password`='$password' where `id`='".$_SESSION['id']."'  ";
      if (mysqli_query($con,$sql2)){header("location:http://localhost/ReadersCommunity/profile.php");}

       }
      ?>
