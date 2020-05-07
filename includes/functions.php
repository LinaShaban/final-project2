<?php
include("db_function.php");

function user_info ($id){
  global $conn;
  $query = "select * from users where id='$id'";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  return $row ;
}



function get_services() {
  global $conn;
  $array = array();
  $query = "SELECT * FROM books ORDER BY id DESC";
            
          
  $result = mysqli_query($conn , $query);
  while ($row = mysqli_fetch_object($result)) {
    $array[] = $row;
  }
  return $array;
}
function get_audio() {
  global $conn;
  $array = array();
  $query = "SELECT * FROM audio_books ORDER BY id DESC";
            
          
  $result = mysqli_query($conn , $query);
  while ($row = mysqli_fetch_object($result)) {
    $array[] = $row;
  }
  return $array;
}




function check_password($password ,$check_password ) {
  if ($password === $check_password) {
      return true;
  }
  return false;
}




  


function get_users() {
   global $conn;
  $array = array();
  $query = "select * from users   order by id DESC";
  $result=mysqli_query($conn,$query);
  while($row = mysqli_fetch_object($result)) {
        $array[] = $row;
    }
    return $array;
}



function get_file_extension($file_org_name) {
$file_name = basename($file_org_name) ;
   $ext = pathinfo($file_name, PATHINFO_EXTENSION);
   

   if($ext=='pdf'){
     
     return "pdf.png" ;
   }
     
      if($ext=='docx' || $ext=='doc'){
     
     return "word.png";
   }
      if($ext=='xlsx' ||  $ext=='xls'){
     
     return "excel.png";
   }
      if($ext =='png' ||$ext =='jpg' ||$ext == 'jpeg' ||$ext == 'gif'){
     
     return  $file_org_name;
   }
}

function get_classname($file_org_name) {
$file_name = basename($file_org_name) ;
   $ext = pathinfo($file_name, PATHINFO_EXTENSION);
   

   if($ext=='pdf'){
     
     return "red" ;
   }
     
      if($ext=='docx' || $ext=='doc'){
     
     return "blue";
   }
      if($ext=='xlsx' ||  $ext=='xls'){
     
     return "green";
   }
      if($ext =='png' ||$ext =='jpg' ||$ext == 'jpeg' ||$ext == 'gif'){
     
     return  "yellow";
   } 
}

function check_current_password($id , $password) {
  $query = "SELECT name FROM users WHERE id = $id AND password = $password";
  $result=mysqli_query($conn,$query);
  while($row = mysqli_fetch_object($result)) {
    $array[] = $row;
  }
}

function show_messages(){
   if(isset($_SESSION['exist_user'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.exist_user.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['exist_user']);

if(isset($_SESSION['password_wrong'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.password_wrong.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['password_wrong']);

if(isset($_SESSION['passwords_not_match'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.passwords_not_match.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['passwords_not_match']);

 if(isset($_SESSION['no_user'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.no_user.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['no_user']);

if(isset($_SESSION['no_activate'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.no_activate.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['no_activate']);

 if(isset($_SESSION['success_user'])){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.success_user.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['success_user']);

 if(isset($_SESSION['success_add'])){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.success_add.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['success_add']);

 if(isset($_SESSION['success_edit'])){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.success_edit.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['success_edit']);   

 if(isset($_SESSION['success_delete'])){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.success_delete.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['success_delete']);
 
  if(isset($_SESSION['yes_email_user'])){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.yes_email_user.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['yes_email_user']);
 
 if(isset($_SESSION['no_email_user'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.no_email_user.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['no_email_user']);


 if(isset($_SESSION['no_client'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>'.no_client.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['no_client']);

// unset($_SESSION['sql_appo']);

  if(isset($_SESSION['true'])){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.send_email.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>';
}
unset($_SESSION['true']);
}

function get_advertises() {
    global $conn;
    $array = array();
    $query = "SELECT advertisments.*,advertisments.id as ID, users.* FROM advertisments,users where users.id=advertisments.advertiser_id ORDER BY advertisments.id DESC";
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_object($result)) {
          $array[] = $row;
      }
    return $array;
}






?>