<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Readers Community</title>
    <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           <link href="http://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin " rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    </head>


    <body>
      <?php
   session_start();
  $con=new mysqli("localhost","root","","readers community");
  
  $user=$_SESSION['User_Type'];
         if($user=='User' || $user=='Admin'){
   
      echo"   <nav class='navbar navbar-inverse' style='font-family:Lateef;font-size:20px;font-weight:bolder'>
  <div class='container-fluid'>

    <div class='navbar-header'>
      <a class='navbar-brand' href='#'></a>
    </div>


    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
	
	<form class='navbar-form navbar-left' action='Advertisments.php' method='get' >
        <div class='form-group'>
          <input type='text' style='text-align:right' class='form-control' placeholder='ابحث بواسطة اسم الكتاب او اسم الكاتب' name='book' size=40px>
        </div>
        <button type='submit' class='btn btn-danger' name='search2'>بحث</button>
      </form>
	  <br><br><br>
      <ul class='nav navbar-nav'>

        <li><a href='index2.php'>كتب PDF</a></li>
         <li><a href='audio_books.php'>كتب صوتية</a></li>
        <li class='active'><a href='Advertisments.php'>الاعلانات<span class='sr-only'>(current)</span></a></li>
      

      </ul>
      

         <form  method='get' action='Advertisments.php'>
      <ul class='nav navbar-nav navbar-right' >
        <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>السعر<span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray;' >
               ";

             $q ="select * from advertisments group by `price`";
             $res2= mysqli_query($con,$q);

             while($row2 = mysqli_fetch_array($res2)){

          echo"  <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?Price=".$row2[2]."'>".$row2[2]." JD</a></li>";
             }

         echo" </ul>
        </li>
         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>لغة الكتاب<span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray;' > ";


          $qury2 ="select * from advertisments group by `language`";
          $ress2= mysqli_query($con,$qury2);

             while($roww2 = mysqli_fetch_array($ress2)){

              echo"<li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?languages=".$roww2[9]."'>".$roww2[9]."</a></li>";
             }

        echo"  </ul>
        </li>

         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
          تصنيف الكتاب <span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray'>
            ";

             $qury1 ="select * from advertisments group by `book-type`";
          $resss= mysqli_query($con,$qury1);


             while($roww1 = mysqli_fetch_array($resss)){

            echo" <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?item=".$roww1[7]."'>".$roww1[7]."</a></li>";
              }


         echo" </ul>
        </li>
         </form>


        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'> <span class='glyphicon glyphicon-cog'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray'>
            <li><a href='profile.php'> ";
            $qr="select * from `users` where `id`=$_SESSION[id]";
           $nn=mysqli_query($con,$qr);
            $rw=mysqli_fetch_array($nn);
            echo"<img src='images/".$rw['img']."' width=40px height=40px> <b style='padding-left:10px'>";

            $b="select * from `users` where  `id` = '".$_SESSION['id']."' ";
            $c=mysqli_query($con,$b);
            $row=mysqli_fetch_array($c);
            echo" ".$row[0]."&nbsp;</b></a></li>
            <li role='separator' class='divider'></li>
            <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='profile.php#home'>تعديل المعلومات الشخصية</a></li>
            
                 <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='chat/chats.php'>دردشة</a></li>

            <li role='separator' class='divider'></li>
            <li style='font-family:Lateef;font-size:16px;font-weight:bolder'> <a href='?command=logout'><b>تسجيل الخروج</b></a> </li> ";
                 if(isset($_GET['command'])=='logout'){
                  session_unset();
                  session_destroy();
                echo"<script>window.location='index.php'; </script>";}
      echo"    </ul>
        </li>
      </ul>
    </div>
  </div>
</nav><br>


<a data-toggle='modal' data-target='#addadv'><b style='font-size: large ;margin-left:50px'>اضافة اعـلان &nbsp;</b><div class='glyphicon glyphicon-plus'></div>
</a>
<div class='modal fade' id='addadv'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>اضافة اعلان</div>

       <div class='modal-body'>
          		<form role='form' style='font-family:serif;font-weight: bold;' action='addadv.php' method='post' enctype='multipart/form-data'>

              	<div class='row'>
			    				<div class='col-xs-6 col-sm-6 col-md-6'>
                  <label> اسـم الكتاب: </label>
			    					<div class='form-group'>
			                <input type='text' name='book-name'  class='form-control input-sm floatlabel' placeholder=''required>
			    					</div></div>
			    				<div class='col-xs-6 col-sm-6 col-md-6'>
                   <label> لـغة الكتاب : </label>
			    					<div class='form-group'>
			    						<input type='text' name='language'  class='form-control input-sm' placeholder='' required>
			    					</div>
			    				</div></div>

             <div class='row'>
			    				<div class='col-xs-6 col-sm-6 col-md-6'>
                   <label> سعـر الكتاب : </label>
			    					<div class='form-group'>
			                <input type='text' name='price'  class='form-control input-sm floatlabel' placeholder='' required>
			    					</div>
			    				</div>
			    				<div class='col-xs-6 col-sm-6 col-md-6'>
                   <label> اسـم المؤلف : </label>
			    					<div class='form-group'>
			    						<input type='text' name='author'  class='form-control input-sm' placeholder=''required>
			    					</div>
			    				</div>
			    			</div>




            <div class='row'>
               <div class='col-xs-6'>
                <label> صـورة الكتاب : </label>
			    					<div class='form-group'>
			                <input type='File' name='image' accept='image/*' class='form-control input-sm floatlabel' required>
			    					</div>
			    		</div>

			    	</div>

              <hr>
               <div class='form-group'>
                <label> وصـف الاعلان : </label>
			                <textarea cols=40 rows=3  name='description' class='form-control input-sm'required></textarea>
			    					</div>

<hr>
			    			<div class='form-group'>

           <label> نـوع الكتاب : </label>

                  <select name='type' class='form-control input-sm'required>
                    <option selected style='font-family:Lateef;font-size:17px ;font-weight: bold;'> --نـوع الكتاب--</option>
                    <option value='كتب علمية وثقافية' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب علمية </option>
                    <option value='كتب اطفال' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب اطفال</option>
                    <option value='كتب اسلامية' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب اسلامية</option>
                    <option value='كتب الشعر والأدب' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب الأدب والشعر </option>
                    <option value='كتب الصحة' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب الصحة</option>
                     <option value='كتب التاريخ' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب التاريخ</option>
                     <option value='كتب الجريمة والرعب' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب الجريمة</option>
                    <option value='كتب المغامرة' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب المغامرة </option>
                    <option value='كتب رومانسية' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب رومانسية</option>
                     <option value='كتب التنمية البشرية' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب التنمية البشرية</option>
                   <option value='كتب الغموض' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب الشعر والأدب</option>
                    <option value='كتب الطبخ' style='font-family:Lateef;font-size:17px ;font-weight: bold'>كتب الطبخ</option>
                  </select>

                </div><hr>
                			<div class='form-group ' required>
                         <label> حالة الكتاب  : </label>
                        <div class='row col-xs-12'>
                           <input type='radio' name='status' value='قديم جداً'>  قديم جداً
                        	 <input type='radio' name='status' value='متوسطة' > متوسطة
                           <input type='radio' name='status' value='شبه جديد'> شبه جديد
                      </div>
                </div><hr>

                       <div class='form-group'>
                        <label> العنوان : </label>
			    						<input type='text' name='address' id='last_name' class='form-control input-sm' placeholder=''required>
			    					</div>
                      <hr>
                      <div class='form-group'>
                       <label> المحافظة : </label>
                      <select name='city' class='form-control input-sm'required>
                    <option selected style='font-family:Lateef;font-size:17px ;font-weight: bold;'> --اختر-</option>
                    <option value='Amman' style='font-family:Lateef;font-size:17px ;font-weight: bold'>عمان </option>
                    <option value='Az-Zarqaa' style='font-family:Lateef;font-size:17px ;font-weight: bold'>الزرقاء </option>
                    <option value='Irbid' style='font-family:Lateef;font-size:17px ;font-weight: bold'>اربد</option>
                    <option value='Al-Aqaba' style='font-family:Lateef;font-size:17px ;font-weight: bold'>العقبة </option>
                    <option value='Al-Tafeela' style='font-family:Lateef;font-size:17px ;font-weight: bold'>الطفيلة </option>
                     <option value='Al-Mafraq' style='font-family:Lateef;font-size:17px ;font-weight: bold'>المفرق</option>
                     <option value='Jarash' style='font-family:Lateef;font-size:17px ;font-weight: bold'>جرش</option>
                    <option value='Ajloun' style='font-family:Lateef;font-size:17px ;font-weight: bold'>عجلون </option>
                    <option value='Al-Balqaa' style='font-family:Lateef;font-size:17px ;font-weight: bold'>البلقاء</option>
                     <option value='Al-Karak' style='font-family:Lateef;font-size:17px ;font-weight: bold'>الكرك</option>
                   <option value='Madaba' style='font-family:Lateef;font-size:17px ;font-weight: bold'>مادبا</option>
                    <option value='Ma'an' style='font-family:Lateef;font-size:17px ;font-weight: bold'> معان</option>
                  </select>




                      </div>
                      <br>

			    			<input type='submit' value='اضافـة إعلان' class='btn btn-info btn-block' name='add2'>


              </form>
       </div>

    </div>

  </div>

</div> <br>    ";

        if(isset($_GET['Price'])){

           $price=$_GET['Price'];
           $qry ="select advertisments.*,advertisments.id as ID,users.* from advertisments,users  where advertisments.advertiser_id=users.id and  `price`='$price' order by advertisments.id desc";


          $output= mysqli_query($con,$qry);

       echo"  <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>

         <div class='container'>

          <div id='products' class='row list-group'>   ";


           while($rslt = mysqli_fetch_assoc($output)){

           echo" <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:480px;margin-bottom:12px'>

              <center>  <img src='images/".$rslt['image']."'   height='200' width='170' /> </center> <br>

                  <br>
				  <div class='row'>
                        <div class='col-xs-12 col-md-12'>
                            
                        </div></div>
                          <div class='glyphicon glyphicon-map-marker'><b class='group inner list-group-item-text' style='color:darkred;font-family:Lateef;font-size:18px'>
                        ".$rslt['city']."</b> </div><hr>

                    <div class='row'>
                        <div class='col-xs-12 col-md-7'>
                           <div class='row col-md-12'><div class='glyphicon glyphicon-calendar'><b style='color:gray;font-family:lateef;font-weight:bold;font-size:15px'>  ".$rslt['date']." </b></div> </div>
                        </div>
                        <div class='col-xs-12 col-md-5'>
                           <a data-toggle='modal' data-target='#".$rslt['ID']."'> <input type='submit'  class='btn btn-success' value='تفاصيل عن الاعلان' style='font-size:11px;font-weight:bold;padding-right:2px' ></a>
                        </div>
                    </div>
                  <br> <br>
                         <div class='caption'>
                   <div class='row' style='text-align:right;margin-right:2px;border-color:white;overflow:hidden'> <h4 class='group inner list-group-item-heading' style='font-family:lateef;font-weight:bold;font-size:20px;color:black'>
                         ".$rslt['description']."</h4></div>

                </div>
            </div>
        </div>


 <div class='modal fade' id='".$rslt['ID']."'>
  <div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header' style='text-align:right'>تفاصيل الإعــلان</div>

       <div class='modal-body'>
         <div class='row' >
         
           
            <div style='margin-left:200px'>
           <img src='images/".$rslt['image']."'  width=140px height=180px />
           </div>
		   <div style='margin-left:350px'>
		   <table border='0'>
           <tr> <label style='font-family:lateef;font-weight:bold;font-size:18px'> <th><b> ".$rslt['book-name']."</b></th><th><b style='color:darkred'> : اسم الكتاب</b></th></label></tr>
            <tr>   <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['author']."</b></th><th><b style='color:darkred'>: اسم المؤلف </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['book-type']."</b></th><th><b style='color:darkred'>:تصنيف الكتاب  </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['status']."</b></th><th><b style='color:darkred'>: حالة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['language']."</b></th><th><b style='color:darkred'>: لغـة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['price']."</b> </th><th><b style='color:darkred'>: سعر الكتاب </b></th></label></tr>
			</table>
           </div>
         </div>
         <hr> <div style='text-align:right;color:darkred;'><h4 style='font-family:lateef;font-weight:bolder;font-size:20px'>معلومات عن المعلن  </h4></div>
          <div style='border-style:solid;border-color:gray;text-align:right;padding:10px'>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$rslt['Full_Name']." &nbsp; <div class='glyphicon glyphicon-user' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$rslt['Phone#']." &nbsp;<div class='glyphicon glyphicon-earphone' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$rslt['Email']." &nbsp;<div class='glyphicon glyphicon-envelope' style='color:darkgreen'></div>   </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$rslt['address']." &nbsp;<div class='glyphicon glyphicon-map-marker' style='color:darkgreen'></div>   </label><br>
            </div>

<br>";  
      if($rslt['advertiser_id']!= $_SESSION['id']){
       $_SESSION['adv-id']=$rslt['advertiser_id'];
 echo"<div style='text-align:right'>
  <a href='chat/chat.php?adv_id=".$rslt['advertiser_id']."'><input name='chat'type='submit'style='font-family:lateef;padding:10px;background-color:green;font-weight:bold;font-size:20px' 
		  value='تواصـل مع المعلن'>
</a> </div>   "; }
		  
		  echo"</div>


        <div class='modal-footer'>
		 
        <a href=''><input type='submit' value='اغلاق'></a></div>

      </div>
  </div>
  </div> ";
           }

           echo" </div>
                    </div>";

        }

      else  if(isset($_GET['languages'])){

           $langs=$_GET['languages'];
           $qry ="select advertisments.*,advertisments.id as ID,users.* from advertisments,users  where advertisments.advertiser_id=users.id and `language`='$langs' order by advertisments.id desc";


          $output= mysqli_query($con,$qry);

       echo"  <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>

         <div class='container'>

          <div id='products' class='row list-group'>   ";


           while($rslt = mysqli_fetch_assoc($output)){

           echo" <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:480px;margin-bottom:12px'>

              <center>  <img src='images/".$rslt['image']."'   height='200' width='170' /> </center> <br>

                  <br>
				  <div class='row'>
                        <div class='col-xs-12 col-md-12'>
                            
                        </div></div>
                          <div class='glyphicon glyphicon-map-marker'><b class='group inner list-group-item-text' style='color:darkred;font-family:Lateef;font-size:18px'>
                        ".$rslt['city']."</b> </div><hr>

                    <div class='row'>
                        <div class='col-xs-12 col-md-7'>
                           <div class='row col-md-12'><div class='glyphicon glyphicon-calendar'><b style='color:gray;font-family:lateef;font-weight:bold;font-size:15px'>  ".$rslt['date']." </b></div> </div>
                        </div>
                        <div class='col-xs-12 col-md-5'>
                           <a data-toggle='modal' data-target='#".$rslt['ID']."'> <input type='submit'  class='btn btn-success' value='تفاصيل عن الاعلان' style='font-size:11px;font-weight:bold;padding-right:2px' ></a>
                        </div>
                    </div>
                  <br> <br>
                         <div class='caption'>
                   <div class='row' style='text-align:right;margin-right:2px;border-color:white;overflow:hidden'> <h4 class='group inner list-group-item-heading' style='font-family:lateef;font-weight:bold;font-size:20px;color:black'>
                         ".$rslt['description']."</h4></div>

                </div>
            </div>
        </div>


 <div class='modal fade' id='".$rslt['ID']."'>
  <div class='modal-dialog'>
  <div class='modal-content'>
<div class='modal-header' style='text-align:right'>تفاصيل الإعــلان</div>

       <div class='modal-body'>
         <div class='row' >
         
           
            <div style='margin-left:200px'>
           <img src='images/".$rslt['image']."'  width=140px height=180px />
           </div>
		   <div style='margin-left:350px'>
		   <table border='0'>
           <tr> <label style='font-family:lateef;font-weight:bold;font-size:18px'> <th><b> ".$rslt['book-name']."</b></th><th><b style='color:darkred'> : اسم الكتاب</b></th></label></tr>
            <tr>   <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['author']."</b></th><th><b style='color:darkred'>: اسم المؤلف </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['book-type']."</b></th><th><b style='color:darkred'>:تصنيف الكتاب  </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['status']."</b></th><th><b style='color:darkred'>: حالة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['language']."</b></th><th><b style='color:darkred'>: لغـة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['price']."</b> </th><th><b style='color:darkred'>: سعر الكتاب </b></th></label></tr>
			</table>
           </div>
         </div>
         <hr> <div style='text-align:right;color:darkred;'><h4 style='font-family:lateef;font-weight:bolder;font-size:20px'>معلومات عن المعلن  </h4></div>
          <div style='border-style:solid;border-color:gray;text-align:right;padding:10px'>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$rslt['Full_Name']." &nbsp; <div class='glyphicon glyphicon-user' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$rslt['Phone#']." &nbsp;<div class='glyphicon glyphicon-earphone' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$rslt['Email']." &nbsp;<div class='glyphicon glyphicon-envelope' style='color:darkgreen'></div>   </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$rslt['address']." &nbsp;<div class='glyphicon glyphicon-map-marker' style='color:darkgreen'></div>   </label><br>
            </div>

<br>";  
      if($rslt['advertiser_id']!= $_SESSION['id']){
       $_SESSION['adv-id']=$rslt['advertiser_id'];
          echo"<div style='text-align:right'>
         <a href='chat/chat.php?adv_id=".$rslt['advertiser_id']."'><input name='chat'type='submit'style='font-family:lateef;padding:10px;background-color:green;font-weight:bold;font-size:20px' 
		  value='تواصـل مع المعلن'>
            </a> </div>   "; }
		  
		  echo"  
		  
		  </div>


        <div class='modal-footer'>
		 
        <a href=''><input type='submit' value='اغلاق'></a></div>    

      </div>
  </div>
  </div> ";
           }

           echo" </div>
                    </div>";

        }


     else if(isset($_GET['item'])) {

              $books=$_GET['item'];
           $qry ="select advertisments.*,advertisments.id as ID,users.* from advertisments,users  where advertisments.advertiser_id=users.id and `book-type`='$books' order by advertisments.id desc";


          $output= mysqli_query($con,$qry);

       echo" <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>

         <div class='container'>

          <div id='products' class='row list-group'>   ";


           while($rslt = mysqli_fetch_assoc($output)){

           echo" <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:480px;margin-bottom:12px'>

              <center>  <img src='images/".$rslt['image']."'   height='200' width='170' /> </center> <br>

                  <br>
                        <div class='row'>
                        <div class='col-xs-12 col-md-12'>
                            
                        </div></div>
                          <div class='glyphicon glyphicon-map-marker'><b class='group inner list-group-item-text' style='color:darkred;font-family:Lateef;font-size:18px'>
                        ".$rslt['city']."</b> </div><hr>

                    <div class='row'>
                        <div class='col-xs-12 col-md-7'>
                           <div class='row col-md-12'><div class='glyphicon glyphicon-calendar'><b style='color:gray;font-family:lateef;font-weight:bold;font-size:15px'>  ".$rslt['date']." </b></div> </div>
                        </div>
                        <div class='col-xs-12 col-md-5'>
                           <a data-toggle='modal' data-target='#".$rslt['ID']."'> <input type='submit'  class='btn btn-success' value='تفاصيل عن الاعلان' style='font-size:11px;font-weight:bold;padding-right:2px' ></a>
                        </div>
                    </div>
                  <br> <br>
                         <div class='caption'>
                   <div class='row' style='text-align:right;margin-right:2px;border-color:white;overflow:hidden'> <h4 class='group inner list-group-item-heading' style='font-family:lateef;font-weight:bold;font-size:20px;color:black'>
                         ".$rslt['description']."</h4></div>

                </div>
            </div>
        </div>


 <div class='modal fade' id='".$rslt['ID']."'>
  <div class='modal-dialog'>
  <div class='modal-content'>
     <div class='modal-header' style='text-align:right'>تفاصيل الإعــلان</div>

       <div class='modal-body'>
         <div class='row' >
         
           
            <div style='margin-left:200px'>
           <img src='images/".$rslt['image']."'  width=140px height=180px />
           </div>
		   <div style='margin-left:350px'>
		   <table border='0'>
           <tr> <label style='font-family:lateef;font-weight:bold;font-size:18px'> <th><b> ".$rslt['book-name']."</b></th><th><b style='color:darkred'> : اسم الكتاب</b></th></label></tr>
            <tr>   <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['author']."</b></th><th><b style='color:darkred'>: اسم المؤلف </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['book-type']."</b></th><th><b style='color:darkred'>:تصنيف الكتاب  </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['status']."</b></th><th><b style='color:darkred'>: حالة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['language']."</b></th><th><b style='color:darkred'>: لغـة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$rslt['price']."</b> </th><th><b style='color:darkred'>: سعر الكتاب </b></th></label></tr>
			</table>
           </div>
         </div>
         <hr> <div style='text-align:right;color:darkred;'><h4 style='font-family:lateef;font-weight:bolder;font-size:20px'>معلومات عن المعلن  </h4></div>
          <div style='border-style:solid;border-color:gray;text-align:right;padding:10px'>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$rslt['Full_Name']." &nbsp; <div class='glyphicon glyphicon-user' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$rslt['Phone#']." &nbsp;<div class='glyphicon glyphicon-earphone' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$rslt['Email']." &nbsp;<div class='glyphicon glyphicon-envelope' style='color:darkgreen'></div>   </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$rslt['address']." &nbsp;<div class='glyphicon glyphicon-map-marker' style='color:darkgreen'></div>   </label><br>
            </div>

<br>";  
      if($rslt['advertiser_id']!= $_SESSION['id']){
       $_SESSION['adv-id']=$rslt['advertiser_id'];
          echo"<div style='text-align:right'>
         <a href='chat/chat.php?adv_id=".$rslt['advertiser_id']."'><input name='chat'type='submit'style='font-family:lateef;padding:10px;background-color:green;font-weight:bold;font-size:20px' 
		  value='تواصـل مع المعلن'>
            </a> </div>   "; }
		  
		  echo"  
		  
		  </div>

        <div class='modal-footer'>
		 
        <a href=''><input type='submit' value='اغلاق'></a></div>

      </div>
  </div>
  </div> ";
           }

           echo" </div>
                    </div>"; }








         else if (isset($_GET['search2'])){

          $book=$_GET['book'];
           $qury ="select advertisments.*,advertisments.id as ID ,users.* from advertisments,users  where advertisments.advertiser_id=users.id and `book-name`='$book' || `author`='$book' order by advertisments.id desc";



          $res5= mysqli_query($con,$qury);
           if (mysqli_num_rows($res5) >= 1){
       echo" <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>

         <div class='container'>

          <div id='products' class='row list-group'>   ";


           while($row44 = mysqli_fetch_assoc($res5)){

           echo" <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:480px;margin-bottom:12px'>

              <center>  <img src='images/".$row44['image']."'   height='200' width='170' /> </center> <br>

                  <br>
                        <div class='row'>
                        <div class='col-xs-12 col-md-12'>
                            
                        </div></div>
                          <div class='glyphicon glyphicon-map-marker'><b class='group inner list-group-item-text' style='color:darkred;font-family:Lateef;font-size:18px'>
                        ".$row44['city']."</b> </div><hr>

                    <div class='row'>
                        <div class='col-xs-12 col-md-7'>
                           <div class='row col-md-12'><div class='glyphicon glyphicon-calendar'><b style='color:gray;font-family:lateef;font-weight:bold;font-size:15px'>  ".$row44['date']." </b></div> </div>
                        </div>
                        <div class='col-xs-12 col-md-5'>
                           <a data-toggle='modal' data-target='#".$row44['ID']."'> <input type='submit'  class='btn btn-success' value='تفاصيل عن الاعلان' style='font-size:11px;font-weight:bold;padding-right:2px' ></a>
                        </div>
                    </div>
                  <br> <br>
                         <div class='caption'>
                   <div class='row' style='text-align:right;margin-right:2px;border-color:white;overflow:hidden'> <h4 class='group inner list-group-item-heading' style='font-family:lateef;font-weight:bold;font-size:20px;color:black'>
                         ".$row44['description']."</h4></div>

                </div>
            </div>
        </div>


 <div class='modal fade' id='".$row44['ID']."'>
  <div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header' style='text-align:right'>تفاصيل الإعــلان</div>

       <div class='modal-body'>
         <div class='row' >
         
           
            <div style='margin-left:200px'>
           <img src='images/".$row44['image']."'  width=140px height=180px />
           </div>
		   <div style='margin-left:350px'>
		   <table border='0'>
           <tr> <label style='font-family:lateef;font-weight:bold;font-size:18px'> <th><b> ".$row44['book-name']."</b></th><th><b style='color:darkred'> : اسم الكتاب</b></th></label></tr>
            <tr>   <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row44['author']."</b></th><th><b style='color:darkred'>: اسم المؤلف </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row44['book-type']."</b></th><th><b style='color:darkred'>:تصنيف الكتاب  </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row44['status']."</b></th><th><b style='color:darkred'>: حالة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row44['language']."</b></th><th><b style='color:darkred'>: لغـة الكتاب </b></th></label></tr>
             <tr>  <label style='font-family:lateef;font-weight:bold;font-size:18px'><th><b> ".$row44['price']."</b> </th><th><b style='color:darkred'>: سعر الكتاب </b></th></label></tr>
			</table>
           </div>
         </div>
         <hr> <div style='text-align:right;color:darkred;'><h4 style='font-family:lateef;font-weight:bolder;font-size:20px'>معلومات عن المعلن  </h4></div>
          <div style='border-style:solid;border-color:gray;text-align:right;padding:10px'>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$row44['Full_Name']." &nbsp; <div class='glyphicon glyphicon-user' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'>   ".$row44['Phone#']." &nbsp;<div class='glyphicon glyphicon-earphone' style='color:darkgreen'></div> </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$row44['Email']." &nbsp;<div class='glyphicon glyphicon-envelope' style='color:darkgreen'></div>   </label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:22px'> ".$row44['address']." &nbsp;<div class='glyphicon glyphicon-map-marker' style='color:darkgreen'></div>   </label><br>
            </div>

<br>";  
      if($row44['advertiser_id']!= $_SESSION['id']){
       $_SESSION['adv-id']=$row44['advertiser_id'];
          echo"<div style='text-align:right'>
         <a href='chat/chat.php?adv_id=".$row44['advertiser_id']."'><input name='chat'type='submit'style='font-family:lateef;padding:10px;background-color:green;font-weight:bold;font-size:20px' 
		  value='تواصـل مع المعلن'>
            </a> </div>   "; }
		  
		  echo"  
		  
		  </div>


        <div class='modal-footer'>
		 
        <a href=''><input type='submit' value='اغلاق'></a></div>

      </div>
  </div>
  </div> ";
           }

           echo" </div>
                    </div>";



        } else{ echo"<center><h2 style='margin-bottom:400px'>!لا يوجد نتائج </h2></center>";}
         }


        else{
          $qury ="select advertisments.*,advertisments.id as ID ,users.* from advertisments,users  where advertisments.advertiser_id=users.id order by advertisments.id desc";

          $res4= mysqli_query($con,$qury);

    echo"     <div class='container'>
            <br><br><br>
          <div id='products' class='row list-group'>  ";


           while($row4 = mysqli_fetch_assoc($res4)){

       echo"    <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:480px;margin-bottom:12px'>

              <center>  <img src='images/".$row4['image']."'   height='200' width='170' /> </center> <br>

                        <div class='row'>
                        <div class='col-xs-12 col-md-12'>
                            
                        </div></div>
                          <div class='glyphicon glyphicon-map-marker'><b class='group inner list-group-item-text' style='color:darkred;font-family:Lateef;font-size:18px'>
                        ".$row4['city']."</b> </div><hr>

                    <div class='row'>
                        <div class='col-xs-12 col-md-7'>
                           <div class='row col-md-12'><div class='glyphicon glyphicon-calendar'><b style='color:gray;font-family:lateef;font-weight:bold;font-size:15px'>  ".$row4['date']." </b></div> </div>
                        </div>
                        <div class='col-xs-12 col-md-5'>
                           <a data-toggle='modal' data-target='#".$row4['ID']."'> <input type='submit'  class='btn btn-success' value='تفاصيل عن الإعلان' style='font-size:12px;font-weight:bold;padding-right:3px' ></a>
                        </div>
                         </div> <br> <br>
                         <div class='caption'>
                   <div class='row' style='text-align:right;margin-right:2px;border-color:white;overflow:hidden'> <h4 class='group inner list-group-item-heading' style='font-family:lateef;font-weight:bold;font-size:20px;color:black'>
                         ".$row4['description']."</h4></div>
                  <br>



                </div>
            </div>
        </div>


 <div class='modal fade' id='".$row4['ID']."'>
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

<br>";  
      if($row4['advertiser_id']!= $_SESSION['id']){
       $_SESSION['adv-id']=$row4['advertiser_id'];
          echo"<div style='text-align:right'>
         <a href='chat/chat.php?adv_id=".$row4['advertiser_id']."'><input name='chat'type='submit'style='font-family:lateef;padding:10px;background-color:green;font-weight:bold;font-size:20px' 
		  value='تواصـل مع المعلن'>
            </a> </div>   "; }
		  
		  echo"  
		  
		  </div>


        <div class='modal-footer'>
		 
        <a href=''><input type='submit' value='اغلاق'></a></div>


      </div>
  </div>
  </div> ";
           }

          echo"  </div>
                    </div>";



        }



       
      
      
    }
    
     else{header("location:http://localhost/ReadersCommunity/Login/login.php");} ?>

  <footer class="col-ms-9" style="background-color:black " id="contact">
      <div class="container">
        <br>
        <div class="row ">

          <div class="col-md-2 col-md-offset-9">


            	<div>
	              <ul>
	                <li><span class="text" style="color:gray">+962 790 829 627</span></li>
	                <li><a href="#" style="color:gray"><span class="text">ReadersCommunity@gmail.com</span></a></li>
	              </ul>
	            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">

 <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</h5>

          </div>
        </div>
      </div>
    </footer>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body> </html>
