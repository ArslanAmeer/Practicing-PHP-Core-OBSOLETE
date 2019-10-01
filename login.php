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
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body>
        <!-- A Simple Basic Login Form -->
        <!-- Login Form -->
        <div>
            <div class="container-fluid">
                <div class="row no-gutter">
                    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                    <div class="col-md-8 col-lg-6">
                        <div class="login d-flex align-items-center py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 col-lg-8 mx-auto">
                                        <h3 class="login-heading mb-4">Welcome To Demo Login</h3>
                                        <form id="login-form">
                                            <div class="form-label-group">
                                                <input type="email" id="inputEmail" class="form-control"
                                                    placeholder="Email address" required autofocus>
                                                <label for="inputEmail">Email address</label>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="password" id="inputPassword" class="form-control"
                                                    placeholder="Password" required>
                                                <label for="inputPassword">Password</label>
                                            </div>

                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Remember
                                                    password</label>
                                            </div>
                                            <button
                                                class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                                type="submit">Sign in</button>
                                            <div class="text-center">
                                                <a class="small" href="#">Forgot password?</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
