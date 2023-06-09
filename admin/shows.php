<?php
session_start();
include_once ('db_config.php');

if(!isset($_SESSION['admin_id'])) {
    header('location: index.php');
}

else if($_SESSION['admin_id']=='1'){
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cinema - Admin | Dashboard</title>
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- MDBootstrap Datatables  -->
    <link href="css/addons/datatables.min.css" rel="stylesheet">
    <!-- JQuery UI - Datepicker -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!--JQuery Toast Plugin CSS-->
    <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">

    <style>
    .logo-wrapper-custom {
        margin: 20px 0;
        min-height: 30px;
        text-align: center;
        color: white;
        user-select: none;
    }

    .sidebar-fixed {
        background-image: url("images/Sidebar_BG.png");
        background-repeat: no-repeat;
        background-size: 100% auto;
    }

    .sidebar-fixed .list-group a {
        background: none;
        ;
        color: white;
        border: none;
    }

    .sidebar-fixed .list-group a:hover {
        color: #dd44fe;
    }

    .sidebar-fixed .list-group a:focus {
        color: #a564ff;
    }

    .sidebar-fixed .list-group a.active {
        background-color: #4130c2;
        border: none;
    }

    .navbar-nav .logout-button {
        border: 1px solid white;
        border-radius: 4px;
    }

    .navbar-nav .logout-button:hover {
        border: 1px solid red;
    }

    .navbar-brand {
        user-select: none;
        padding: 0;
    }

    .navbar-brand .white-text {
        margin-left: 5px;
        font-size: 16px;
    }

    .pt-3-half {
        padding-top: 1.4rem;
    }

    .card {
        margin-bottom: 80px;
    }

    @media only screen and (min-width: 800px) {
        .card .table-responsive {
            overflow-x: hidden;
        }
    }

    #row_num_column {
        text-align: center;
        width: 40px;
    }

    #show_id_column {
        width: 70px;
        text-align: center;
    }

    #action_column {
        text-align: center;
        width: 80px
    }

    .edit_button {
        width: 28px;
        height: 28px;
        border: none;
        box-shadow: none;
        margin: 0 2px;
        background-color: #007ff6;
        color: white;
        border-radius: 5px;
    }

    .edit_button:hover {
        background-color: #349dff;
    }

    .edit_button:focus {
        background-color: #267ac8;
        outline: none;
    }

    .delete_button {
        width: 28px;
        height: 28px;
        border: none;
        box-shadow: none;
        margin: 0 3px;
        background-color: #f50000;
        color: white;
        border-radius: 5px;
    }

    .delete_button:hover {
        background-color: #fe1c1c;
    }

    .delete_button:focus {
        background-color: #c70000;
        outline: none;
    }

    .add_new_show {
        text-align: center;
    }

    .add_button {
        width: auto;
        height: 35px;
        border: none;
        box-shadow: none;
        margin: 0 3px;
        padding-left: 10px;
        padding-right: 10px;
        background-color: #05a501;
        color: white;
        border-radius: 5px;
    }

    .add_button:hover {
        background-color: #04b600;
    }

    .add_button:focus {
        background-color: #0c9209;
        outline: none;
    }

    #start_date {
        cursor: default;
    }

    #end_date {
        cursor: default;
    }

    #start_date_update {
        cursor: default;
    }

    #end_date_update {
        cursor: default;
    }

    #close_delete {
        background-color: transparent;
        color: red;
        border: 2px solid red;
        border-radius: 5px;
        width: 85px;
        height: 45px;
    }

    #close_delete:hover {
        box-shadow: 0px 0px 8px 2px #bfbfbf;
    }

    #close_delete:focus {
        background-color: #f3f2f2;
        outline: none;
    }

    #delete_confirm {
        background-color: red;
        color: white;
        border-radius: 5px;
        width: 85px;
        height: 45px;
        border: none;
    }

    #delete_confirm:hover {
        box-shadow: 0px 0px 8px 2px #bfbfbf;
    }

    #delete_confirm:focus {
        outline: none;
        background-color: #e60000;
    }

    #deleteShowModal .modal-content {
        border-radius: 10px !important;
    }

    #deleteShowModal .modal-dialog {
        width: 380px;
    }

    #deleteShowModal .modal-header {
        background: red;
        text-align: center;
        color: #FFF;
        padding-top: 10px;
        padding-bottom: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        user-select: none;
    }

    #deleteShowModal .modal-body {
        padding-top: 15px;
        padding-bottom: 15px;
        user-select: none;
    }

    #addShowModal .modal-header {
        user-select: none;
    }

    #updateShowModal .modal-header {
        user-select: none;
    }

    #addShowModal .modal-header .close {
        outline: none;
    }

    #updateShowModal .modal-header .close {
        outline: none;
    }
    </style>
