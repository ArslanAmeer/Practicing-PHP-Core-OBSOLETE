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
        <link
            href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i|Open+Sans:300,300i,400,400i,700,700i"
            rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/vendor/theme.css">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-custom fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">ARSLAN</a>
                <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsDefault">
                    <ul class="navbar-custom navbar-nav ml-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Logout</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="portfolio-item.html">Project</a>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="page.html">Page Layout</a>
                                <a class="dropdown-item" href="post.html">Post Layout</a>
                            </div>
                        </li> -->

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="contact.html">Hire me</a>
                        </li> -->
                    </ul>

                </div>
            </div>
        </nav>
        <!-- endinject -->


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
                        <a href="portfolio-item.html">
                            <img src="https://images.unsplash.com/photo-1504626835342-6b01071d182e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=975855d515c9d56352ee3bfe74287f2b&auto=format&fit=crop&w=750&q=80"
                                alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="portfolio-item.html">
                            <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=468a8c18f5d811cf03c654b653b5089e&auto=format&fit=crop&w=750&q=80"
                                alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="portfolio-item.html">
                            <img src="https://images.unsplash.com/photo-1415650328328-1909c4ceabdb?ixlib=rb-0.3.5&s=4cb4e1b2310aa5d2307eff04f113d5f0&auto=format&fit=crop&w=750&q=80"
                                alt="">
                        </a>
                    </li>


                    <li class="col-md-3">
                        <a href="portfolio-item.html">
                            <img src="https://images.unsplash.com/photo-1442850473887-0fb77cd0b337?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6b527796946e88db3a0ec912ebe1a613&auto=format&fit=crop&w=750&q=80"
                                alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="portfolio-item.html">
                            <img src="https://images.unsplash.com/photo-1495339647587-9021d80165d4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=79a0f3149dfec84464e0506f5ccb9107&auto=format&fit=crop&w=750&q=80"
                                alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="portfolio-item.html">
                            <img src="https://images.unsplash.com/photo-1506852613309-def986635d7e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f8b18461ac8b3abab7e7188eb342d8e1&auto=format&fit=crop&w=750&q=80"
                                alt="">
                        </a>
                    </li>


                    <li class="col-md-3">
                        <a href="portfolio-item.html">
                            <img src="https://images.unsplash.com/photo-1430915860098-2e303ffb8276?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f46f45c52d542e4b7cba47f1709cc98c&auto=format&fit=crop&w=750&q=80"
                                alt="">
                        </a>
                    </li>

                    <li class="col-md-3">
                        <a href="portfolio-item.html">
                            <img src="https://images.unsplash.com/photo-1430263431647-7bed9f792e72?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2f8e40576370da12b7f4c8c97f4a5044&auto=format&fit=crop&w=750&q=80"
                                alt="">
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

        <!-- inject:partials/footer.html -->
        <footer>
            <div class="container text-center">
                <p class="credits">
                    Copyright &copy; Your Website 2019<br /> | Demo Project By
                    <a class="highlightlink" target="_blank" href="https://www.arslanameer.com"> Arslan Ameer</a>
                </p>
            </div>
        </footer>

        <script src="./assets/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="./assets/js/vendor/bootstrap.min.js"></script>
        <script src="./assets/js/scripts.js"></script>
    </body>

</html>
