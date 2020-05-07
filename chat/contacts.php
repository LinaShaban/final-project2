<?php


session_start();
$con=new mysqli("localhost","root","","readers community");


if(isset($_POST['id'])){

$u_id=$_POST['id'];

$id=$_SESSION['id'];


            
		 

			$q=" select * from chat where `idReciver`='$id' and `idSender`='$u_id' or 
			`idReciver`='$u_id' and `idSender`='$id' ";
			   
			   $res=mysqli_query($con,$q);
			

		if(!(mysqli_num_rows($res)>0)){ //ما في محادثة سابقة
		
			$n="select Full_Name,img from users where `id`='$u_id' ";
			   $na=mysqli_query($con,$n);
			   $name=mysqli_fetch_assoc($na);
			   
			echo"<ul id='ul-users'>	<li class='contact ' id='cont_users' num='".$u_id."' name='".$name['Full_Name']."' data-id='images/".$name['img']."'>
					<div class='wrap'>
						
						<img id='cont_img' src='images/".$name['img']."'  alt=''/>
						<div class='meta'>
							<p id='cont_name' class='name'>".$name['Full_Name']." </p>
							<p class='preview'> </p>
						</div>
					</div>
				</li> </ul>";
			
			
		} 
		
		 
			$qu=" select * from chat where `idReciver`='$id' or `idSender`='$id' order by id desc";
			   
			$result=mysqli_query($con,$qu);
			   
			 $a=array();
			 
			 
			 
	 while($row=mysqli_fetch_assoc($result)){
		 if($row['idReciver']!=$id){
		 array_push($a,$row['idReciver']);
		 
		 }
		 
       else{
		   array_push($a,$row['idSender']);}		 
       }     
		 
	        $arr=array_unique($a);
			
			
			
			
     echo"<ul id='ul-users'>";
	            for($i=0;$i<=count($a)-1;$i++){
					
			if( isset($arr[$i]) !=''  ){
              $number =$arr[$i];
   
					
	        	$n2="select Full_Name,img from users where `id`='$number' ";
			   $na2=mysqli_query($con,$n2);
			   $name2=mysqli_fetch_assoc($na2);
			   
			   if(mysqli_num_rows($na2)>0){
				   
				   if($arr[$i]==$u_id){
					   echo"<li class='contact ' id='cont_users' num='".$arr[$i]."' name='".$name2['Full_Name']."' data-id='images/".$name2['img']."'>
					<div class='wrap'>
						
						<img id='cont_img' src='images/".$name2['img']."'  alt=''/>
						<div class='meta'>
							<p id='cont_name' class='name'>".$name2['Full_Name']."</p>
							<p class='preview'></p>
						</div>
					</div>
				</li>
			   ";
				   }
				   
				   else{
				echo"<li class='contact ' id='cont_users' num='".$arr[$i]."' name='".$name2['Full_Name']."' data-id='images/".$name2['img']."'>
					<div class='wrap'>
						
						<img id='cont_img' src='images/".$name2['img']."'  alt=''/>
						<div class='meta'>
							<p id='cont_name' class='name'>".$name2['Full_Name']."</p>
							<p class='preview'></p>
						</div>
					</div>
				</li>
			   ";}}
				
					
				
			 }
		
          
				} 
				
			
				
			


	echo"</ul>";










}
?>