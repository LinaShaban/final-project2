

<!DOCTYPE html>
<html lang="en">
  <head>

<style type="text/css">
  .class1{color:black}
  .class2{color:green}
  #tooltip{position:relative;z-index:20}
  #tooltip span{display:none;}
  #tooltip:hover{z-index:21}
  #tooltip:hover span{
    display:block;
    width:20px;
    padding:0px;
    color:gray;
    font-size:11px
  }
</style>


<!--<script type="text/javascript">
 var rating="";
 function starmark(item){
  var count=item.id[0];
  rating=count;
  var subid=item.id.substring(1);
  for(var i=0;i<5;i++){
   if(i<count){ document.getElementById((i+1)+subid).style.color="orange";}
    else{ document.getElementById((i+1)+subid).style.color="black";}
   
  }
 } 
  function toggle(x){
    if(x.className="class1"){
      x.className="class2"}
    else{x.className="class1"}
  }
</script> -->

    <title>Readers Community</title>
    <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           <link href="http://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin " rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



    </head>
<style>
 
 .checked{color:black}
</style>

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
      <a class='navbar-brand' href='#'></a>
    </div>


    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
	 <form class='navbar-form navbar-left' action='audio_books.php' method='get'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='ابحث بواسطة اسم الكاتب او اسم الكتاب' name='book-name' size=40px>
        </div>
        <button type='submit' class='btn btn-danger' name='search4'>بحث</button>
      </form>
      

   <br><br><br>
      <ul class='nav navbar-nav'>

        <li><a href='index2.php'>PDFكتب ال</a></li>
        <li class='active'><a href='audio_books.php'>كتب صوتية <span class='sr-only'>(current)</span></a></li>
        <li><a href='Advertisments.php'>الاعلانات</a></li>
      </ul>
      

         <form action='audio_books.php' method='get'>
      <ul class='nav navbar-nav navbar-right'>
         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>لغة الكتاب<span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray;' >
             ";

             $qury2 ="select * from  audio_books group by `language`";
          $ress2= mysqli_query($con,$qury2);

             while($roww2 = mysqli_fetch_array($ress2)){

              echo"<li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?languages=".$roww2[6]."'>".$roww2[6]."</a></li>";
             }
           echo"
          </ul>
        </li>

         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>نوع الكتاب <span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray' >

            ";
             $qury1 ="select * from  audio_books group by `book_type`";
          $resss= mysqli_query($con,$qury1);

             while($roww1 = mysqli_fetch_array($resss)){

            echo"  <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?item=".$roww1[5]."'>".$roww1[5]."</a></li>";

             }



         echo"
          </ul>
        </li>
         </form>


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
            <li style='font-family:Lateef;font-size:16px;font-weight:bolder'> <a href='audio_books.php?type=logout'><b> تسجيل الخروج</b></a> </li> ";
                  if(isset($_GET['type'])=='logout'){
                  session_unset();
                  session_destroy();
                  echo"<script>window.location='index.php'; </script>";}
      echo"    </ul>
        </li>
      </ul>
    </div>
  </div>
