<?php
    include '../includes/functions.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $table = $_POST['table'];
        $query = "DELETE FROM $table WHERE id = '$id'";
		
		
        if ($table == 'advertise') {
            $get = get_primary_image($id);
            unlink('../upload/'.$get->image);
            $attachment_id = get_attachment_id($id , '1');
            $row = get_all_attachment($attachment_id->id);
            foreach ($row as $key => $value) {
                echo $value->id;
                unlink('../upload/'.$value->attachment);
                delete_attachment($value->id);
            }
        }
        if ($table == 'all_attachment') {
            $attachment = get_all_attachment_by_id($id);
            unlink('../upload/'.$attachment->attachment);
        }
        delete_query($query);
        $_SESSION['success_delete']=1;
        header('location:'. $_SERVER['HTTP_REFERER']);
    }
?>