</head>

<body class="grey lighten-4">

    <!--Main Navigation-->
    <?php include ('header.php'); ?>
    <!--Main Navigation-->


    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">


            <!-- Editable table -->
            <div class="card">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Lịch chiếu</h3>
                <div class="card-body">
                    <div class="add_new_show">
                        <button type="button" class="add_button" data-toggle="modal" data-target="#addShowModal">Thêm
                            Lịch chiếu</button>
                    </div>
                    <div id="output" class="table-responsive">
                        <!-- <span class="table-add mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                        aria-hidden="true"></i></a></span> -->

                    </div>
                </div>
            </div>
            <!-- Editable table -->


            <!-- Add Show Modal -->
            <div class="modal fade" id="addShowModal" tabindex="-1" role="dialog" aria-labelledby="addShowModalTitle"
                aria-hidden="true">
                <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addShowModalLongTitle">Lịch chiếu mới</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form id="add_show_form">
                                <div class="form-group row">
                                    <label for="movie_label" class="col-sm-3 col-form-label">Phim:</label>
                                    <div class="col-sm-9">
                                        <select id="movie" name="movie" class="form-control" required="required">
                                            <option value="" disabled selected>Chọn Phim</option>
                                            <?php
                                        $sql_movies_list = "SELECT * FROM `tbl_movies` WHERE status = '1'";
                                        $result_movies_list = mysqli_query($db, $sql_movies_list);
                                        while($row_movies_list = mysqli_fetch_array($result_movies_list))
                                        {
                                            echo '<option startDate="'.$row_movies_list['starting_date'].'" endDate="'.$row_movies_list['ending_date'].'" value="'.$row_movies_list['movie_id'].'">'.$row_movies_list['movie_name'].'</option>';
                                        }
                                    ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="theater_label" class="col-sm-3 col-form-label">Rạp:</label>
                                    <div class="col-sm-9">
                                        <select id="theater" name="theater" class="form-control" required="required">
                                            <option value="" disabled selected>Chọn Rạp</option>
                                            <?php
                                        $sql_theaters_list = "SELECT * FROM `tbl_theatres` WHERE admin_id = '{$_SESSION['admin_id']}'";
                                        $result_theaters_list = mysqli_query($db, $sql_theaters_list);
                                        while($row_theaters_list = mysqli_fetch_array($result_theaters_list))
                                        {
                                            echo '<option value="'.$row_theaters_list['theatre_id'].'">'.$row_theaters_list['theatre_name'].' - '.$row_theaters_list['city'].'</option>';
                                        }
                                    ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="start_date_label" class="col-sm-3 col-form-label">Ngày Chiếu:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type='text' class="form-control" id='start_date' name="start_date"
                                                placeholder="yyyy/mm/dd" onfocus="this.blur()" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="end_date_label" class="col-sm-3 col-form-label">Đến Ngày:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type='text' class="form-control" id='end_date' name="end_date"
                                                placeholder="yyyy/mm/dd" onfocus="this.blur()" required="required">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                id="close">Đóng</button>
                            <button type="button" class="btn btn-primary" id="save">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Update Show Modal -->
            <div class="modal fade" id="updateShowModal" tabindex="-1" role="dialog"
                aria-labelledby="updateShowModalTitle" aria-hidden="true">
                <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLongTitle">Cập Nhật Lịch chiếu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form id="update_show_form">
                                <div class="form-group row">
                                    <label for="movie_label" class="col-sm-3 col-form-label">Phim:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group" id="movieInput">
                                            <input type="text" id="movie_update" name="movie_update"
                                                class="form-control" startDateEdit="$start_edit" endDateEdit="$end_edit"
                                                disabled="disabled" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="theater_label" class="col-sm-3 col-form-label">Rạp:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" id="theater_update" name="theater_update"
                                                class="form-control" disabled="disabled" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="start_date_label" class="col-sm-3 col-form-label">Ngày chiếu:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type='text' class="form-control" id='start_date_update'
                                                name="start_date_update" placeholder="Select Start Date"
                                                onfocus="this.blur()" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="end_date_label" class="col-sm-3 col-form-label">Đến Ngày:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type='text' class="form-control" id='end_date_update'
                                                name="end_date_update" placeholder="Select End Date"
                                                onfocus="this.blur()" required="required">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                id="close">Đóng</button>
                            <button type="button" class="btn btn-primary" id="update">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Delete Show Confirmation Modal -->
            <div class="modal fade" id="deleteShowModal" tabindex="-1" role="dialog"
                aria-labelledby="deleteShowModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteShowModalLongTitle">Cập Nhật</h5>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa chương trình chiếu phim này không?
                            Không thể hoàn tác quá trình này.
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="close_delete" data-dismiss="modal">Không</button>
                            <button type="button" id="delete_confirm">Có</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <?php include ('footer.php'); ?>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="js/addons/datatables.min.js"></script>
    <!-- JQuery UI - Datepicker -->
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <!-- JQuery Toast Plugin JS-->
    <script src="js/jquery.toast.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
    // Animations initialization
    new WOW().init();
    </script>

    <!--Date Picker Script-->
    <script>
    //Initiating datepicker
    $(function() {
        $("#start_date").datepicker({
            dateFormat: 'yy-mm-dd',
            showOn: "button",
            buttonImage: "images/calendar.png",
            buttonText: "Select Date",
            disabled: true
        });

        $("#end_date").datepicker({
            dateFormat: 'yy-mm-dd',
            showOn: "button",
            buttonImage: "images/calendar.png",
            buttonText: "Select Date",
            disabled: true
        });

        $("#start_date_update").datepicker({
            dateFormat: 'yy-mm-dd',
            showOn: "button",
            buttonImage: "images/calendar.png",
            buttonText: "Select Date"
        });

        $("#end_date_update").datepicker({
            dateFormat: 'yy-mm-dd',
            showOn: "button",
            buttonImage: "images/calendar.png",
            buttonText: "Select Date"
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        //Fetching table data from mysql
        function fetch_table_data() {
            $.ajax({
                url: "assets/shows.table.php",
                method: "POST",
                success: function(data) {
                    $("#output").html(data);
                }
            });
        }
        fetch_table_data();

        //Converting a number into two digits format
        function pad2(number) {
            return (number < 10 ? '0' : '') + number;
        }

        //Form filling conditions
        $('#movie').on('change', function() {
            $("#theater").val("");
            $("#start_date").val("");
            $("#end_date").val("");
            var movieID = $(this).val();
            var current_date = new Date();
            var current_date_formatted = current_date.getFullYear() + "-" + pad2(current_date
            .getMonth() + 1) + "-" + pad2(current_date.getDate());
            var startDate = $(this).find('option:selected').attr('startDate');
            var endDate = $(this).find('option:selected').attr("endDate");
            if (movieID != "") {
                $("#start_date").datepicker("option", "disabled", false);
                $("#end_date").datepicker("option", "disabled", true);
                if (new Date(startDate) > current_date) {
                    $("#start_date").datepicker('option', 'minDate', startDate);
                } else {
                    $("#start_date").datepicker('option', 'minDate', 0);
                }
                $("#start_date").datepicker('option', 'maxDate', endDate);
                $('#start_date').datepicker('option', {
                    onClose: function(selected) {
                        $("#end_date").datepicker("option", "minDate", selected);
                        $("#end_date").datepicker("option", "maxDate", endDate);
                    }
                });
            } else {
                $("#theater").val("");
                $("#start_date").val("");
                $("#end_date").val("");
                $("#start_date").datepicker("option", "disabled", true);
                $("#end_date").datepicker("option", "disabled", true);
            }
        });

        //Resetting value of endDate in addNewShow form when startDate value is changed
        $("#start_date").on("change", function() {
            $("#end_date").val("");
            $("#end_date").datepicker("option", "disabled", false);
        });

        //Add new row to table
        $("#save").click(function() {
            if ($("#add_show_form")[0].checkValidity()) {
                $.ajax({
                    url: "assets/shows.insert.php",
                    type: "post",
                    data: $("#add_show_form").serialize(),
                    success: function(d) {
                        $('#addShowModal').modal('hide');
                        //$("<tr></tr>").html(d).prependTo(".table");
                        fetch_table_data();
                        if (d !== "") {
                            $.toast({
                                text: "New show was added successfully.",
                                icon: 'success',
                                position: 'top-center',
                                hideAfter: 3000,
                                stack: false,
                                loader: false
                            });
                        } else {
                            $.toast({
                                text: "Show is already available for the given movie and theater.",
                                icon: 'warning',
                                position: 'top-center',
                                hideAfter: 3000,
                                stack: false,
                                loader: false
                            });
                        }
                    }
                });
            } else {
                $("#add_show_form")[0].reportValidity();
            }
        });

        //Reset form on closing modal
        $('#addShowModal').on('hidden.bs.modal', function() {
            $("#add_show_form")[0].reset();
        });

        var showID_update = "";
        //Getting a row data from table to modal update form
        $(document).on("click", ".edit_button", function() {
            var row = $(this);
            var id = $(this).attr("showID");
            showID_update = id;

            $('#updateShowModal').modal('show');

            var movie = row.closest("tr").find("td:eq(2)").text()
            $.ajax({
                url: "assets/shows.update.details.php",
                type: "post",
                data: {
                    movieNameUpdate: movie
                },
                success: function(html) {
                    $("#movieInput").html(html)
                }
            })

            var theater = row.closest("tr").find("td:eq(3)").text()
            $("#theater_update").val(theater);

            var start = row.closest("tr").find("td:eq(4)").text()
            $("#start_date_update").val(start);

            var end = row.closest("tr").find("td:eq(5)").text()
            $("#end_date_update").val(end);
        });

        //Update a row data in the table
        $("#update").click(function() {
            $.ajax({
                url: "assets/shows.update.php",
                type: "post",
                data: $("#update_show_form").serialize() + "&showID_update=" + showID_update,
                success: function() {
                    $('#updateShowModal').modal('hide');
                    fetch_table_data();
                    $.toast({
                        text: "Show details were updated successfully.",
                        icon: 'success',
                        position: 'top-center',
                        hideAfter: 3000,
                        stack: false,
                        loader: false
                    });
                }
            });
        });

        var showID_delete = "";
        //Delete a row from table
        $(document).on("click", ".delete_button", function() {
            var del = $(this);
            var id = $(this).attr("showID");
            showID_delete = id;

            $('#deleteShowModal').modal('show');

        });

        //Confirm deleting a row from table
        $("#delete_confirm").click(function() {
            $.ajax({
                url: "assets/shows.delete.php",
                type: "post",
                data: {
                    id: showID_delete
                },
                success: function() {
                    $('#deleteShowModal').modal('hide');
                    fetch_table_data();
                    //$("#output").load("assets/shows.table.php");
                }
            });
        })
    });
    </script>

    <script>
    $(".sidebar-fixed .list-group .list-group-item.item-4").addClass("active");
    </script>

</body>

</html>