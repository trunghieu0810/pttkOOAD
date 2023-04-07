<?php
session_start();
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
		
		<title>InstaMovies</title>

        <style>
            .about_us p {
                text-align: justify;
                margin: 0 0 10px;
            }
            .about_us .banner img {
              width:100%
            }
        </style>

	</head>

	
  <body>

		<!--Navbar Code - Start-->
		<?php include('header.php'); ?>
    <!--Navbar Code - End-->

	
    <!--About Us Body - Start-->
    <div class="about_us">
			
        <!--Banner Code - Start-->
        <div class="banner">
            <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">About Us</h2>
            
            <div><p style="font-size: 18px;"><strong>Tổng quan dự án</strong></p>
                 <p>InstaMovies là một trang web đặt vé xem phim trực tuyến bao gồm các mô phỏng thanh toán đặt chỗ. Trang web này do nhóm GenetriX thiết kế như một dự án cho mô-đun khóa học CS2062 - Phát triển phần mềm hướng đối tượng trong học kỳ thứ hai của Khoa Khoa học và Kỹ thuật Máy tính, Đại học Moratuwa.</p>
                 <p>Dự án mất khoảng thời gian từ giữa tháng 3 năm 2019 đến cuối tháng 5 năm 2019 để hoàn thiện và trở thành một trang web hoạt động.</p>
                 <p>Trang web này đang trong quá trình mô phỏng. Điều này không thực sự chấp nhận thanh toán, cung cấp tiền hoàn lại hoặc đặt vé thực tế tại rạp.</p>
                 <p>Thiết kế và tính năng cơ bản của trang web này <a href="http://www.instamovies.cf">www.instamovies.cf</a> được lấy cảm hứng từ thiết kế và tính năng của trang web chính thức của EAP Films và Rạp chiếu phim tức là <a href="http://www.eapmovies.com">www.eapmovies.com</a>.</p>
                 <p>&nbsp;</p>
                 <p style="font-size: 18px;"><strong>Mục tiêu</strong></p>
                 <p>Trang web này đã được xây dựng để dễ dàng truy cập đặt vé tại tất cả các rạp chiếu phim trên khắp Sri Lanka và để cho phép người dùng nhận tiền hoàn lại bằng cách hủy chỗ đã đặt của họ theo các điều khoản và điều kiện nhất định.</p>
                 <p>&nbsp;</p>
                 <p style="font-size: 18px;"><strong>Tính năng chính</strong></p>
                 <p class="double_indent">Chủ đề tuyệt đẹp và xử lý dễ dàng</p>
                 <p class="indent">Có thể tạo và xóa tài khoản người dùng khi cần.</p>
                 <p class="double_indent">Có thể đặt vé xem phim tại rạp.</p>
                 <p class="indent">Có thể thay đổi chỗ ngồi đã đặt (khi chỉ được đặt bằng tài khoản người dùng).</p>
                 <p class="double_indent">Vé đã đặt có thể bị hủy trước giờ chiếu hai tiếng.</p>
                 <p class="indent">Mọi chủ tài khoản InstaMovies đều có thể mua vé đã hủy, ngoại trừ người dùng đã hủy vé.</p>
                 <p class="double_indent">Mỗi lượt đặt vé đều bao gồm phí internet bổ sung ngoài việc đặt vé miễn phí.</p>
                 <p class="indent">Có sẵn vé miễn phí cho một số bộ phim tùy theo ưu đãi có sẵn.</p>
                 <p class="double_indent">Mã phiếu giảm giá hợp lệ có thể được áp dụng để đặt vé cho một số bộ phim có ưu đãi.</p>
                 <p class="indent">Bạn có thể xem các bộ phim, rạp chiếu phim và ưu đãi hiện có trên các trang có liên quan của InstaMovies.</p>
                 <p class="double_indent">Bạn có thể xem giá vé và lịch chiếu của mỗi bộ phim tại các rạp khác nhau trong trang Giá và Giờ chiếu của InstaMovies.</p>
                 <p class="indent">Người dùng có thể xếp hạng các bộ phim và rạp hiện có.</p>
                 <p class="indent">Có thể khôi phục tài khoản người dùng khi quên mật khẩu.</p>
                 <p class="double_indent">Mật khẩu tài khoản người dùng có thể được thay đổi khi cần thiết.</p>
                 <p class="indent">Bạn có thể nhận được tiền hoàn lại bằng cách lấy xác nhận từ Quản trị viên InstaMovies.</p>
                 <p class="double_indent">Người dùng có thể liên hệ trực tuyến với quản trị viên thông qua phần liên hệ với chúng tôi.</p>
                 <p class="indent">Quảng cáo có thể được hiển thị trong trang Quảng cáo InstaMovies bằng cách liên hệ với quản trị viên.</p>
                 <p>&nbsp;</p>
                 <p style="font-size: 18px;"><strong>Thành viên nhóm GenetriX</strong></p>
                 <p class="double_indent">~ Sivaneswaran Thuvarahan</p>
                 <p class="indent">~ Santhirakumar Thenusan</p>
                 <p class="double_indent">~ Dilani Rajendran</p>
                 <p class="indent">~ Thukaraka Pakeerathan</p>
                 <p>&nbsp;</p>
             </div>
        </div>
    </div>
    <!--About Us Body - End-->
        
        
        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		

		<script>
			$(".site-footer .bottom-footer .footer-item-5").addClass("active");
		</script>

  </body>
</html>