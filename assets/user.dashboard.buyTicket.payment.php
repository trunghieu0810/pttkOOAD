<?php
session_start();
$_SESSION['payment'] = "true";

$_SESSION['customer_name'] = $_GET['customer_name'];
$_SESSION['customer_phone'] = $_GET['customer_mobile'];
$_SESSION['customer_email'] = $_GET['customer_email'];
$_SESSION['paymentType'] = $_GET['paymentType'];

if($_GET['paymentType'] == "visa_mastercard") {
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
            background: url("../images/paymentBG.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: sans-serif;
        }
        .content {
            width: 450px;
            top:50%;
            left:50%;
            position:absolute;
            transform:translate(-50%,-50%);
            box-sizing:border-box;
            padding: 30px 30px;
            background: rgba(0, 0, 0, 0.7);
            color: #FFF;
        }
        .content .cards {
            text-align: center;
            margin-bottom: 15px;
        }
        .content .cards img {
            padding: 0 3px;
        }
        .content .merchant_name {
            margin-bottom: 15px;
            background-color:rgba(147, 147, 147, 0.5);
            padding: 5px 10px;
            border-radius: 5px;
            user-select: none;
        }
        .content .pay-button {
            border:none;
            outline:none;
            height:40px;
            background: #188e1a;
            color: #FFF;
            font-size: 18px;
            border-radius:25px;
            margin-top:15px;
            width: 100%;
            text-align: center;
        }
        .content .pay-button:hover {
            background: #18a01a;
            cursor: pointer;
        }
        .content .pay-button:active {
            background: #188e1a;
        }
        input[type=date]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            display: none;
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
        <h1 style="margin-top:30px;">Vui lòng đợi trong khi xử lý thanh toán của bạn...</h1>
    </div>
</div>

<div class="content">
<div class="merchant_name">
        Tên Người Thanh Toán: <span style="float:right">Cinema luôn bảo mật tuyệt đối</span>
    </div>
    <form action="user.bookings.changeSeat.success.php" method="post" id="accountDetailsForm">
        <div class="form-group">
            <label class="control-label">Loại Thẻ</label>
            <select id="type" class="form-control" name="type">
                <option value="mastercard" selected>Mastercard</option>
                <option value="visa">Visa</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Tên Thẻ</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label class="control-label">Số thẻ</label>
            <input type="text" class="form-control" id="card_number" name="number" required title="Enter 16 digit card number" maxlength="16">
        </div>      
        <div class="form-group">
            <label class="control-label">Ngày Hết Hạn</label>
            <input type="date" id="datefield" class="form-control" name="date" onkeydown="return false">
        </div>
        <div class="form-group">
            <label class="control-label">CVV</label>
            <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3">
        </div>
        <div class="form-group">
            <button class="pay-button">Thực Hiện Thanh Toán</button>
        </div>
    </form>
</div>


<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script type="text/javascript" src="../validation/dist/js/bootstrapValidator.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(window).on('load', function () {
        setTimeout(function() {
            jQuery('.loader').fadeOut(500);
        }, 3000);
    });

    $(document).ready(function() {

        $("#type").change(function() {
            $("#name").val("");
            $("#card_number").val("");
            $("#datefield").val("");
            $("#cvv").val("");
        });


        //Setting minimum value of date input as today
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            }
        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("datefield").setAttribute("min", today);


        //Page Reload, Close, Back Forward - Actions - start
        var exit = true;
        $(window).on("keydown",function(e){
            if(e.which == 116){
                exit = false;
            }
        });

        if(performance.navigation.type == performance.navigation.TYPE_BACK_FORWARD) {
            exit = true;
            window.location = "../user.dashboard.php";
        }
        //Page Reload, Close, Back Forward - Actions - end
        
        //Validate card number starting number according to card type
        $('#card_number').keyup(function() {
            if($("#type option:selected").val() == "mastercard") {
                $(this).val(
                    $(this).val()
                        .replace(/^[^5]*/, '')
                        .replace(/[^\d]*/g, '')
                );
            }
            else if($("#type option:selected").val() == "visa") {
                $(this).val(
                    $(this).val()
                        .replace(/^[^4]*/, '')
                        .replace(/[^\d]*/g, '')
                );
            }
        });


        //Validate form
        $('#accountDetailsForm').bootstrapValidator({
            fields: { 
                name: {
                verbose: false,
                    validators: {notEmpty: {
                            message: 'The Name is required and can\'t be empty'
                        },regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'The Name can only consist of alphabets'
                        } } },
                number: {
                verbose: false,
                    validators: {notEmpty: {
                            message: 'The Card Number is required and can\'t be empty'
                        },stringLength: {
                        min: 16,
                        max: 16,
                        message: 'The Card Number must be 16 characters long'
                    },regexp: {
                            regexp: /^[0-9 ]+$/,
                            message: 'Enter a valid Card Number'
                        } } },
                date: {
                verbose: false,
                    validators: {notEmpty: {
                            message: 'The Expire Date is required and can\'t be empty'
                        } } },
                cvv: {
                verbose: false,
                    validators: {notEmpty: {
                            message: 'The cvv is required and can\'t be empty'
                        },stringLength: {
                        min: 3,
                        max: 3,
                        message: 'The cvv must 3 characters long'
                    },regexp: {
                            regexp: /^[0-9 ]+$/,
                            message: 'Enter a valid cvv'
                        } } } 
            }
        });
    });
</script>

</body>
</html>

<?php 
}else{
    header('../user.dashboard.php');
}
?>