</nav><br>


 <br>


       ";

        if(isset($_GET['languages'])){
           $lang=$_GET['languages'];
           $qry ="select * from audio_books where `language`='$lang' order by id desc";
          $output= mysqli_query($con,$qry);

        echo"
         <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>
         <div class='container'>

          <div id='products' class='row list-group'>";


           while($row444 = mysqli_fetch_assoc($output)){

          
echo"
           
            <div class='item  col-xs-3'>
            
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 250px; height:400px;text-align:center;margin-bottom:12px'>
           
                <div> <img src='admin/imagess/".$row444['img']."' width='220' height='160'> </div>

            <div class='col-xs-12'style='text-align:right'>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>اسم الكتاب : </b> <b>".$row444['book_name']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>مؤلف الكتاب : </b><b>".$row444['author']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>تصنيف الكتاب :</b> <b>".$row444['book_type']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>لغة الكتاب : </b> <b>".$row444['language']."</b></label><br>

           </div>
           <hr>
           
           <div class='row'>  <div class='col-xs-12'> ";
           
                 $_SESSION['state']=true;
                 
                       echo"    <a href='audio.php?id=".$row444['id']."'>
                           <input type='submit' name='book' class='btn btn-danger' value='الكتاب الصوتي' style='font-size:11px;font-weight:bold;padding-right:2px' >
                        </a> </div> </div> 

                        

       </div>

          </div>  ";


 



         }

          echo"  </div>
                    </div>";






       }

      else if(isset($_GET['item'])){
           $books=$_GET['item'];
           $qry ="select * from audio_books where `book_type`='$books' order by id desc";
          $output= mysqli_query($con,$qry);

        echo"
         <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>
         <div class='container'>

          <div id='products' class='row list-group'>";


           while($row444 = mysqli_fetch_assoc($output)){

          echo"
           
            <div class='item  col-xs-3'>
            
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 250px; height:400px;text-align:center;margin-bottom:12px'>
           
                <div> <img src='admin/imagess/".$row444['img']."' width='220' height='160'> </div>

            <div class='col-xs-12'style='text-align:right'>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>اسم الكتاب : </b> <b>".$row444['book_name']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>مؤلف الكتاب : </b><b>".$row444['author']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>تصنيف الكتاب :</b> <b>".$row444['book_type']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>لغة الكتاب : </b> <b>".$row444['language']."</b></label><br>

           </div>
           <hr>
           
           <div class='row'>  <div class='col-xs-12'> ";
           
                 $_SESSION['state']=true;
                 
                       echo"    <a href='audio.php?id=".$row444['id']."'>
                           <input type='submit' name='book' class='btn btn-danger' value='الكتاب الصوتي' style='font-size:11px;font-weight:bold;padding-right:2px' >
                        </a> </div> </div> 

                        

       </div>

          </div>  ";


 




         }

          echo"  </div>
                    </div>";






       }

        else if (isset($_GET['search4'])){

          $bookS=$_GET['book-name'];
           $qury2222 ="select * from  audio_books where `book_name`='$bookS' || `author`='$bookS' ";



          $res555= mysqli_query($con,$qury2222);
         if (mysqli_num_rows($res555) >= 1){
        echo"  <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>

         <div class='container'>

          <div id='products' class='row list-group'>";


           while($row = mysqli_fetch_assoc($res555)){
echo"
           
            <div class='item  col-xs-3'>
            
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 250px; height:400px;text-align:center;margin-bottom:12px'>
           
                <div> <img src='admin/imagess/".$row['img']."' width='220' height='160'> </div>

            <div class='col-xs-12'style='text-align:right'>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>اسم الكتاب : </b> <b>".$row['book_name']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>مؤلف الكتاب : </b><b>".$row['author']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>تصنيف الكتاب :</b> <b>".$row['book_type']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>لغة الكتاب : </b> <b>".$row['language']."</b></label><br>

           </div>
           <hr>
           
           <div class='row'>  <div class='col-xs-12'> ";
           
                 $_SESSION['state']=true;
                 
                       echo"    <a href='audio.php?id=".$row['id']."'>
                           <input type='submit' name='book' class='btn btn-danger' value='الكتاب الصوتي' style='font-size:11px;font-weight:bold;padding-right:2px' >
                        </a> </div> </div> 

                        

       </div>

          </div>  ";


 

 }

             echo"</div>
                    </div>";



         } else{echo"<center><h2 style='margin-bottom:400px'>!لا يوجد نتائج</h2></center> ";}
         }

        else{
          $qury ="select * from  audio_books order by id desc";

          $res4= mysqli_query($con,$qury);

          echo"
         <div class='container'>
    <br><br>
          <div id='products' class='row list-group'>";


           while($row444 = mysqli_fetch_assoc($res4)){

          echo"
           
            <div class='item  col-xs-3'>
            
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 250px; height:400px;text-align:center;margin-bottom:12px'>
           
                <div> <img src='admin/imagess/".$row444['img']."' width='220' height='160'> </div>

            <div class='col-xs-12'style='text-align:right'>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>اسم الكتاب : </b> <b>".$row444['book_name']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>مؤلف الكتاب : </b><b>".$row444['author']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>تصنيف الكتاب :</b> <b>".$row444['book_type']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>لغة الكتاب : </b> <b>".$row444['language']."</b></label><br>

           </div>
           <hr>
           
           <div class='row'>  <div class='col-xs-12'> ";
           
                 $_SESSION['state']=true;
                 
                       echo"    <a href='audio.php?id=".$row444['id']."'>
                           <input type='submit' name='book' class='btn btn-danger' value='الكتاب الصوتي' style='font-size:11px;font-weight:bold;padding-right:2px' >
                        </a> </div> </div> 

                        

       </div>

          </div>  ";


 


         }

          echo"  </div>
                    </div>";


        }





     }
     
     
     
     
    
    else if ($user=='Admin'){
      
            echo"
       <nav class='navbar navbar-inverse' style='font-family:Lateef;font-size:20px;font-weight:bolder'>
         <div class='container-fluid'>

    <div class='navbar-header'>
      <a class='navbar-brand' href='#'></a>
    </div>


    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
	
	   <form class='navbar-form navbar-left' action='audio_books.php' method='get'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='ابحث بواسطة اسم الكاتب او اسم الكتاب' name='book-name' size=40px>
        </div>
        <button type='submit' class='btn btn-danger' name='search4'>بحث</button>
      </form>
      

   <br><br><br>
      <ul class='nav navbar-nav'>

        <li><a href='index2.php'>كتب PDF </a></li>


        <li class='active'><a href='audio_books.php'>كتب صوتية <span class='sr-only'>(current)</span></a></li>
        <li><a href='Advertisments.php'>الاعلانات</a></li>
        
      </ul>
     

         <form action='audio-books.php' method='get' >
      <ul class='nav navbar-nav navbar-right'>
         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>لغة الكتاب<span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray;' >
             ";

             $qury2 ="select * from  audio_books group by `language`";
          $ress2= mysqli_query($con,$qury2);

             while($roww2 = mysqli_fetch_array($ress2)){

              echo"<li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?languages=".$roww2[6]."'>".$roww2[6]."</a></li>";
             }
           echo"
          </ul>
        </li>

         <li class='dropdown' >
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>تصنيف الكتاب <span class='caret'></span></a>
          <ul class='dropdown-menu' style='background-color: lightgray' >

            ";
             $qury1 ="select * from  audio_books group by `book_type`";
          $resss= mysqli_query($con,$qury1);

             while($roww1 = mysqli_fetch_array($resss)){

            echo"  <li style='font-family:Lateef;font-size:16px;font-weight:bolder'><a href='?item=".$roww1[5]."'>".$roww1[5]."</a></li>";

             }



         echo"
          </ul>
        </li>
         </form>


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
            <li style='font-family:Lateef;font-size:16px;font-weight:bolder'> <a href='audio_books.php?type=logout'><b> تسجيل الخروج </b></a> </li> ";
                  if(isset($_GET['type'])=='logout'){
                  session_unset();
                  session_destroy();
                  echo"<script>window.location='index.php'; </script>";}
      echo"    </ul>
        </li>
      </ul>
    </div>
  </div>
</nav><br>


 <br>


       ";

        if(isset($_GET['languages'])){
           $lang=$_GET['languages'];
           $qry ="select * from audio_books where `language`='$lang' order by id desc";
          $output= mysqli_query($con,$qry);

        echo"
         <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>
         <div class='container'>

          <div id='products' class='row list-group'>";


           while($row444 = mysqli_fetch_assoc($output)){

          echo"
           
            <div class='item  col-xs-3'>
            
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 250px; height:400px;text-align:center;margin-bottom:12px'>
           
                <div> <img src='admin/imagess/".$row444['img']."' width='220' height='160'> </div>

            <div class='col-xs-12'style='text-align:right'>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>اسم الكتاب : </b> <b>".$row444['book_name']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>مؤلف الكتاب : </b><b>".$row444['author']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>تصنيف الكتاب :</b> <b>".$row444['book_type']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>لغة الكتاب : </b> <b>".$row444['language']."</b></label><br>

           </div>
           <hr>
           
           <div class='row'>  <div class='col-xs-12'> ";
           
                 $_SESSION['state']=true;
                 
                       echo"    <a href='audio.php?id=".$row444['id']."'>
                           <input type='submit' name='book' class='btn btn-danger' value='الكتاب الصوتي' style='font-size:11px;font-weight:bold;padding-right:2px' >
                        </a> </div> </div> 

                        

       </div>

          </div>  ";


 




         }

          echo"  </div>
                    </div>";






       }

      else if(isset($_GET['item'])){
           $books=$_GET['item'];
           $qry ="select * from audio_books where `book_type`='$books' order by id desc";
          $output= mysqli_query($con,$qry);

        echo"
         <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>
         <div class='container'>

          <div id='products' class='row list-group'>";


           while($row444 = mysqli_fetch_assoc($output)){

           echo"
           
            <div class='item  col-xs-3'>
            
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 250px; height:400px;text-align:center;margin-bottom:12px'>
           
                <div> <img src='admin/imagess/".$row444['img']."' width='220' height='160'> </div>

            <div class='col-xs-12'style='text-align:right'>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>اسم الكتاب : </b> <b>".$row444['book_name']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>مؤلف الكتاب : </b><b>".$row444['author']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>تصنيف الكتاب :</b> <b>".$row444['book_type']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>لغة الكتاب : </b> <b>".$row444['language']."</b></label><br>

           </div>
           <hr>
           
           <div class='row'>  <div class='col-xs-12'> ";
           
                 $_SESSION['state']=true;
                 
                       echo"    <a href='audio.php?id=".$row444['id']."'>
                           <input type='submit' name='book' class='btn btn-danger' value='الكتاب الصوتي' style='font-size:11px;font-weight:bold;padding-right:2px' >
                        </a> </div> </div> 

                        

       </div>

          </div>  ";


 



         }

          echo"  </div>
                    </div>";






       }

        else if (isset($_GET['search4'])){

          $bookS=$_GET['book-name'];
           $qury2222 ="select * from  audio_books where `book_name`='$bookS' || `author`='$bookS' ";



          $res555= mysqli_query($con,$qury2222);
         if (mysqli_num_rows($res555) >= 1){
        echo"  <center><p style='font-size:40px;font-family:sanserif'>نتائج البحث</p></center> <br><br>

         <div class='container'>

          <div id='products' class='row list-group'>";


           while($row = mysqli_fetch_assoc($res555)){

          echo"
           
            <div class='item  col-xs-3'>
            
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 250px; height:400px;text-align:center;margin-bottom:12px'>
           
                <div> <img src='admin/imagess/".$row['img']."' width='220' height='160'> </div>

            <div class='col-xs-12'style='text-align:right'>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>اسم الكتاب : </b> <b>".$row['book_name']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>مؤلف الكتاب : </b><b>".$row['author']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>تصنيف الكتاب :</b> <b>".$row['book_type']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>لغة الكتاب : </b> <b>".$row['language']."</b></label><br>

           </div>
           <hr>
           
           <div class='row'>  <div class='col-xs-12'> ";
           
                 $_SESSION['state']=true;
                 
                       echo"    <a href='audio.php?id=".$row['id']."'>
                           <input type='submit' name='book' class='btn btn-danger' value='الكتاب الصوتي' style='font-size:11px;font-weight:bold;padding-right:2px' >
                        </a> </div> </div> 

                        

       </div>

          </div>  ";


  }

             echo"</div>
                    </div>";



         } else{echo"<center><h2 style='margin-bottom:400px'>!لا يوجد نتائج</h2></center> ";}
         }

        else{
          $qury ="select * from  audio_books order by id desc";

          $res4= mysqli_query($con,$qury);

          echo"
         <div class='container'>
           <br><br>
          <div id='products' class='row list-group'>";


           while($row444 = mysqli_fetch_assoc($res4)){

           echo"
           
            <div class='item  col-xs-3'>
            
            <div style='border-style:solid;border-color:gray;border-width:2px ; padding:8px; width: 250px; height:400px;text-align:center;margin-bottom:12px'>
           
                <div> <img src='admin/imagess/".$row444['img']."' width='220' height='160'> </div>

            <div class='col-xs-12'style='text-align:right'>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>اسم الكتاب : </b> <b>".$row444['book_name']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>مؤلف الكتاب : </b><b>".$row444['author']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>تصنيف الكتاب :</b> <b>".$row444['book_type']."</b></label><br>
            <label style='font-family:lateef;font-weight:bold;font-size:16px'><b>لغة الكتاب : </b> <b>".$row444['language']."</b></label><br>

           </div>
           <hr>
           
           <div class='row'>  <div class='col-xs-12'> ";
           
                 $_SESSION['state']=true;
                 
                       echo"    <a href='audio.php?id=".$row444['id']."'>
                           <input type='submit' name='book' class='btn btn-danger' value='الكتاب الصوتي' style='font-size:11px;font-weight:bold;padding-right:2px' >
                        </a> </div> </div> 

                        

       </div>

          </div>  ";


 

         }

          echo"  </div>
                    </div>";






        }

      
      
      
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

 <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script>جميع الحقوق محفوظة</h5>

          </div>
        </div>
      </div>
    </footer>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>


</html>
