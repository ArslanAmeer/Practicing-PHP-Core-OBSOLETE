<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Arslan Demo :: Password Recovery</title>
        <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/main.css">
    </head>

    <body>

        <div class="jumbotron">
            <h1 class="display-4">Forgot Password!</h1>
            <p class="lead">Enter Your Valid Email Address for Password Recovery!</p>
            <hr class="my-4">
            <div>
                <form id="recovery-form" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" type="email" class="form-control" required>
                    </div>
                    <button id="submit" type="submit" class="btn btn-primary mb-2 ml-2 position-relative">Recover
                        Password
                        <img id="ajax-loading-img" style="display: none" src="../assets/images/loading-new.gif">
                    </button>
                </form>
                <a href="login.php"> <sup>Or Login Here!</sup> </a>
            </div>
        </div>

        <script src="../assets/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="../assets/js/vendor/sweetalert2.min.js"></script>
        <script src="../assets/js/vendor/promise-pollyfill.min.js"></script>
        <script>
        $(() => {
            $("#submit").click(function(e) {
                var valid = this.form.checkValidity();
                if (valid) {
                    var email = $("#email").val();
                    e.preventDefault(e);

                    $.ajax({
                        type: 'POST',
                        url: '../process/passwordReset_Process.php',
                        data: {
                            email: email,
                        },
                        beforeSend: function() {
                            $("#ajax-loading-img").show();
                            $("#recovery-form :input").prop("disabled", true)
                        },
                        success: function(data) {
                            if ($.trim(data) === '1') {
                                Swal.fire({
                                    'title': 'Successful',
                                    'text': "An Email Has Been Sent To You with Temporary Password!",
                                    'type': 'success',
                                    onClose: () => {
                                        $('form').trigger("reset");
                                        setTimeout(
                                            "window.location.href = 'login.php'",
                                            1000);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    'title': 'ERROR',
                                    'text': data,
                                    'type': 'error',

                                });
                            }
                        },
                        complete: function(data) {
                            $("#ajax-loading-img").hide();
                            $("#recovery-form :input").val("");
                            $("#recovery-form :input").prop("disabled", false);
                        },
                        error: function(e) {
                            Swal.fire({
                                'title': 'Error',
                                'text': 'An Error Occured while Recovering!',
                                'type': 'error'
                            })
                        }
                    });
                }
            });
        });
        </script>
    </body>

</html>
