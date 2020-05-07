<?php 

$where ="local";
if ($where == "local") {
    define("PROJECT_NAME","readers community");
    define("PROJECT_ROOT", $_SERVER['DOCUMENT_ROOT'] . "/readers community/");
    define("server","localhost");
    define("username","root");
    define("password", "");
    define("db_name", "readers community");
} 
define("IMG",Root."upload/");


define("general_error","حدث خطأ لأسباب غير معروفة ، يرجى المحاولة مرة أخرى بعد 5 دقائق.");
define("no_user","اسم المستخدم أو كلمة المرور غير موجودة في النظام");
define("exist_user","The Username or Email is used in the system by another user");
define("no_email_user","البريد الالكتروني غير مستخدم في النظام" );
define("yes_email_user","تم إرسال كلمة السر الجديدة الى البريد الالكتروني الخاص بك" );
define("send_email", "تم ارسال الرسالة  الالكترونية");
define("success_user","تم إضافة المستخدم بنجاح");
define("success_add","تم الاضافة بنجاح");
define("success_edit","تم التعديل بنجاح");
define("success_delete","تم الحذف بنجاح");
define("passwords_not_match","كلمة السر غير متطابقة");
define("password_wrong","كلمة السر الحالية غير صحيحة");
define("no_activate","المستخدم غير مفعل");
?>