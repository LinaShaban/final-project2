<?php
session_start();
$con=new mysqli("localhost","root","","readers community");

$error="";

if(isset($_POST['login'])){

	if (empty($_POST['Email']) || empty($_POST['Pass'])){ $error='الرجاء ادخال البريد الالكتروني وكلمة السر';}

	else {

    $email=$_POST['Email'];
    $password=$_POST['Pass'];
    $password=md5($password);

    $sql="select * from users where Email='".$email."' AND Password='".$password."'";

    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)> 0)
	{
		   $res2=mysqli_fetch_array($result);
		   $_SESSION['id']=$res2[7];
		   $_SESSION['password']=$res2[1];
		   $_SESSION['userimage']=$res2[5];
		   $_SESSION['username']=$res2[0];
		   $_SESSION['phone#']=$res2[6];
		   $_SESSION['Address']=$res2[2];
		   $_SESSION['Email']=$res2[3];
           $_SESSION['User_Type']=$res2[4];
		   
	     	 header("location:http://localhost/ReadersCommunity/index2.php");
                   

    }
    else{
         $error= "البريد الالكتروني او كلمة السر غير صحيحة " ;

    }
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	
	 
<!--===============================================================================================-->
	
	<link href="http://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin " rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/p.css">
<!--===============================================================================================-->
</head>
<body style="font-family:Lateef;background-color:darkred">


	<div class="container-login100" >
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="login.php" method="post" >
				<span class="login100-form-title p-b-37"  >
					تسجيـل الدخـول
				</span>

				<div class="wrap-input100 validate-input m-b-20"  data-validate="Enter email" >
					<input  class="input100" type="text" name="Email" placeholder="البريد الالكتروني">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password" >
					<input class="input100" type="password" name="Pass" placeholder="كلمـة السـر">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="login" style="font-family:Lateef;font-size:20px">
						تسجيـل الدخـول
					</button>
				</div>
             <br>

			 <div class="error" style="text-align:center" > <?php  echo $error ?> </div>

				<div class="text-center">
					<h3 style="color:gray" > ليس لديك حساب ؟</h3>
					<a href="http://localhost/ReadersCommunity/signup/signup.php" class="txt2 hov1">
						انشاء حساب
					</a>
				</div>
			</form>


		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
