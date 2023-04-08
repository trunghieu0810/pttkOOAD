<div class="header_wrapper">    
    <div class="main_menu_wrapper">
        <nav class="navbar navbar-expand-md navbar-dark bg-transparent fixed-top" role="navigation">
            
            <div class="header_logo visible-xs">
                <a href="index.php"> <img src="images/logo.png" width="120px" height="55px"></a>
            </div>
            
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
                        
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                        <div class="navbar-brand hidden-xs">
                            <a href="index.php"> <img src="images/logo.png" width="120px" height="55px"></a>
                        </div>
                    </div>

                    <div class="col-lg-11">
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto">
                                <li class="item-1"><a class="nav-link" href="index.php">TRANG CHỦ</a></li>
                                <li class="item-2"><a class="nav-link" href="movies.php">PHIM</a></li>
                                <li class="item-3"><a class="nav-link" href="rates_and_showtimes.php">LỊCH CHIẾU<span class="sr-only">(current)</span></a></li>
                                <li class="item-4"><a class="nav-link" href="theatres.php">RẠP</a></li>
                                <!-- <li class="item-5"><a class="nav-link" href="news.php">NEWS</a></li> -->
                                <li class="item-6"><a class="nav-link" href="offers.php">ƯU ĐÃI</a></li>
                                <li class="item-7"><a class="nav-link" href="buy_tickets.php">ĐẶT VÉ</a></li>
                                <li class="item-8"><a class="nav-link" href="contact_us.php">LIÊN HỆ</a></li>
                            </ul>
                            <ul class="navbar-nav navbar-right">
                                <?php if(isset($_SESSION['userID'])){ ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php echo strtoupper($_SESSION['username']) ?>
                                    </a>
                                    <ul class="dropdown-menu fadeIn">
                                        <li><a href="user.dashboard.php">Trang chủ</a></li>
                                        <li><a href="user.profile.php">Hồ sơ</a></li>                                        
                                        <li><a href="user.bookings.php">Đặt chỗ</a></li>
                                        <li><a href="user.payments.php">Thanh toán</a></li>
                                        <li><a href="user.refunds.php">Hoàn tiền</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="logout.php">Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <?php } else { ?>
                                <li class="item-9"><a class="nav-link" href="login.php">ĐĂNG NHẬP</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<!--Navbar Script-->
<script>
    window.onscroll = function(){
        if (window.pageYOffset > 50){
            $(".navbar").removeClass("bg-transparent");
            $(".navbar").addClass("bg-black");
        }
        else{
            $(".navbar").addClass("bg-transparent");
            $(".navbar").removeClass("bg-black");
        }
    }

    if (window.pageYOffset > 50){
        $(".navbar").removeClass("bg-transparent");
        $(".navbar").addClass("bg-black");
    }
</script>


<style>

.main_menu_wrapper .navbar-toggler{
    position: relative;
    float: right;
    padding: 9px 10px;
    border-color: rgba(249, 247, 247, 0.75)!important;
}

@media (max-width: 767px){
    .main_menu_wrapper .hidden-xs {
        display: none!important;
    }
    .main_menu_wrapper .visible-xs {
        display: block!important;
    }
    .main_menu_wrapper .bg-transparent{
        background-color: black!important;
    }    
    .main_menu_wrapper .navbar-collapse {
        max-height: 340px;
        width:100%;
    }
    .nav-link{
        
        width:100%;
    }
    .navbar-collapse.show {
        overflow-y: auto;
    }
    .main_menu_wrapper .container .row{
        margin-right: 0px;
        margin-left: 0px;
        width: 100%;
    }
    .main_menu_wrapper .container .col-lg-11 {
        padding-right: 0;
        padding-left: 0;
    }
}

@media (min-width: 767px){
    .main_menu_wrapper .visible-xs {
        display: none!important;
    }
}

@media (max-width: 480px){
.main_menu_wrapper .navbar-toggle {
    background-color: transparent;
    margin: 22px;
}}

</style>