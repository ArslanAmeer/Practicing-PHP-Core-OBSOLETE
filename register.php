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
        <link rel="stylesheet" href="./assets/css/main.css">
        <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">
    </head>

    <body>
        <!-- A Simple Basic Registration Form -->
        <!-- Registration Form -->
        <div>
            <div class="container-fluid">
                <div class="row no-gutter">
                    <div class="col-md-8 col-lg-6">
                        <div class="login d-flex align-items-center py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 col-lg-8 mx-auto">
                                        <h5 class="login-heading mb-2">Want To See Beauty Around The World!</h5>
                                        <h3 class="login-heading mb-4">Register Yourself Now!</h3>

                                        <form id="login-form" method="POST">

                                            <div class="form-label-group">
                                                <input type="name" id="name" name="name" class="form-control"
                                                    placeholder="Full Name" required autofocus>
                                                <label for="name">Full Name</label>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email address" required autofocus>
                                                <label for="email">Email address</label>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" placeholder="Password" required>
                                                <label for="password">Password</label>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="password" id="confirmPassword" name="confirmPassword"
                                                    class="form-control" placeholder="Confirm Password" required>
                                                <label id="message" for="confirmPassword">Confirm Password</label>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="tel" id="phone" name="phone" class="form-control"
                                                    placeholder="Contact Number" required>
                                                <label for="phone">Contact Number</label>
                                            </div>

                                            <button
                                                class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                                type="submit" id="register_btn"
                                                style="border-radius: 25px; font-size: 15px; padding: 12px 0;">Register
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                </div>
            </div>
        </div>

        <script src="./assets/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="./assets/js/vendor/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script type="text/javascript">
        $(() => {
            $('#password, #confirmPassword').on('keyup', function() {
                if ($('#password').val() == $('#confirmPassword').val()) {
                    $('#message').html('Confirm Password - Matched').css('color', 'green');
                } else {
                    $('#message').html('Confirm Password - Not Matched').css('color', 'red');
                }
            });
            $("#register_btn").click(function(e) {
                debugger;
                var valid = this.form.checkValidity();
                if (valid) {
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var password = $("#password").val();
                    var confirmPassword = $("#confirmPassword").val();
                    var phone = $("#phone").val();

                    if (password != confirmPassword) {
                        e.preventDefault(e);
                        Swal.fire({
                            'title': 'Error',
                            'text': 'Password & Confirm Password Did Not Match',
                            'type': 'error'
                        });
                    } else {

                        e.preventDefault(e);

                        $.ajax({
                            type: 'POST',
                            url: 'register_Process.php',
                            data: {
                                name: name,
                                email: email,
                                password: password,
                                confirmPassword: confirmPassword,
                                phone: phone
                            },
                            dataType: "json",
                            success: function(data) {
                                debugger;
                                if (data.isError) {
                                    Swal.fire({
                                        'title': 'Error',
                                        'text': data.msg,
                                        'type': 'error'
                                    });
                                } else {
                                    Swal.fire({
                                        'title': 'Successful',
                                        'text': data.msg,
                                        'type': 'success',
                                        onClose: () => {
                                            $('#regForm').trigger(
                                                "reset");
                                            window.location.href =
                                                'login.php';
                                        }
                                    });
                                }
                            },
                            error: function(e) {
                                Swal.fire({
                                    'title': 'Error',
                                    'text': 'There were errors while saving the data' +
                                        e.message,
                                    'type': 'error'
                                })
                            }
                        });
                    }
                } else {
                    Swal.fire({
                        'title': 'Error',
                        'text': 'Entered Data is Not Valid !',
                        'type': 'error'
                    });
                }
            });
        });
        </script>
    </body>

</html>
