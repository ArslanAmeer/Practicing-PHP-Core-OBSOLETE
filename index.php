<!-- PHP File Required / Include Here -->
<?php
session_start();
if(!isset($_SESSION['userLogin']))
    header("Location: login.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Arslan Demo - PHP</title>
        <title>PHP Practice</title>
        <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body>

        <h1>WELCOME to HomePage</h1>

        <script src="./assets/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="./assets/js/vendor/bootstrap.min.js"></script>
    </body>

</html>
