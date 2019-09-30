<!-- PHP File Required / Include Here -->
<?php
    require_once("config.php");
?>

<!-- HTML DOCUMENT STARTS HERE -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHP Practice</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>
        <!-- A Simple Basic Registration Form -->
        <!-- Registration Form -->
        <div>
            <form id="regForm">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h1 class="text-center mt-2">REGISTER HERE</h1>
                            <hr>
                            <div class="form-group">
                                <label for="firstName">First Name:</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <input type="submit" name="register" id="register_btn" class="btn btn-primary"
                                value="Submit" />
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script type="text/javascript">
        $(() => {
            $("#register_btn").click(function(e) {
                var valid = this.form.checkValidity();
                debugger;
                if (valid) {
                    var firstname = $("#firstName").val();
                    var lastname = $("#lastName").val();
                    var email = $("#email").val();
                    var password = $("#password").val();
                    var phone = $("#phone").val();

                    e.preventDefault(e);

                    $.ajax({
                        type: 'POST',
                        url: 'register.php',
                        data: {
                            firstName: firstname,
                            lastName: lastname,
                            email: email,
                            password: password,
                            phone: phone
                        },
                        success: function(data) {
                            Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success',
                                onClose: () => {
                                    $('#regForm').trigger("reset");
                                }
                            });

                        },
                        error: function(e) {
                            Swal.fire({
                                'title': 'Error',
                                'text': 'There were errors while saving the data',
                                'type': 'error'
                            })
                        }
                    });

                } else {}

            });
        });
        </script>
    </body>

</html>
