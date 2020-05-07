<?php
$con=new mysqli("localhost","root","","readers community");




    if(isset($_POST['add2'])){
        session_start();
        $target = "images/".basename($_FILES['image']['name']);
        $city=$_POST['city'];
        $status=$_POST['status'];
        $address=$_POST['address'];
        $book=$_POST['book-name'];
        $image=$_FILES['image']['name'];
        $author =$_POST['author'];
        $price =$_POST['price'];
        $description =$_POST['description'];
        $type =$_POST['type'];
        $language =$_POST['language'];
        $date= date('M d,Y h:i A');
        
        $adv_id=$_SESSION['id'];
          $sql="insert into `advertisments`(`city`,`price`,`description`,`status`,`author`,`book-name`,`book-type`,`address`,`image`,`language`,`date`,`advertiser_id`)
          values('$city','$price','$description','$status','$author','$book','$type','$address','$image','$language','$date','$adv_id')";

          if (mysqli_query($con,$sql)){header("location:http://localhost/ReadersCommunity/Advertisments.php");}




           move_uploaded_file($_FILES['image']['tmp_name'],$target);

     }


  









?>
