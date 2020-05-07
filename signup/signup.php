      <?php
      session_start();
      $con=new mysqli("localhost","root","","readers community");
      $error="";

      if(isset($_POST['insert'])){

        $namee =$_POST['full-name'];
        $email =$_POST['email'];
        $password =$_POST['pass'];
        $hashPSW = md5($password);
        $city =$_POST['city'];
        $phoneN =$_POST['phone#'];


          $sql="INSERT INTO `users`(`Full_Name`,`Email`,`Password`,`Phone#`,`Address`,`user_type`) VALUES('$namee','$email','$hashPSW','$phoneN','$city','User')";
        $result=mysqli_query($con,$sql);
        if ($result){
        header("location:http://localhost/ReadersCommunity/index2.php");}
         else{ $error= "المستخدم مسجل مسبقاً ";}

       }


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title> Sign up</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
</head>



<body>
 <script>

  function Validate(){
   var pass1=document.getElementById("password").value;
   var pass2=document.getElementById("password2").value;


   if(pass1==""){document.getElementById("msg").innerHTML="** الرجاء ادخال كلمة السر ";
   return false;}

  if(pass1.length <5 ){document.getElementById("msg").innerHTML="** كلمة السر يجب ان تكون اكبر من 4 احرف ";
   return false;}

   if(pass1.length >25 ){document.getElementById("msg").innerHTML="** يجب ان تكون كلمة السر اقل من 26 حرفاً  ";
   return false;}

  if(pass1 != pass2) {
   document.getElementById("msg").innerHTML="** كلمة المرور غير متطابقة  ";
   return false;
  }
  }


 </script>
<div class="container">


<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">انشـاء حساب</h4>
	

	<p class="divider-text">
        <span class="bg-light"></span>
    </p>
	<form action="signup.php" method="POST" onsubmit="return Validate()" style="text-align:right">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="full-name" class="form-control" placeholder="الاسم" type="text" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="البريد الالكتروني" type="email" required >
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		</div>
		<select class="form-control" name="city" required>
			<option selected=""> المدينة </option>
			<option value="Amman">عمان</option>
			<option value="AZ-Zarqaa">الزرقاء</option>
			<option value="Al-Balqaa">البلقاء</option>
            <option value="Al-Karak">الكرك</option>
			<option value="Al-Aqaba">العقبة</option>
			<option value="Al-Mafraq">المفرق</option>
            <option value="Madaba">مادبا</option>
			<option value="Ma'an">معان</option>
			<option value="Ajloun">عجلون</option>
            <option value="Jarash">جرش</option>
			<option value="Al-Tafeela">الطفيلة</option>
			<option value="Irbid">اربد</option>
		</select>
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 120px;" required>
		    <option selected="">+962</option>
		</select>
    	<input name="phone#" class="form-control" placeholder="رقم الهاتف" type="text">
    </div> <!-- form-group// -->


    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input class="form-control" placeholder="كلمة السر" type="password" name="pass" id="password">
</div>
   <small style="color:gray">ملاحظة : يحب ان يكون طول كلمة السر بين 5-25 حرفاً**</small>

   <div class="form-group input-group"> </div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input class="form-control" placeholder="تأكيد كلمة السر" type="password" name="pass2" id="password2"></div>
        <span id="msg" style="color:red"> </span>
        <div class="form-group input-group"> </div>
    <!-- form-group// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="insert"> انشاء حساب  </button>
    </div> <!-- form-group// -->

     <div class="error" > <?php  echo $error ?> </div>

    <p class="text-center">هل تملك حساب ؟ <a href="http://localhost/ReadersCommunity/Login/login.php">تسجيل الدخول</a> </p>
</form>
</article>
</div>

</div>
<!--container end.//-->

 </body> </html>
