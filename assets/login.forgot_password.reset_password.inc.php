<?php
include_once ('db_config.php');
session_start();

if(!isset($_GET['email'])){
    header('location:login.php');
}

$email=$_GET['email'];
$code="";
$new_password1="";
$new_password2="";

if (isset($_POST['change_password'])) {
    $code = mysqli_real_escape_string($db, $_POST['code']);
    $new_password1 = mysqli_real_escape_string($db, $_POST['new_password1']);
    $new_password2 = mysqli_real_escape_string($db, $_POST['new_password2']);

    $query = "SELECT * FROM tbl_users WHERE email='$email' AND code='$code'";
    $result=mysqli_query($db, $query);
   
    if(mysqli_num_rows($result)==1){
        if($new_password1==$new_password2){
            $new_password1=md5($new_password1);
            $query="UPDATE tbl_users SET password = '$new_password1' WHERE email='$email' AND code='$code'";
            mysqli_query($db, $query);
            
            header("location: assets/login.forgot_password.reset_password.success.php");
            
        }else{
            echo "<script>alert('Mật khẩu không khớp, hãy thử lại!');</script>";
        }
    }else{
        echo "<script>alert('Mã xác nhận không chính xác!');</script>";
    }
}

?>