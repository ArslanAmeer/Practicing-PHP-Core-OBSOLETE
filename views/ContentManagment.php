<!-- PHP File Required / Include Here -->
<?php
    include_once "../helpers/subview.php";
?>
<!-- HTML Document Starts Here -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Content Management :: Arslan Demo</title>
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
                            <mark> Basic CRUD Operations in CorePHP </mark>
                        </h4>
                        <p class="text-center"> Content Managment </p>
                        <button id="addBtn" class="btn btn-primary"> Add</button>
                    </div>
                    <hr>
                    <!-- Datatable here -->
                    <div class="col-12">
                        <hr>
                        <!-- Table -->
                        <table id='userTable' class='table table-bordered table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Content Title</th>
                                    <th>Content Caption</th>
                                    <th>Content Image</th>
                                    <th>Posted By User</th>
                                    <th>Date Posted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ADD MODAL -->
            <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
                aria-hidden="true" style="color: black">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="my-modal-title">Add User</h5>
                            <button class="close" type="reset" data-dismiss="modal" aria-label="Close"
                                onclick="$('#my-modal form')[0].reset()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="cm-form">
                                <input type="text" id="id" name="id" disabled>
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Title:</label>
                                    <input type="text" class="form-control" id="title" requried>
                                </div>
                                <div class="form-group">
                                    <label for="caption" class="col-form-label">Caption:</label>
                                    <input type="text" class="form-control" id="caption" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="$('#my-modal form')[0].reset()" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                            <button type="submit" form="cm-form" class="btn btn-primary" id="insert">Add</button>
                            <button type="submit" form="cm-form" class="btn btn-outline-primary" id="update"
                                style="display: none">Update</button>
                        </div>
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

                // Content Managment Scripting Here

                var dataTable = $('#userTable').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'serverMethod': 'post',
                    'ajax': {
                        'url': '../process/Content_Management/CM_Read.php'
                    },
                    'columns': [{
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'caption'
                    },
                    {
                        data: 'imageUrl',
                        sortable: false
                    },
                    {
                        data: 'fullName'
                    },
                    {
                        data: 'date_added'
                    },
                    {
                        data: "id",
                        sortable: false,
                        render: function (id, type, full, meta) {
                            return '<a href="#" onclick="EditData(this)">Edit</a> | <a id="delete" href="#" onclick="DeleteData(' +
                                id + ')">Delete</a>';
                        }
                    }
                    ]
                });

                $("#addBtn").click(() => {
                    $("#my-modal").modal('show');
                    $("#id").val('Auto');
                    $("#title").val('');
                    $("#caption").val('');
                    $("#add").show();
                    $("#update").hide();
                });

                $("#update").click(() => {
                    var valid = validateForm("cm-form");
                    if (valid) {
                        var userData = {
                            id: $("#id").val(),
                            title: $("#title").val(),
                            caption: $("#caption").val()
                        }
                        console.dir(userData);
                        $.ajax({
                            url: "../process/Content_Management/CM_Update.php",
                            method: 'POST',
                            data: userData,
                            success: function (data) {
                                $("#my-modal").modal('hide');
                                Swal.fire({
                                    'title': 'Successful',
                                    'text': data,
                                    'type': 'success',
                                    onClose: () => {
                                        dataTable.ajax.reload();
                                    }
                                });
                            }
                        });
                    }
                });
            });

            function EditData(data) {
                $("#insert").hide();
                $("#update").show();
                var id = $(data).closest('tr').find('td:eq(0)').text();
                var title = $(data).closest('tr').find('td:eq(1)').text();
                var caption = $(data).closest('tr').find('td:eq(2)').text();
                $("#my-modal").modal('show');
                $("#id").val(id);
                $("#title").val(title);
                $("#caption").val(caption);
            }

            function DeleteData(id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "../process/Content_Management/CM_Delete.php?id=" + id,
                                type: "GET",
                                cache: false,
                                success: function (data) {
                                    $("#my-modal").modal('hide');
                                    Swal.fire({
                                        'title': 'Deleted!',
                                        'text': data,
                                        'type': 'success',
                                        onClose: () => {
                                            location.reload();
                                        }
                                    });
                                },
                                error: function (errormessage) {
                                    alert(errormessage.responseText);
                                }
                            });
                        }
                    })
            }

            function validateForm(formName) {
                var fields = ["title", "caption"]
                // var formC = "'" + formName + "'";
                var i, l = fields.length;
                var fieldname;
                for (i = 0; i < l; i++) {
                    fieldname = fields[i];
                    if (document.forms[formName][fieldname].value === "") {
                        alert(fieldname + " can not be empty");
                        return false;
                    }
                }
                return true;
            }      
        </script>
    </body>

</html>
