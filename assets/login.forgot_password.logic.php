<?php 
include_once ('db_config.php');

$n=10; 
function getName($n) { 
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$randomString = ''; 

	for ($i = 0; $i < $n; $i++) { 
		$index = rand(0, strlen($characters) - 1); 
		$randomString .= $characters[$index]; 
	} 

	return $randomString; 
}

?> 

<?php 
session_start();
$errors = [];

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT email FROM tbl_users WHERE email='$email'";
  $results = mysqli_query($db, $query);

  if (empty($email)) {
    echo "<script>alert('Nhập địa chỉ Email của bạn');</script>";
    array_push($errors, "Bạn phải nhập địa chỉ Email");
  }else if(mysqli_num_rows($results) <= 0) {
    echo "<script>alert('Bạn chưa đăng ký tài khoản Cinema!');</script>";
    array_push($errors, "Email này chưa đăng ký tài khoản!");
  }
  // generate a unique random token of length 100


  $x = getName($n);
  $query = "UPDATE tbl_users SET code = '$x' WHERE email='$email'";
  $results = mysqli_query($db, $query);

 
  if (count($errors) == 0) {

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Đặt lại mật khẩu";
    $msg = "Chúng tôi vừa nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn. Để đặt lại mật khẩu, vui lòng sử dụng mã xác nhận bên dưới. Nếu bạn chưa yêu cầu dịch vụ đặt lại mật khẩu, hãy bỏ qua thông báo này.";
    $msg .= 'Mã xác nhận: '.$x;
    
    $headers = "From: support@cinema.com";
    mail($to, $subject, $msg, $headers);

    header('location: login.forgot_password.reset_password.php?email=' . $email);
  }
}

?>