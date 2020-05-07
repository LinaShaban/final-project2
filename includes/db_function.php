<?php
include("connect.php");

function select_query($sql){
	  global $conn ;
	  $result = mysqli_query($conn,$sql);
	  if($result)
		return $result ;
	  else
		error();
	return 0 ;
}

function check_existance($sql){
    global $conn ;
    $result = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);
   	if ( $num_rows == 0 ) {
  	  return false ;
   	}
    else{
      return true ;
    }
}


function check_verified($sql){
	global $conn ;
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
  return $row['verified'] ;
}

function get_record($sql){
	global $conn;
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
  return $row ;
}






function get_count($sql){
	global $conn ;
	$result = mysqli_query($conn,$sql);
	if($result)
	return $result->num_rows ;
	else
	return 0 ;
}

function insert_query($sql){
	  global $conn ;
	  $result = mysqli_query($conn,$sql);
		if($result){
		return mysqli_insert_id($conn);
	  }else{
		error();
	 return 0 ;
	}
}

function update_query($sql){
	  global $conn ;
	  $result = mysqli_query($conn,$sql);
	  if($result)
	  return $result ;
	   else
			error();
	return 0 ;
}

function delete_query($sql){
	  global $conn ;
	  $result = mysqli_query($conn,$sql);
	  if($result){
		  return $result ;
	  }
	   else{
		error();
	return 0 ;
}
}

function error(){
	  global $conn ;
	  echo 'Error happened while contacting database..'  ;
	  if(DEBUG)
		 echo 'error code is: ' . $conn->error	   ;
	  die();
}



?>
