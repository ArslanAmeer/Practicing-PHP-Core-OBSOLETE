<!-- PHP File Required / Include Here -->
<?php
    include_once "./helpers/subview.php";
    include_once "./helpers/helpers.php";
    // header("Location: views/UserManagement.php"); 
    session_start();
    if(!isset($_SESSION['userLogin']))
        header("Location: views/login.php");
    checkSessionActive();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Arslan Demo :: Home</title>
        <link
            href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i|Open+Sans:300,300i,400,400i,700,700i"
            rel="stylesheet">
        <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="./assets/css/vendor/datatables.min.css">
        <link rel="stylesheet" href="./assets/css/vendor/theme.css">
        <link rel="stylesheet" href="./assets/css/main.css">
    </head>

    <body>
    <nav class="navbar navbar-expand-md navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">ARSLAN</a>
        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault"
            aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsDefault">
            <ul class="navbar-custom navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- PHP Script - Link based on User Login -->
                <?php
                if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']['roleId'] == 1) {
                    echo ' <li class="nav-item">
                                    <a class="nav-link" href="views/ContentManagment.php">Panel</a>
                                </li>';
                }
                if (!isset($_SESSION['userLogin'])) {
                    echo ' <li class="nav-item">
                                <a class="nav-link" href="views/login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="views/register.php">Register</a>
                            </li>';
                } else {
                    echo '<li class="nav-item">
                                <a class="nav-link" href="process/logout_Process.php">Logout</a>
                            </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

        <!-- Intro -->
        <div class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h1 class="brand-heading">Hello, Arslan Here</h1>
                            <p class="intro-text">
                                My Travel Dairy <br>
                                (A Php Demo App)
                            </p>
                            <a href="#pageid" class="btn btn-circle page-scroll">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- About -->
        <section id="pageid">
            <div class="container content-section text-center">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h2 class="d-block">LIL' ABOUT ME</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae suscipit numquam alias illum
                            atque. Asperiores, tempore non? Quod vitae enim reprehenderit adipisci temporibus
                            accusantium quia modi, eum aperiam natus illo. <a href="#">quis</a> laoreet leo. Maecenas
                            eget ante ipsum.
                        </p>
                        <p>
                            <a href="#" class="btnghost"><i class="fa fa-download"></i> Curriculum Vitae</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio -->
        <section id="portfolio">
            <div class="gallery">
                <ul class="row">
                    <li class="col-md-3">
                        <a href="#">
                            <img src="./assets/images/gallery-img-1.jpg" alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="#">
                            <img src="./assets/images/gallery-img-2.jpg" alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="#">
                            <img src="./assets/images/gallery-img-3.jpg" alt="">
                        </a>
                    </li>


                    <li class="col-md-3">
                        <a href="#">
                            <img src="./assets/images/gallery-img-4.webp" alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="#">
                            <img src="./assets/images/gallery-img-5.jpg" alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="#">
                            <img src="./assets/images/gallery-img-6.jpg" alt="">
                        </a>
                    </li>


                    <li class="col-md-3">
                        <a href="#">
                            <img src="./assets/images/gallery-img-7.jpg" alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="#">
                            <img src="./assets/images/gallery-img-8.jpg" alt="">
                        </a>
                    </li>

                </ul>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact">
            <div class="container content-section text-center">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h2>Author's Message</h2>
                        <p>
                            A year from now you will wish you had started today.
                        </p>
                        <p>
                            <i><a href="mailto:email@arslanameer.com"
                                    class="highlightlink">email@arslanameer.com</a></i>
                        </p>
                        <ul class="list-inline banner-social-buttons">

                            <li class="d-inline">
                                <a href="https://twitter.com/ThELeGenD_Says" target="_blank"
                                    class="btn btnghost btn-lg"><i class="fa fa-twitter fa-fw"></i> <span
                                        class="network-name">Twitter</span></a>
                            </li>

                            <li class="d-inline">
                                <a href="https://www.facebook.com/profile.php?id=632131400" target="_blank"
                                    class="btn btnghost btn-lg"><i class="fa fa-facebook fa-fw"></i> <span
                                        class="network-name">Facebook</span></a>
                            </li>

                            <li class="d-inline">
                                <a href="https://github.com/arslanameer" target="_blank" class="btn btnghost btn-lg"><i
                                        class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Inject Footer Here -->
        <?php subview('footer.php') ?>

        <script src="./assets/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="./assets/js/vendor/bootstrap.min.js"></script>
        <script src="./assets/js/vendor/datatables.min.js"></script>
        <script src="./assets/js/scripts.js"></script>
    </body>

</html>
