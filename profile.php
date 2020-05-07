<!DOCTYPE html>
<html lang="en">
  <head>
    <title> User Profile </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin " rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <link href="http://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin " rel="stylesheet">


    </head>

    <body style="border-style:outset;border-color:lightblue;border-width:9px ; ">

      <script>

  function Validate(){
   var pass1=document.getElementById("password").value;
   var pass2=document.getElementById("password2").value;


  if(pass1=="" ){document.getElementById("msg").innerHTML="** الرجاء ادخال كلمة السر ";return false;}

  if(pass1.length <5 ){document.getElementById("msg").innerHTML="** كلمة السر يجب ان تحتوي على اكثر من 5 خانات  ";
   return false;}

   if(pass1.length >25 ){document.getElementById("msg").innerHTML="** كلمة السر يحب ان تكون اقل من 26 خانة  ";
   return false;}

  if(pass1 != pass2) {
   document.getElementById("msg").innerHTML="** كلمة السر غير متطابقة  ";
   return false;
  }
  }


 </script>





      <?php
   session_start();
    $con=new mysqli("localhost","root","","readers community");
    
    $user=$_SESSION['User_Type'];
        if($user=='Admin' || $user=='User'){
        
        
          echo"
   <nav class='navbar navbar-inverse' style='font-family:Lateef;font-weight:bold;font-size:16px'>
  <div class='container-fluid'>

    <div class='navbar-header'>
      <a class='navbar-brand' href='#'></a>
    </div>


    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
      <ul class='nav navbar-nav'>

        <li><a href='index2.php'>PDFكتب ال</a></li>
         <li><a href='audio_books.php'>كتب صوتية</a></li>
         <li><a href='Advertisments.php'>الإعلانات</a></li>
         
        <li class='active'><a href='profile.php'>الصفحة الشخصية<span class='sr-only'>(current)</span></a></li>
           <li style='margin-left:750px'><a href='?comm=logout'><i class='glyphicon glyphicon-log-out'>&nbsp;تسجيل الخروج </i></a></li>
      </ul>
      ";
      if(isset($_GET['comm'])=='logout'){
                   session_unset();
                  session_destroy();
                  header("location:index.php");  }


   echo" </div>
  </div>
</nav>
      <hr>

     <div class='container bootstrap snippet'>
    <div class='row'>


    </div>
    <div class='row' style='border-style:solid;border-color:lightgray'>
  		<div>


      <div>

         ";
        $qr="select * from `users` where `id`=$_SESSION[id]";
        $nn=mysqli_query($con,$qr);
        $rw=mysqli_fetch_array($nn);


        echo"
      <div class='text-center'> <img src='images/".$rw['img']." ' class='avatar img-circle img-thumbnail' alt='avatar' width='150px'>
         </div>
        <div style='text-align:center'><h1 style='color:blue;font-family:moonspace'>";

        $b="select * from `users` where  `id` = '".$_SESSION['id']."' ";
       $c=mysqli_query($con,$b);
       $row=mysqli_fetch_array($c);

        echo" ".$row[0]." </h1> </div>
        <form method='post' action='profile.php' enctype='multipart/form-data'>
        <input type='file'  name='file' id='files'  accept='image/*' style='display:none;' required>
        <label for='files' style='color:black;height:60px;width:200px;background-color:white;font-size:15px;margin-left:480px;display:flex;justify-content:center;align-items:center'>
        <i class='glyphicon glyphicon-camera'> </i> &nbsp;
       اختيار صورة</label>
    <div class='text-center'> <input type='submit' name='addimg' value='تعديل' style='background-color:black;color:white'></div>
        </form>";



          if(isset($_POST['addimg'])){
          $targ1 = "chat/images/".basename($_FILES['file']['name']);
		  $targ2 = "images/".basename($_FILES['file']['name']);
         $im=$_FILES['file']['name'];
          $in="update `users` set `img`='$im' where `id`='$_SESSION[id]'";
          mysqli_query($con,$in);
           move_uploaded_file($_FILES['file']['tmp_name'],$targ1);
		   move_uploaded_file($_FILES['file']['tmp_name'],$targ2);
         }

       echo"
    	<div class='col-sm-9 col-sm-offset-1'> <br><br>
            <ul class='nav nav-tabs'>

                <li class='active' style='background-color:lightgray;font-size:15px'><a data-toggle='tab' href='#home'>تعديل المعلومات الشخصية</a></li>
                  <li style='background-color:lightgray;font-size:15px'><a data-toggle='tab' href='#settings'>إعلاناتي</a></li>
              </ul>


          <div class='tab-content'>

            <div class='tab-pane' id='settings'>
                <hr>";


                   $qr="select advertisments.*,advertisments.id as ID,users.* from advertisments,users where users.id=advertisments.advertiser_id and `advertiser_id`= '".$_SESSION['id']."' order by advertisments.id desc";
                   $res=mysqli_query($con,$qr);

          echo"     <div class='container'>

          <div id='products' class='row list-group col-xs-9'>  ";


           while($row4 = mysqli_fetch_array($res)){


           echo" <div class='item  col-xs-4'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:480px;margin-bottom:12px'>


              <center>  <img src='images/".$row4['image']."'   height='200' width='170' /> </center> <br>

                  <br>
				  <div class='row'>
                        <div class='col-xs-12 col-md-12'>
                            
                        </div></div>
                          <div class='glyphicon glyphicon-map-marker'><b class='group inner list-group-item-text' style='color:darkred;font-family:Lateef;font-size:18px'>
                        ".$row4['city']."</b> </div><hr>

                    <div class='row'>
                        <div class='col-xs-12 col-md-7'>
                           <div class='row col-md-12'><div class='glyphicon glyphicon-calendar'><b style='color:gray;font-family:lateef;font-weight:bold;font-size:15px'>  ".$row4['date']." </b></div> </div>
                        </div>
                       <!-- <div class='col-xs-12 col-md-5'>
                           <a data-toggle='modal' data-target='#".$row4['ID']."'> <input type='submit'  class='btn btn-success' value='تفاصيل عن الاعلان' style='font-size:11px;font-weight:bold;padding-right:2px' ></a>
                        </div> -->
						
                    </div>
                  <br> 
                         <div class='caption'>
                   <div class='row' style='text-align:right;margin-right:2px;border-color:white;overflow:hidden'> <h4 class='group inner list-group-item-heading' style='font-family:lateef;font-weight:bold;font-size:20px;color:black'>
                         ".$row4['description']."</h4></div><br>
                        <div class='col-xs-12 col-md-5'>
                           <a data-toggle='modal' data-target='#".$row4['ID']."'> <input type='submit'  class='btn btn-danger' value=' حـــذف الإعــــلان' style='font-size:11px;font-weight:bold;padding-right:2px' ></a>
                        </div>
                </div>
            </div>
        </div>



 <div id='".$row4['ID']."' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='delete' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalCenterTitle'></h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            </div>
            <div class='modal-body'>
                <center><h3>هل انت متأكد ؟</h3></center>
            </div>
            
            <div class='modal-footer' style='direction: ltr;'>
                
                
              <button data-dismiss='modal' aria-label='Close' class='btn btn-danger'>الغاء</button>
             <a href='deleteAdv.php?id=".$row4['ID']."'>   <button type='submit' name='delete_book' class='btn btn-primary'>نعم , حذف</button> </a>
            </div>
            
        </div>
    </div>
</div>


 <!--<div class='modal fade' id='".$row4['id']."'>
  <div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header' style='text-align:right'>تفاصيل الإعــلان</div>

       <div class='modal-body'>
         <div class='row' >
         
           
            <div style='margin-left:200px'>
           <img src='images/".$row4['image']."'  width=140px height=180px />
           </div>
		   <div style='margin-left:350px'>
		   <table border='0'>
           <tr> <label style='font-family:lateef;font-weight:bold;font-size:18px'> <th><b> ".$row4['book-name']."</b></th><th><b style='color:darkred'> : اسم الكتاب</b></th></label></tr>
            <tr>   <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row4['author']."</b></th><th><b style='color:darkred'>: اسم المؤلف </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row4['book-type']."</b></th><th><b style='color:darkred'>:تصنيف الكتاب  </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row4['status']."</b></th><th><b style='color:darkred'>: حالة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row4['language']."</b></th><th><b style='color:darkred'>: لغـة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row4['price']."</b> </th><th><b style='color:darkred'>: سعر الكتاب </b></th></label></tr>
			</table>
           </div>
         </div>
         <hr> <div style='text-align:right;color:darkred;'><h4 style='font-family:lateef;font-weight:bolder;font-size:20px'>معلومات عن المعلن  </h4></div>
          <div style='border-style:solid;border-color:gray;text-align:right;padding:10px'>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$row4['Full_Name']." &nbsp; <div class='glyphicon glyphicon-user' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$row4['Phone#']." &nbsp;<div class='glyphicon glyphicon-earphone' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$row4['Email']." &nbsp;<div class='glyphicon glyphicon-envelope' style='color:darkgreen'></div>   </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$row4['address']." &nbsp;<div class='glyphicon glyphicon-map-marker' style='color:darkgreen'></div>   </label><br>
            </div>

<br> 
		  
		  </div>


        <div class='modal-footer'>
		 
        <a href=''><input type='submit' value='اغلاق'></a></div>

      </div>
  </div>
  </div> -->






  ";


           }


          echo"

          </div>
                    </div>

             </div><!--/tab-pane-->




               	<div class='tab-pane active' id='home'>

                  <form class='form col-xs-12' action='edit-info.php' method='post'>
                  <div class='form-group'>
                          <hr>
                          <div class='col-xs-4'>

                              <b><h3 style='color:darkred'>تعديل المعلومات الرئيسية</h3></b>
                          </div>
                      </div>
                      <div class='form-group'>

                          <div class='col-xs-12'>

                              <b><h3> </h3></b>
                          </div>
                      </div>

                         <div class='form-group'>

                          <div class='col-xs-6'>
                              <label for='full_name'><h4>الاسم</h4></label>
                              <input type='text' class='form-control' name='first_name' id='first_name'";
                               $b="select * from `users` where  `id` = '".$_SESSION['id']."' ";
                               $c=mysqli_query($con,$b);
                              $row=mysqli_fetch_array($c);

                              echo"value='".$row[0]."' required >
                          </div>
                      </div>


                      <div class='form-group'>

                          <div class='col-xs-6'>
                              <label for='phone'><h4>رقم الهاتف</h4></label>
                              <input type='text' class='form-control' name='phone' id='phone'";
                               $b="select * from `users` where  `id` = '".$_SESSION['id']."' ";
                               $c=mysqli_query($con,$b);
                               $row=mysqli_fetch_array($c);

                  echo"    value='".$row[6]."' required>
                          </div>
                      </div>

                      <div class='form-group'>

                          <div class='col-xs-6'>
                              <label for='email'><h4>البريد الالكتروني</h4></label>
                              <input type='email' class='form-control' name='email' id='email'";
                               $b="select * from `users` where  `id` = '".$_SESSION['id']."' ";
                               $c=mysqli_query($con,$b);
                             $row=mysqli_fetch_array($c);

                              echo"   value='".$row[3]."' required >
                          </div>
                      </div>
                      <div class='form-group'>

                          <div class='col-xs-12'>
                              <b><h3> </h3></b>
                          </div>
                      </div>
                      <div class='form-group'>
                           <div class='col-xs-12'>
                                <br>
                              	<button name='edit' class='btn btn-lg btn-success' type='submit'><i class='glyphicon glyphicon-ok-sign' ></i> حفظ</button>

                            </div>
                      </div>  </form>
                    <form action='edit-info.php' method='post' onsubmit='return Validate()'>  <div class='form-group'>

                          <div class='col-xs-4'>
                          <hr>
                              <b><h3 style='color:darkred'>كلمة المرور</h3></b>
                          </div>
                      </div>

                     <div class='form-group'>

                          <div class='col-xs-12'>
                              <b><h3> </h3></b>
                          </div>
                      </div>

                       <div class='form-group'>

                          <div class='col-xs-6 '>
                            <label for='pass'><h4>كلمة المرور الجديدة</h4></label>
                              <input type='password' class='form-control' name='pass'   id='password' >
                          </div>
                      </div>
                      <div class='form-group'>

                          <div class='col-xs-6 '>
                            <label for='pass1'><h4>تأكيد كلمة المرور</h4></label>
                              <input type='password' class='form-control' name='pass1'   id='password2'>
                          </div>
                      </div>
                       <div class='form-group'>

                          <div class='col-xs-6 '>
                         <small style='color:gray'>ملاحظة:كلمة السر يجب ان تكون بين 5-25 حرفاً او رقم**</small>
                          </div>
                      </div>


                       <div class='form-group'>

                          <div class='col-xs-12 '>
                          <span id='msg' style='color:red'> </span>
                          </div>
                      </div>
                        <div class='form-group'>

                          <div class='col-xs-12 '>
                          <input type='hidden'name='pass'>
                          </div>
                      </div>
                      <div class='form-group'>
                           <div class='col-xs-12'>
                                <br>
                              	<button name='changepass' class='btn btn-lg btn-success' type='submit'><i class='glyphicon glyphicon-ok-sign' ></i> حفظ</button>

                            </div>
                      </div>
                       <div class='form-group'>
                           <div class='col-xs-12'>
                                <br>
                            </div>
                      </div>
              	</form>
              </div>

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
       "; 
        
        
       }
       else{header("location:http://localhost/ReadersCommunity/Login/login.php");}  ?>




    </body>



     </html>
