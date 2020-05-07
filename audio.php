<?php
session_start();

if($_SESSION['state']==true){
 
 $_SESSION['book-id']=$_REQUEST['id'];
 
 $_SESSION['state']=false;
} 

  ?>
  
  <!DOCTYPE html>
<html lang="en">
  <head>


    <title>Readers Community</title>
    <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           <link href="http://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin " rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



  </head>
 
 
 
 
  <body onload="post();" style="margin:10px">
  
  <?php
   
   $con=new mysqli("localhost","root","","readers community");
   
   
     $user=$_SESSION['User_Type'];
 
          if($user=='Admin' ){
		  
		   echo"
            <nav class='navbar navbar-inverse'>
           <div class='container-fluid'>

             <div class='navbar-header'>
               <a class='navbar-brand' href='#'></a>
             </div>


             <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
               <ul class='nav navbar-nav col-xs-8' style='font-family:Lateef;font-size:20px;font-weight:bold'>

                 <li><a href='index2.php'>PDF كتب </a></li>
                  <li><a href='audio_books.php'>كتب صوتية</a></li>
                  <li><a href='Advertisments.php'>الاعلانات</a></li>
                  


               </ul>
               
               
                
                   

             </div>
           </div>
         </nav>
         ";
          
          $req="select * from audio_books where `id`='".$_SESSION['book-id']."'";
          $res=mysqli_query($con,$req);
          while($ro=mysqli_fetch_array($res)){
           echo"
		 
              <div style='text-align:right;margin-right:10px'> <a data-toggle='modal' data-target='#delete'><span class='glyphicon glyphicon-trash' style='font-size:20px;'
                 ></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- <a data-toggle='modal' data-target='#update'><span class='glyphicon glyphicon-edit' style='font-size:20px;'
                 ></a> -->
				 </div>
                <br>
           <div class='col-xs-8'>
		  <a href='audio_books.php'> <span class='glyphicon glyphicon-arrow-left' style='font-size:30px;color:black'></span></a>
		   
		                     
            
          
			   </div>
            <div class='row'><center>".$ro['audio']."</center></div> <hr>
            <div style='border-style:solid;border-color:gray;padding:40px;font-size:20px;margin:10px;font-family:lateef;font-weight:bold;text-align:right'> ".$ro['description']."</div>


           
          
 <div id='delete' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='delete' aria-hidden='true'>
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
             <a href='deleteaudio.php?id=".$_SESSION['book-id']."'>   <button type='submit' name='delete_book' class='btn btn-primary'>نعم , حذف</button> </a>
            </div>
            
        </div>
    </div>
</div>




           ";
           
		 
         
         
        echo" <hr>
        
          <h3 style='color:darkred'>التعليقات&nbsp;(<span class='num'> </span>) </h3> <hr>
          
                     <div id='containerr'>
                    
                    </div>
                    
                    
                   <form >
                     
               
        
        <input type='hidden' value='".$_SESSION['username']."' id='username'>
        <input type='hidden' value='".$_SESSION['book-id']."' id='bookid'>
        <div class='form-group'>
  <div class='col-md-6 '>
  <label for='comment'>اضافة تعليق </label>
  <textarea class='form-control' onkeyup='checks()' rows='3'  id='comment' name='comments'></textarea>

     <div style='text-align:right'>
     <input type='submit' value=' اضافة ' onclick='post(1);' name='postBtn' id='postBtn' class='btn btn-primary'   disabled>
     </div>   </div></div>      
     </form>";
		  
		  
		  }
		  }
		  else if($user=='User'){
                    
            echo"
            <nav class='navbar navbar-inverse'>
           <div class='container-fluid'>

             <div class='navbar-header'>
               <a class='navbar-brand' href='#'></a>
             </div>


             <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
               <ul class='nav navbar-nav col-xs-8' style='font-family:Lateef;font-size:20px;font-weight:bold'>

                 <li><a href='index2.php'>PDF كتب </a></li>
                  <li><a href='audio_books.php'>كتب صوتية</a></li>
                  <li><a href='Advertisments.php'>الاعلانات</a></li>
                  


               </ul>
               
               
                
                   

             </div>
           </div>
         </nav>
         ";
          
          $req="select * from audio_books where `id`='".$_SESSION['book-id']."'";
          $res=mysqli_query($con,$req);
          while($ro=mysqli_fetch_array($res)){
           echo"
           <div class='col-xs-8'>
		  <a href='audio_books.php'> <span class='glyphicon glyphicon-arrow-left' style='font-size:30px;color:black'></span></a>
		   
           <!-- <ul class='nav navbar-nav'>

                 <li>
                 <a data-toggle='modal' data-target='#delete'><span class='glyphicon glyphicon-trash' style='font-size:20px;'
                 ></a></li>
                

               </ul> -->
			   </div>
            <div class='row'><center>".$ro['audio']."</center></div> <hr>
            <div style='border-style:solid;border-color:gray;padding:40px;font-size:20px;margin:10px;font-family:lateef;font-weight:bold;text-align:right'> ".$ro['description']."</div>


           
           

           ";
           
          }
         
         
        echo" <hr>
        
          <h3 style='color:darkred'>التعليقات&nbsp;(<span class='num'> </span>) </h3> <hr>
          
                     <div id='containerr'>
                    
                    </div>
                    
                    
                   <form >
                     
                 <!--    <b> قيّم الكتاب </b> &nbsp; <br>
       <span class='glyphicon glyphicon-star checked' onmouseover='starmark(this)' onclick='starmark(this)' id='1one' style='font-size:18px;cursor:pointer;'></span>
       <span class='glyphicon glyphicon-star checked' onmouseover='starmark(this)' onclick='starmark(this)' id='2one' style='font-size:18px;cursor:pointer;'></span>
       <span class='glyphicon glyphicon-star checked' onmouseover='starmark(this)' onclick='starmark(this)' id='3one' style='font-size:18px;cursor:pointer;'></span>
       <span class='glyphicon glyphicon-star checked' onmouseover='starmark(this)' onclick='starmark(this)' id='4one' style='font-size:18px;cursor:pointer;'></span>
       <span class='glyphicon glyphicon-star checked' onmouseover='starmark(this)' onclick='starmark(this)' id='5one' style='font-size:18px;cursor:pointer;'></span>
        <br> <br> -->
        
        <input type='hidden' value='".$_SESSION['username']."' id='username'>
        <input type='hidden' value='".$_SESSION['book-id']."' id='bookid'>
        <div class='form-group'>
  <div class='col-md-6 '>
  <label for='comment'>اضافة تعليق </label>
  <textarea class='form-control' onkeyup='checks()' rows='3'  id='comment' name='comments'></textarea>

     <div style='text-align:right'>
     <input type='submit' value=' اضافة ' onclick='post(1);' name='postBtn' id='postBtn' class='btn btn-primary'   disabled>
     </div>   </div></div>      
     </form>";

                    
                    
                    }
                    
                    
                    
                    
                    else{header("location:http://localhost/ReadersCommunity/Login/login.php");}






 
 
 ?>




      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script type="text/javascript">
 
 var idbook=<?php echo $_SESSION['book-id']; ?>;
 
