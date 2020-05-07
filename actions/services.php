<?php
include '../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['add_book']) {
		$target = "../admin/imagess/".basename($_FILES['image']['name']);
		 
        $name = $_POST['book_name'];
        $link = $_POST['book_link'];
		$description = $_POST['description'];
        $language = $_POST['language'];
		$author = $_POST['author'];
        $type = $_POST['book_type'];
		$image=$_FILES['image']['name'];
		$table=$_POST['table'];
		
        if ($_POST['book_id'] == "") {
              if($table=='books'){			
           $query= "insert into `books`(`book_name`,`image`,`pdf_book`,`description`,`book_type`,`language`,`author`)
			  values('$name','$image','$link','$description','$type','$language','$author')"; }
	          else if($table=='audio_books'){
		   $query="insert into `audio_books`(`book_name`,`audio`,`description`,`book_type`,`language`,`author`,`img`)
           values('$name','$link','$description','$type','$language','$author','$image')";}
				  
			  
            insert_query($query);
			
			
            $_SESSION['success_add']=1;
			move_uploaded_file($_FILES['image']['tmp_name'],$target);
        } 
		
		
		else {
			
			if($table=='books'){
            $query = "UPDATE books SET
			`book_name`='$name' , `book_type`='$type',`pdf_book`='$link',`image`='$image',`description`='$description',`language`='$language',`author`='$author'
			WHERE `id` = ".$_POST['book_id'];
			
            }
			else if($table=='audio_books'){
				 $query = "UPDATE audio_books SET 
				 `book_name`='$name',`book_type`='$type',`audio`='$link',`img`='$image',`description`='$description',`language`='$language',`author`='$author'
				 WHERE `id` = ".$_POST['book_id'];}
           
			update_query($query);
			move_uploaded_file($_FILES['image']['tmp_name'],$target);
            $_SESSION['success_edit']=1;
        }
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}
?>