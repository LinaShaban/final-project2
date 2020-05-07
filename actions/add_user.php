<?php
    include '../includes/functions.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['add_user']) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $password = $_POST['password'];
			$phone=$_POST['phone'];
            $check_password = $_POST['check_password'];
            $email = $_POST['email'];
            if (check_password($password, $check_password)) {
                $pass = md5($password);
                $check_email = "SELECT * FROM users WHERE Email =$email";
                if (!check_existance($check_email)) {
                    $check_user = "SELECT * FROM users WHERE Address = $address";
                    if (!check_existance($check_user)) {
                        $query = "INSERT INTO users(`Full_Name` , `Address` , `Password` , `Email`,`user_type`,`Phone#`)
                        VALUES('$name' , '$address' , '$pass' , '$email','Admin','$phone')";
                        insert_query($query);
                        $_SESSION['success_add']=1;
                        header('location:'.$_SERVER['HTTP_REFERER']);
                    } else {
                        $_SESSION['المستخدم موجود'] = 1;
                    }
                } else {
                    $_SESSION['المستخدم موجود'] = 1;
                } 
            } else {
                $_SESSION['كلمة السر غير متطابقة'] = 1;
            }
        }
    }
    header('location:'.$_SERVER['HTTP_REFERER']);
    ?>