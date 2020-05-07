<?php
include "functions.php";

$table = $_REQUEST['type'];
switch ($table){
case "advertisments":	
$sql = "Select * From advertisments where id='".$_POST['id']."'";
break;

case "audio_books":	
$sql = "Select * From audio_books where id='".$_POST['id']."'";
break;

case "books":
$sql = "Select * From books where id='".$_POST['id']."'";
break;

case "users":
$sql = "Select * From users where id='".$_POST['id']."'";
break;

}
$result_sql = select_query($sql) ;
$row = mysqli_fetch_assoc($result_sql);

echo json_encode($row);

?>