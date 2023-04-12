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

    <title>Cinema</title>

    <style>
    .terms_and_conditions p {
        text-align: justify;
        margin: 0 0 10px;
    }

    .terms_and_conditions .banner img {
        width: 100%
    }
    </style>

</head>


<body>

    <!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->


    <!--Terms and Conditions Body - Start-->
    <div class="terms_and_conditions">

        <!--Banner Code - Start-->
        <div class="banner">
            <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2
                style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">
                Các điều khoản và điều kiện</h2>

            <div>
                <p style="font-size: 20px;">Trang điều khoản và điều kiện </p>
                </br>
                </br>
                </br>
                </br>

            </div>
        </div>
    </div>
    <!--Terms and Conditions Body - End-->




    <!--Footer Code - Start-->
    <?php include('footer.php') ?>
    <!--Footer Code - End-->

    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script>
    $(".site-footer .bottom-footer .footer-item-3").addClass("active");
    </script>

</body>

</html>