<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



<?php 
session_start();
$con=new mysqli("localhost","root","","readers community");

if(isset($_POST['chat'])){
$adv_id=$_POST['advertiser_id'];}




?>

<link rel="stylesheet" href="chat_style.css">

</head>
<body>
<div class="container">
<br><br>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4 style="font-family:arial">الرسائل الحديثة</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input style="font-family:arial;text-align:center" type="text" class="search-bar"  placeholder="ابحث" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib"> 
				<?php
				$sql="select users.Full_Name,chat.msg from users,chat
				where users.id = chat.idReciver and idSender = ".$_SESSION['id']." ";
				 $res=mysqli_query($con,$sql);
				while($row=mysqli_fetch_row($res)){
				
                 echo" <h5> ".$row['Full_Name']." <span class='chat_date'>Dec 25</span></h5>
                  <p>".$row['msg']."</p>
                </div>
              </div>
            </div> ";
            
				 } ?>
            
          </div>
        </div>
        
      </div>
      
      
      
      
    </div></div>
	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"
    </body>
	</html>