 
    <?php
session_start();
 $con=new mysqli("localhost","root","","readers community"); 
        
      
        $bookid=$_REQUEST['idi'];
        $type=$_REQUEST['req']; 
       $com_id=$_REQUEST['comm-id'];
	   
	   
        if($type==1){
     
      
     $comment=$_REQUEST['comment'];
      $user_id =$_SESSION['id'];
 
       $insert="insert into comments(`comment`,`book_id`,`commenter_id`)
       VALUES('$comment','$bookid','$user_id')";
        mysqli_query($con,$insert);
      }
     
       
        
        
        
        else if ($type==''){  // page load
        $select="select comments.*,users.* from comments,users where users.id=comments.commenter_id and `book_id`='$bookid' order by comments.ID ";
        $run=mysqli_query($con,$select);
        
        while($rows=mysqli_fetch_array($run)){ 
		$original_date = $rows['time'];
 
      // Creating timestamp from given date
         $timestamp = strtotime($original_date);
 
      // Creating new date format from that timestamp
        $new_date = date("d-M-Y h:m A", $timestamp);
		
		
		if ($_SESSION['User_Type']=='Admin'){ ?>
	     
          <div class="panel panel-default col-xs-7 " style="padding:0">
                   <div class="panel-heading">
                    <div class="row">
                     
                     
                     
                  <button name="delete"  onclick="post(2,<?php echo $rows['ID']; ?>)"
                     style="border:none;text-align:right" class="glyphicon glyphicon-remove col-md-offset-11 col-md-1 "></button>
                    
                    </div>
                    <div class="row">
                   <div class="col-md-9">
                    <img src="images/<?php echo $rows['img'] ?>" width=40px height=40px> 
                    <b style='padding-left:10px'>
                   <b><?php echo $rows['Full_Name'] ?> </b></div>
                   
                   <div class="col-md-3"><small> <?php echo $new_date ?></small> </div>
				   </div>
                   
                    </div>
                   <div class="panel-body"><?php echo $rows['comment'] ?></div>
                    </div> 
					
 
 
     <?php  } 
         else if($rows['commenter_id']==$_SESSION['id']) {?>
		
                   <div class="panel panel-default col-xs-7 " style="padding:0">
                   <div class="panel-heading">
                    <div class="row">
                     
                     
                     
                  <button name="delete"  onclick="post(2,<?php echo $rows['ID']; ?>)"
                     style="border:none;text-align:right" class="glyphicon glyphicon-remove col-md-offset-11 col-md-1 "></button>
                    
                    </div>
                    <div class="row">
                   <div class="col-md-9">
                    <img src="images/<?php echo $rows['img'] ?>" width=40px height=40px> 
                    <b style='padding-left:10px'>
                   <b><?php echo $rows['Full_Name'] ?> </b></div>
                   
                   <div class="col-md-3"><small> <?php echo $new_date ?></small> </div>
				   </div>
                   
                    </div>
                   <div class="panel-body"><?php echo $rows['comment'] ?></div>
                    </div> 
					
                  
       
        <?php }
        else { ?>
          <div class="panel panel-default col-xs-7 " style="padding:0">
                   <div class="panel-heading"><div class="row">
                   <div class="col-md-9">
                    <img src="images/<?php echo $rows['img'] ?>" width=40px height=40px> 
                    <b style='padding-left:10px'>
                   <b><?php echo $rows['Full_Name'] ?> </b></div>
                   
                   <div class="col-md-3"><small> <?php echo $new_date ?></small> </div>
                   </div> </div>
                   <div class="panel-body"><?php echo $rows['comment'] ?></div>
                    </div>
          <?php }}  }
          
          
          
          else if($type==2){
         $del="delete from comments where `ID`='$com_id'";
         mysqli_query($con,$del);
        }?>
          
          
        
          
          
          
        
          
                                      
                                      
 
     
   