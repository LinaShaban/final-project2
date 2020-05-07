<?php
include '../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['add_book']) {
		$target = "..ReadersCommunity/images/".basename($_FILES['image']['name']);
		
        $name = $_POST['book_name2'];
        $link = $_POST['book_link2'];
		$description = $_POST['description2'];
        $language = $_POST['language2'];
		$author = $_POST['author2'];
        $type = $_POST['book_type2'];
		$image=$_FILES['image']['name'];
		
        if ($_POST['book_id'] == "") { 
           $query="insert into `audio_books`(`book_name`,`audio`,`description`,`book_type`,`language`,`author`,`img`)
          values('$name','$link','$description','$type','$language','$author','image')";
	   
            insert_query($query);
			move_uploaded_file($_FILES['image']['tmp_name'],$target);
			
            $_SESSION['success_add']=1;
			
        } 
		
		
		else {
            $query = "UPDATE audio_books SET `name`='$name' , `type`='$type' WHERE `id` = ".$_POST['service_id'];
            update_query($query);
            $_SESSION['success_edit']=1;
        }
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}
?>