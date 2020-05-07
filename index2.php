 <!DOCTYPE html>
<html lang="en">
<head>
 <title>Readers Community</title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">

        <link href="http://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin " rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link href="styleadv.css" rel="stylesheet">
</head>



<body>
 <?php
   session_start();
    $con=new mysqli("localhost","root","","readers community");
    
    $user=$_SESSION['User_Type'];
         if($user=='User'){
          

             echo"
    <nav class='navbar navbar-inverse' style='font-family:Lateef;font-size:20px;font-weight:bolder'>
  <div class='container-fluid'>

    <div class='navbar-header'>
     
    </div>


    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
      
       <form class='navbar-form navbar-left' action='index2.php' method='get'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='ابحث بواسطة اسم الكاتب او اسم الكتاب' name='book' size=40px>
        </div>
        <button type='submit' class='btn btn-danger' name='search1'>بحث</button>
      </form>
<br><br><br>
     <ul class='nav navbar-nav'>

        <li class='active'><a href='index2.php'>Pdf كتب<span class='sr-only'>(current)</span></a></li>
        <li><a href='audio_books.php'>كتب صوتية </a></li>
        <li><a href='Advertisments.php'>الاعلانات</a></li>


      </ul>
         <form action='index2.php' name='ul' method='get' style='font-family:Lateef;font-size:20px;font-weight:bolder'>
      <ul class='nav navbar-nav navbar-right'>
         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>لغة الكتاب <span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray;' >

           ";
           $qur="select * from books group by `language`";
           $qur2=mysqli_query($con,$qur);
             while($roww22 = mysqli_fetch_array($qur2)){

           echo"  <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?languages=".$roww22[5]."'>".$roww22[5]."</a></li> ";
            }

            echo"
          </ul>
        </li>
         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>نوع الكتاب  <span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray'>
          ";
             $qury2 ="select * from books group by `book_type`";
             $ress2= mysqli_query($con,$qury2);

             while($roww2 = mysqli_fetch_array($ress2)){

          echo"  <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?item=".$roww2[4]."'>".$roww2[4]."</a></li> ";
             }


           echo"

          </ul>
        </li></form>  ";


        echo"
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'> <span class='glyphicon glyphicon-cog'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray'>
               <li><a href='profile.php'>";
               $qr="select * from `users` where `id`=$_SESSION[id]";
              $nn=mysqli_query($con,$qr);
               $rw=mysqli_fetch_array($nn);
               echo"<img src='images/".$rw['img']."' width=40px height=40px> <b style='padding-left:10px'>";

               $b="select * from `users` where  `id` = '".$_SESSION['id']."' ";
            $c=mysqli_query($con,$b);
            $row=mysqli_fetch_array($c);
            echo" ".$row[0]."&nbsp; </b></a></li>
            <li role='separator' class='divider'></li>
            <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='profile.php#home'>تعديل المعلومات الشخصية</a></li>

                <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='chat/chats.php'>دردشة</a></li>
            <li role='separator' class='divider'></li>
            <li style='font-family:Lateef;font-size:16px;font-weight:bolder'> <a href='?type=logout'><b> تسجيل الخروج</b></a> </li> ";

                   if(isset($_GET['type'])=='logout'){
                   session_unset();
                  session_destroy();
                  header("location:index.php");  }
 echo"
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
   <br>
     <br>

      ";
          if(isset($_GET['languages'])){
        $langs=$_GET['languages'];
        $r="select * from books where `language`= '$langs' order by id desc ";
       $r2= mysqli_query($con,$r);

        echo"  <center><p style='font-size:40px;font-family:Lateef'>نتائج البحث</p></center> <br><br>

            <div class='container'>
             <div id='products' class='row list-group'> ";

    while($row44 = mysqli_fetch_assoc($r2) ){

        echo "
         <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:440px;margin-bottom:12px'>
         <center>  <img src='admin/imagess/".$row44['image']."'   height='210' width='170' /> </center>

                   <center> <div class='caption'>
                   <a class='glyphicon glyphicon-download-alt' target='_blank' href='".$row44['pdf_book']."' >&nbsp;تحميل</a>
                      </div></center>


                <div class='caption'>
                   <div class='row' style='margin-left:45px;margin-right:10px' > <h4  style='font-family:lateef;font-weight:bold;font-size:20px;color:lightred'>
                         ".$row44['description']."</h4></div>
                  <br> </div></div> </div>  "; }


   echo"  </div>
			</div>";


      }

     else if(isset($_GET['item'])){
        $type=$_GET['item'];
        $r="select * from books where `book_type`= '$type' order by id desc";
       $r2= mysqli_query($con,$r);

        echo"  <center><p style='font-size:40px;font-family:Lateef'>نتائج البحث</p></center> <br><br>

            <div class='container'>
             <div id='products' class='row list-group'> ";

    while($row44 = mysqli_fetch_assoc($r2) ){

        echo "
         <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:440px;margin-bottom:12px'>
         <center>  <img src='admin/imagess/".$row44['image']."'   height='210' width='170' /> </center>

                   <center> <div class='caption'>
                   <a class='glyphicon glyphicon-download-alt' target='_blank' href='".$row44['pdf_book']."' >&nbsp;تحميل</a>
                      </div></center>


                <div class='caption'>
                   <div class='row' style='margin-left:45px;margin-right:10px' > <h4  style='font-family:lateef;font-weight:bold;font-size:20px;color:lightred'>
                         ".$row44['description']."</h4></div>
                  <br> </div></div> </div>  "; }


   echo"  </div>
			</div>";


      }

      else if(isset($_GET['search1'])){
        $book=$_GET['book'];
        $r="select * from books where `book_name`= '$book' || `author`='$book' order by id desc";
       $r2= mysqli_query($con,$r);
      if (mysqli_num_rows($r2) >= 1){
        echo"  <center><p style='font-size:40px;font-family:Lateef'>نتائج البحث</p></center> <br><br>

            <div class='container'>
             <div id='products' class='row list-group'> ";



    while($row44 = mysqli_fetch_assoc($r2) ){

        echo "
         <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:440px;margin-bottom:12px'>
         <center>  <img src='admin/imagess/".$row44['image']."'   height='210' width='170' /> </center>

                   <center> <div class='caption'>
                   <a class='glyphicon glyphicon-download-alt' target='_blank' href='".$row44['pdf_book']."' >&nbsp;تحميل</a>
                      </div></center>


                <div class='caption'>
                   <div class='row' style='margin-left:45px;margin-right:10px' > <h4  style='font-family:lateef;font-weight:bold;font-size:20px;color:lightred'>
                         ".$row44['description']."</h4></div>
                  <br> </div></div> </div>  "; }


   echo"  </div>
			</div>";


      } else{echo "<center><h2 style='margin-bottom:400px'>لا يوجد نتائج!</h2></center>";}}

       else{
      $qury4 ="select * from books order by id desc";
          $res4= mysqli_query($con,$qury4);


    echo"<div class='container'>
    <div id='products' class='row list-group'>
      <br> <br><br>
            ";


    while($row4 = mysqli_fetch_assoc($res4)){


      echo"   <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:440px;margin-bottom:12px'>

         <center>  <img src='admin/imagess/".$row4['image']."'   height='210' width='170'  /> </center>

                   <center> <div class='caption'>
                   <a class='glyphicon glyphicon-download-alt' target='_blank' href='".$row4['pdf_book']."' >&nbsp;تحميل</a>
                      </div></center>


                <div class='caption'>
                   <div class='row' style='margin-left:45px;margin-right:10px' > <h4 style='font-family:lateef;font-weight:bold;font-size:20px;color:lightred'>
                         ".$row4['description']."</h4></div>
                  <br> </div></div> </div>
 ";   }

  echo"     </div>
			</div> ";
		}


   }
   
   else if($user=='Admin'){
    
       echo"
    <nav class='navbar navbar-inverse' style='font-family:Lateef;font-size:20px;font-weight:bolder'>
  <div class='container-fluid'>

    <div class='navbar-header'>
      <a class='navbar-brand' href='#'></a>
    </div>


    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
	
      <form class='navbar-form navbar-left' action='index2.php' method='get'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='ابحث بواسطة اسم الكاتب او اسم الكتاب' name='book' size=40px>
        </div>
        <button type='submit' class='btn btn-danger' name='search1'>بحث</button>
      </form>
      

   <br><br><br>
      <ul class='nav navbar-nav' >
        <li class='active'><a href='index2.php'>كتب PDF<span class='sr-only'>(current)</span></a></li>
        <li><a href='audio_books.php'>كتب صوتية</a></li>
        <li><a href='Advertisments.php'>الاعلانات</a></li>
        </ul>

     
         <form action='index2.php' name='ul' method='get'>
      <ul class='nav navbar-nav navbar-right'>
         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>لغة الكتاب<span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray;' >

           ";
           $qur="select * from books group by `language`";
           $qur2=mysqli_query($con,$qur);
             while($roww22 = mysqli_fetch_array($qur2)){

           echo"  <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?languages=".$roww22[5]."'>".$roww22[5]."</a></li> ";
            }

            echo"
          </ul>
        </li>
         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>تصنيف الكتاب <span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray'>
          ";
             $qury2 ="select * from books group by `book_type`";
             $ress2= mysqli_query($con,$qury2);

             while($roww2 = mysqli_fetch_array($ress2)){

          echo"  <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?item=".$roww2[4]."'>".$roww2[4]."</a></li> ";
             }


           echo"

          </ul>
        </li></form>  ";


        echo"
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'> <span class='glyphicon glyphicon-cog'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray'>
               <li><a href='profile.php'>";
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
            <li style='font-family:Lateef;font-size:16px;font-weight:bolder'> <a href='?type=logout'><b> تسجيل الخروج</b></a> </li> ";

                   if(isset($_GET['type'])=='logout'){
                   session_unset();
                  session_destroy();
                  header("location:index.php");  }
 echo"
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
   <br>
     <br>

      ";
          if(isset($_GET['languages'])){
        $langs=$_GET['languages'];
        $r="select * from books where `language`= '$langs' order by id desc ";
       $r2= mysqli_query($con,$r);

        echo"  <center><p style='font-size:40px;font-family:Lateef'>نتائج البحث</p></center> <br><br>

            <div class='container'>
             <div id='products' class='row list-group'> ";

    while($row44 = mysqli_fetch_assoc($r2) ){

        echo "
         <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:440px;margin-bottom:12px'>
         <center>  <img src='admin/imagess/".$row44['image']."'   height='210' width='170' /> </center>

                   <center> <div class='caption'>
                   <a class='glyphicon glyphicon-download-alt' target='_blank' href='".$row44['pdf_book']."' > تحميل</a>
                      </div></center>


                <div class='caption'>
                   <div class='row' style='margin-left:45px;margin-right:10px' > <h4  style='font-family:lateef;font-weight:bold;font-size:20px;color:lightred'>
                         ".$row44['description']."</h4></div>
                  <br> </div></div> </div>  "; }


   echo"  </div>
			</div>";


      }

     else if(isset($_GET['item'])){
        $type=$_GET['item'];
        $r="select * from books where `book_type`= '$type' order by id desc";
       $r2= mysqli_query($con,$r);

        echo"  <center><p style='font-size:40px;font-family:Lateef'>نتائج البحث</p></center> <br><br>

            <div class='container'>
             <div id='products' class='row list-group'> ";

    while($row44 = mysqli_fetch_assoc($r2) ){

        echo "
         <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:440px;margin-bottom:12px'>
         <center>  <img src='admin/imagess/".$row44['image']."'   height='210' width='170' /> </center>

                   <center> <div class='caption'>
                   <a class='glyphicon glyphicon-download-alt' target='_blank' href='".$row44['pdf_book']."' > تحميل</a>
                      </div></center>


                <div class='caption'>
                   <div class='row' style='margin-left:45px;margin-right:10px' > <h4  style='font-family:lateef;font-weight:bold;font-size:20px;color:lightred'>
                         ".$row44['description']."</h4></div>
                  <br> </div></div> </div>  "; }


   echo"  </div>
			</div>";


      }

      else if(isset($_GET['search1'])){
        $book=$_GET['book'];
        $r="select * from books where `book_name`= '$book' || `author`='$book' order by id desc";
       $r2= mysqli_query($con,$r);
      if (mysqli_num_rows($r2) >= 1){
        echo"  <center><p style='font-size:40px;font-family:Lateef'>نتائج البحث </p></center> <br><br>

            <div class='container'>
             <div id='products' class='row list-group'> ";



    while($row44 = mysqli_fetch_assoc($r2) ){

        echo "
         <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:440px;margin-bottom:12px'>
         <center>  <img src='admin/imagess/".$row44['image']."'   height='210' width='170' /> </center>

                   <center> <div class='caption'>
                   <a class='glyphicon glyphicon-download-alt' target='_blank' href='".$row44['pdf_book']."' > تحميل</a>
                      </div></center>


                <div class='caption'>
                   <div class='row' style='margin-left:45px;margin-right:10px' > <h4  style='font-family:lateef;font-weight:bold;font-size:20px;color:lightred'>
                         ".$row44['description']."</h4></div>
                  <br> </div></div> </div>  "; }


   echo"  </div>
			</div>";


      } else{echo "<center><h2 style='margin-bottom:400px'>لا يوجد نتائج!</h2></center>";}}

       else{
      $qury4 ="select * from books order by id desc";
          $res4= mysqli_query($con,$qury4);


    echo"<div class='container'>
    <div id='products' class='row list-group'>
     <br><br><br>
            ";


    while($row4 = mysqli_fetch_assoc($res4)){


      echo"   <div class='item  col-xs-3'>
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 260px; height:440px;margin-bottom:12px'>
         <center>  <img src='admin/imagess/".$row4['image']."'   height='210' width='170'  /> </center>

                   <center> <div class='caption'>
                   <a class='glyphicon glyphicon-download-alt' target='_blank' href='".$row4['pdf_book']."' > تحميل</a>
                      </div></center>


                <div class='caption'>
                   <div class='row' style='margin-left:45px;margin-right:10px' > <h4 style='font-family:lateef;font-weight:bold;font-size:20px;color:lightred'>
                         ".$row4['description']."</h4></div>
                  <br> </div></div> </div>
 ";   }

  echo"     </div>
			</div> ";
    
   }
   
   }
   else if ($user=='Manager'){
	   header("location:http://localhost/ReadersCommunity/admin/home.php");
   }
	   
	   else {header("location:http://localhost/ReadersCommunity/Login/login.php");} ?>

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