window.setInterval(function(){
	num(idbook);
	},1000); 
 
 
 
 
 function num(id){
	  $.ajax({
			  method:"POST",
			  url:"comment_num.php",
			  data:{id:id},
			  success:function(data){
				  $('.num').html(data);
			 
			  }			  
		  });
 }
 
 function checks(){
  
  if(document.getElementById("comment").value != ""){ document.getElementById("postBtn").removeAttribute("disabled");}
  else{document.getElementById("postBtn").setAttribute("disabled","disabled");}
 }
 function post(type,comm_id){
  
  var xhr=new XMLHttpRequest();
  
  if(type==undefined && comm_id==undefined){ //عرض التعليقات
     type='';
     comm_id='';}
  else if(type==1){comm_id='';} //اضافة تعليق
  
  else if(type==2){ //حدف تعليق
   var a=window.confirm("هل ترغب في حذف التعليق؟");
   if(a==false){comm_id='';}
  }
  
  var comments=document.getElementById("comment").value;
  var user=document.getElementById("username").value;
  var book_id=document.getElementById("bookid").value;
  
  
  
  xhr.onreadystatechange=function(){ //لما يجلب النتيجة
   
   if(xhr.readyState==4 && xhr.status==200){
    document.getElementById("containerr").innerHTML=xhr.responseText;
    document.getElementById("comment").value="";
    
     if(type==1 || type==2){
		 post();
	// $("#containerr").animate({ scrollTop: $(document).height() }, "fast");
	}
   }
   };
  
  xhr.open("GET","server.php?req="+type+"&comm-id="+comm_id+"&username="+user+"&comment="+comments+"&idi="+book_id,"true");
  xhr.send();
  }
  
 $("form").submit(function(a){a.preventDefault();});
 
 
 


</script>




</body>



    <!-- <footer class="col-ms-9" style="background-color:white " id="contact">
                     <div class="container">
                       <br>
                       <div class="row">
                         <div class="col-md-12 text-center">
               <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</h5>
                         </div>
                       </div>
                     </div>
                   </footer> -->
</html>