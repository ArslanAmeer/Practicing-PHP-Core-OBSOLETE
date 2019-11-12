<!-- PHP File Required / Include Here -->
<?php
    include_once "../helpers/subview.php";
    session_start();
    if(!isset($_SESSION['userLogin']))
        header("Location: login.php");
?>
<!-- HTML Document Starts Here -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>API Testing :: Arslan Demo</title>
        <!-- <link
            href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i|Open+Sans:300,300i,400,400i,700,700i"
            rel="stylesheet"> -->
        <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/vendor/datatables.min.css">
        <link rel="stylesheet" href="../assets/css/vendor/theme.css">
        <link rel="stylesheet" href="../assets/css/main.css">
    </head>

    <body id="user-management">
        <!-- Inject Navbar Here -->
        <?php subview('navbar.php'); ?>

        <!-- Main Content Here -->
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <h4 class="text-center">
                            <mark> Consuming API </mark>
                        </h4>
                        <p class="text-center"> Random Api Generator </p>
                        <hr>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center"> Data From Random Users Api </h6>
                        <!-- Table 1 - RandomUsersAPI -->
                        <table id='apiTable1' class='table table-bordered table-hover table-striped text-center'>
                            <thead>
                                <tr>
                                    <th>Reg: Age</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody id='tbody'></tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="col-12">
                        <hr>                    
                        <h6 class="text-center"> Data From ReqRes Api </h6>
                        <div class="text-center"> <button id="addBtn" class="btn btn-outline-dark"> Add</button> </div>
                        <hr>
                        <!-- Table 2 - RandomUsersAPI -->
                        <table id='apiTable2' class='table table-bordered table-hover table-striped text-center'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody id='tbody'></tbody>
                        </table>
                        <form class="form-inline justify-content-center" method="post" action="">
                        <input type="text" id="user_id" class="form-control" placeholder="Id" disabled="disabled" style="display: none" />
                            <div class="form-group">
                                <label for="name">Name: </label>
                                <input id="name" class="form-control ml-2" type="text" name="name">
                            </div>
                            <div class="form-group ml-4">
                                <label for="email">Email: </label>
                                <input id="email" class="form-control ml-2" type="email" name="email">
                            </div>
                            <button id="addNew" class="btn btn-primary ml-4" type="button">Add</button>
                            <button id="update" class="btn btn-primary ml-4" type="button">Update</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </main>

        <!-- Inject Footer Here -->
        <?php subview('footer.php') ?>

        <script src="../assets/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../assets/js/vendor/datatables.min.js"></script>
        <script src="../assets/js/vendor/sweetalert2.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
        <script>
            $(document).ready(function () {
                // Table 1 - GET Data through AJAX from randomusers.com/api
                var newHtml = "";
                $.ajax({
                    url: 'https://randomuser.me/api/?results=5',
                    type: 'get',
                    dataType: 'json',
                    success: function (result) {
                        $.each(result.results, (index, value) => {
                            newHtml += '<tr><td>' +
                                value.registered.age +
                                '</td><td>' +
                                value.name.first + " " +value.name.last +
                                '</td><td>' +
                                value.email +
                                '</td><td><img src="' +
                                value.picture.medium +'" alt="avatar" class="img-responsive" style="width: 50px; height: 50px; border-radius: 50%">' +
                                '</td></tr>';
                        });
                        $("#apiTable1").children("#tbody").html(newHtml);
                    }
                });
                // Table 2 - GET Data through AJAX from reqres.com/api
                var newHtml2 = "";
                $.ajax({
                    url: 'https://reqres.in/api/users?page=1',
                    type: 'get',
                    dataType: 'json',
                    success: function (result) {
                        $.each(result.data, (index, value) => {
                            newHtml2 += '<tr><td>' +
                                value.id +
                                '</td><td>' +
                                value.first_name + " " +value.last_name +
                                '</td><td>' +
                                value.email +
                                '</td><td><img src="' +
                                value.avatar +'" alt="avatar" class="img-responsive" style="width: 50px; height: 50px; border-radius: 50%">' +
                                '</td><td> <a href="#name" id="edit" onclick="EditData(this)">Edit</a> | <a href="#" id="delete " onclick="DeleteData(' +
                                value.id +
                                ')">Delete</a></td></tr>';
                        });
                        $("#apiTable2").children("#tbody").html(newHtml2);
                    }
                });

                // Update Data - Request through AJAX
                $("#update").click(()=>{
                    var user = new Object();
                    user.id = $("#user_id").val();
                    user.name = $("#name").val();
                    user.email = $("#email").val();
                    $.ajax({
                        url: 'https://reqres.in/api/users/1',
                        type: 'PUT',
                        dataType: 'json',
                        content: "application/json",
                        data: user,
                        success: function (result) {
                            alert("updatedAt: "+result.updatedAt);
                        }
                    });
                });
            });  
            
            function EditData(data) {
                var id = $(data).closest('tr').find('td:eq(0)').text();
                var fullName = $(data).closest('tr').find('td:eq(1)').text();
                var email = $(data).closest('tr').find('td:eq(2)').text();
                $("#user_id").val(id);
                $("#name").val(fullName);
                $("#email").val(email);
                $("#name")[0].scrollIntoView();
            }
        </script>
    </body>

</html>
