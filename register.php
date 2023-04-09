<?php include 'assets/register.inc.php';

if(isset($_SESSION['userID'])){
  header('location:index.php');
}else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		
		<!--Font Awesome CSS-->
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		
		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>Cinema</title>

    <style>
        .register .banner img {
          width:100%
        }
        .signup-page{
          max-width:500px;
          display:block;
          margin:auto;
        }
    </style>

	</head>


  <body>

    <!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->

    <div class="register" style="padding-bottom:40px">
    
      <!--Banner Code - Start-->
      <div class="banner">
        <img src="images/banner.jpg?v=<?php echo time(); ?>">
      </div>
      <!--Banner Code - End-->
      
      <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:10px; padding-top:15px; text-align:center;">Đăng ký</h2>
        <hr/> 
            
          <form class="signup-page" method="POST" onSubmit = "return checkPassword(this)">

            <div class="form-group row">
                <label class="col-sm-4" style="">Họ Tên Đệm: <span style="color:red">*</span> </label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="first_name" id="first_name" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Tên: <span style="color:red">*</span> </label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="last_name" id="last_name" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Số điện thoại:</label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="mobile" id="mobile" pattern="[0-9]{10}" title="Chỉ nhập 10 số">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4" style="">Email: <span style="color:red">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.XXX" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Tên người dùng: <span style="color:red">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="username" id="username" pattern="[A-Za-z0-9]{3,}" title="Nhiều hơn 3 ký tự" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Mật khẩu: <span style="color:red">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Xác nhận mật khẩu: <span style="color:red">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" type="password" name="repassword" id="repassword" required>
                </div>
            </div>

            <hr/>

            <div style="margin-bottom:15px; text-align:center">
                <input type="checkbox" style="margin-right:10px" required>Tôi đồng ý với <a class="terms" href="terms_and_conditions.php" style="text-decoration:none;">Điều khoản sử dụng</a>
            </div>

            <div style="text-align:center">
                <button class="btn btn-danger btn-lg" type="submit" name="register" style="padding:7px 20px">Gửi</button>
            </div>

            <div style="margin:30px 0 0 0;">
              <a style="text-decoration:none;color:red" href="login.php">Đăng nhập</a>
            </div>

          </form>
        </div>
      </div>
    </div>


    <!--Footer Code - Start-->
    <?php include('footer.php') ?>
    <!--Footer Code - End-->


    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>


    <script> 
    // Function to check Whether both passwords 
    // is same or not. 
    function checkPassword(form) { 
        password1 = form.password.value; 
        password2 = form.repassword.value; 

        if (password1 != password2) { 
            alert ("Mật khẩu không khớp. Vui lòng nhập đúng mật khẩu!");
            return false; 
        }
        // If same return True. 
        else{
            return true; 
        } 
    }
    </script>

    <script>
			$(".site-footer .bottom-footer .footer-item-7").addClass("active");
    </script>
    
  </body>
</html>

<?php } ?>