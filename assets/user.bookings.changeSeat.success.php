<?php
session_start();
include_once ('../db_config.php');
$changedSeats = json_decode($_SESSION['changedSeats']);
$seatsID = json_decode($_SESSION['seatsID']);

date_default_timezone_set("Asia/Colombo");

$paymentTime = time();
$bookingTime = date('Y-m-d H:i:s', $paymentTime);

if(isset($_SESSION['payment'])) {
    for($a=0; $a<sizeOf($seatsID); $a++) {
        if($changedSeats[$a] != ""){
            $sql1 = "SELECT * FROM `tbl_seat_maps` WHERE seat_category_id = '{$_SESSION['categoryID']}' AND seat_number = '{$changedSeats[$a]}'";
            $result1 = mysqli_query($db,$sql1);
            if(mysqli_num_rows($result1) == 1){
                $row1 = mysqli_fetch_array($result1);

                $sql_update = "UPDATE tbl_bookings SET seat_id = '{$row1['seat_id']}', seat_number = '{$changedSeats[$a]}' WHERE ticket_id = '{$_SESSION['ticketID']}' AND seat_id = '{$seatsID[$a]}' AND `status` = '0'";
                $db->query($sql_update);
            }
        }
    }

    $sql_payment = "INSERT INTO `tbl_payments`(`timestamp`, `user_id`, `ticket_id`, `process`, `customer_name`, `customer_phone`, `customer_email`, `payment_type`, `sub_total`, `service_tax`, `paid_amount`) VALUES ('$bookingTime', '{$_SESSION['userID']}', '{$_SESSION['ticketID']}', 'seat_change','{$_SESSION['customer_name']}','{$_SESSION['customer_phone']}','{$_SESSION['customer_email']}','{$_SESSION['paymentType']}','{$_SESSION['charge']}','0','{$_SESSION['charge']}')";
    $db->query($sql_payment);
    $paymentNumber = $db->insert_id;

    unset($_SESSION['payment']);

    

    $to = $_SESSION['customer_email'];
    $subject = 'Seat(s) Changed - Payment Received';
    $from = 'thuvarahan97@gmail.com';
    
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    // Compose a simple HTML email message
    $message = '<html>
    <body style="font-family:sans-serif;font-size:15px;color:#58595b">
    <div style="width:500px;
                    border:30px solid black;
                    box-sizing:border-box;
                    background: #FFF;">
    <div style="margin:20px 15px 0;">Ticket ID: '.$_SESSION['ticketID'].'</div>
    <div style="margin:15px 15px 5px;">Customer Name - '.$_SESSION['customer_name'].'</div>
    <div style="margin:5px 15px;">Customer Mobile - '.$_SESSION['customer_phone'].'</div>
    <div style="margin:5px 15px;">Customer Email - <a href="'.$_SESSION['customer_email'].'">'.$_SESSION['customer_email'].'</a></div>
    <div style="margin:5px 15px;">QR Link - <a href="http://localhost/InstaMovies/assets/booking_process.success.ticket_QRCode.php?ticketID='.$_SESSION['ticketID'].'">Click Here</a></div>
    <hr style="border-top:1px dashed; margin:10px 15px">
    <div style="margin:5px 15px;">Transaction No. - '.$paymentNumber.'</div>
    <div style="margin:5px 15px;">Transaction Date - '.date("Y-m-d H:i:s", $paymentTime).'</div>
    <div style="margin:20px 0 0;background:#d6d6d6;padding:10px 15px">
    <div style="color:#000;font-size:20px;display:inline-block">Amount:</div>
    <div style="float:right;color:#000;font-size:20px;display:inline-block;font-weight:bold">Rs. '.$_SESSION['charge'].'</div>
    </div>
    </div>
    </body>
    </html>';

    // Sending email
    mail($to, $subject, $message, $headers);
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../validation/dist/css/bootstrapValidator.css"/>
  
    <title>Cổng Thanh Toán</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            text-align: center;
            background: #ededed;
        }
        .content {
            width: 450px;
            top:50%;
            left:50%;
            position:absolute;
            transform:translate(-50%,-50%);
            box-sizing:border-box;
            padding: 30px 30px;
            background: #FFF;
            border-radius: 10px;
        }
        .icon-box {
            top:0%;
            left:50%;
            position:absolute;
            transform:translate(-50%,-50%);
        }
        .btn-success:hover {
            background:#6bb61a !important;
        }
        .loader {
            margin:0;
            position:fixed;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            background: #ededed;
            text-align:center;
            cursor: wait;
            user-select: none;
            z-index: 2000;
        }
        .loader img {
            width: 100px;
            height: 100px;
            user-select: none;
        }
        .loader .loading-content {
            margin: 0;
            position: absolute;
            top: 50%;
            left:50%;
            margin-right: -50%;
            transform:translate(-50%, -50%);
        }
    </style>
</head>

<body>

<div class="loader">
    <div class="loading-content">
        <img draggable="false" src="../images/loading.gif">
        <h1 style="margin-top:30px;">Vui lòng đợi trong khi xử lý thanh toán của bạn... </h1>
    </div>
</div> 

<div class="content">
    <div class="icon-box">
        <img src="../images/success_icon.png" height="100px" width="100px">
    </div>	
    <h1 style="font-size:55px;margin-top:40px;">Cảm Ơn!</h1>
    <p style="font-size:20px;margin-bottom:0">Thao tác của bạn đã được xác nhận.</p>
    <p style="font-size:20px;"><strong>Kiểm tra email của bạn</strong> để xác nhận thanh toán.</p>
    <hr>
    <div style="margin-bottom:15px; color:#5c5c5c">Trình duyệt sẽ tự động chuyển hướng đến trang chủ Cinema trong <span id="timer" style="font-weight:bold"></span> giây.</div>
    <p>
        <a class="btn btn-success" href="../index.php" role="button" style="font-size:20px; background: #7ed321; border:none">Tiếp tục tới trang chủ</a>
    </p>
</div>


<script src="../js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(window).on('load', function () {
        setTimeout(function() {
            jQuery('.loader').fadeOut(500);
        }, 2000);
    });

    $(document).ready(function() {
        if(performance.navigation.type == performance.navigation.TYPE_BACK_FORWARD) {
            window.location = "../user.bookings.php";
        }
        else if(performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            window.location = "../user.bookings.php";
        }

        //Disable form re-submission
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        
        //Timer
        setTimeout(function() {
            var timeleft = 10;
            var Timer = setInterval(function(){
                document.getElementById("timer").innerHTML = timeleft;
                timeleft -= 1;
                if(timeleft < 0){
                    timeleft = 0;
                    clearInterval(Timer);
                    window.location.replace("../user.bookings.php");
                }
            }, 1000);
        }, 1500);
        
    });
</script>

</body>
</html>


<script>
    
</script>