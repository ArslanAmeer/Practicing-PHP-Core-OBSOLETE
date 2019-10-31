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
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- PHP Script - Link based on User Login -->
                <?php
                if ($_SESSION['userLogin']['roleId'] == 1) {
                    echo ' <li class="nav-item">
                                    <a class="nav-link" href="ContentManagment.php">Panel</a>
                                </li>';
                }
                    if (!isset($_SESSION['userLogin'])) {
                        echo ' <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">Register</a>
                                </li>';
                    } else {
                        echo '<li class="nav-item">
                                    <a class="nav-link" href="../process/logout_Process.php">Logout</a>
                                </li>';
                    }
                    
                ?>

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
