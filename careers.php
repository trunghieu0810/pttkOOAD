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
            .career p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .career .banner img {
              width:100%
            }
        </style>

	</head>

	
  <body>

	<!--Navbar Code - Start-->
	<?php include('header.php'); ?>
	<!--Navbar Code - End-->

	
    <!--Career Body - Start-->
    <div class="career">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">Careers</h2>
            
            <div>
            <p>Trên phần này của trang web của chúng tôi, bạn có thể xem các vị trí tuyển dụng hiện tại tại InstaMovies.</p>
               <p>Với tầm nhìn trở thành chuỗi rạp chiếu phim tốt nhất ở châu Á, chúng tôi hoan nghênh các chương trình &amp; những cá nhân năng động muốn gia nhập đội ngũ của chúng tôi. Chúng tôi có một nền văn hóa &amp; một hệ thống giá trị cốt lõi mạnh mẽ, nơi bạn sẽ được đối xử đồng nhất &amp; tương ứng. Nếu bạn muốn thực hiện ước mơ của mình với chúng tôi, chúng tôi nồng nhiệt chào đón bạn tham gia cùng nhóm của chúng tôi.</p>
               <p>&nbsp;</p>
               <p>Hiện tại không có vị trí nào còn trống.</p>
              <br/>
            </div>
        </div>
    </div>
    <!--Career Body - End-->
        
        
        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

   
	 	<script>
			$(".site-footer .bottom-footer .footer-item-9").addClass("active");
		</script>

  </body>
</html>