<?php
session_start();
// echo"asas".$_SESSION['username'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
// echo"asasas";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'sign.php';
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $tnum=$_POST["tnum"];
    $sitting=$_POST["sitting"];
    $dt=$_POST["dt"];
    $usersname=$_SESSION['username'];
    $sql1="SELECT `sno` FROM `users` WHERE `username`='$usersname'";
    $result=mysqli_query($conn,$sql1);
    mysqli_data_seek($result,0);
    $SNO=mysqli_fetch_row($result);
   
 
    $num=rand(1,45);
    $sql="INSERT INTO `reservedseats`(`fname`,`lname`,`tnum`,`sitting`,`seat_no`,`dt`,`sno`) VALUES('$fname','$lname','$tnum','$sitting','$num','$dt','$SNO[0]')";
    $result=mysqli_query($conn,$sql);
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Our Resturant</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">OUR RESTAURANT</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Reserve Seat</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/DBMSPROJECT/order.php">Place
                            Order</a></li>
                            <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle my-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Info
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/DBMSPROJECT/logs.php">Logs</a>
                                        <a class="dropdown-item" href="/DBMSPROJECT/recent.php">Recent</a>
                                    </div>
                                    </div>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/DBMSPROJECT/logout.php">Logout</a></li>

                    <!-- <span class="badge badge-secondary"><li class="nav-item"><a class="nav-link js-scroll-trigger" href="signup.html">Login</a></li></span>  -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Luxury Palace</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">One cannot think well, love well, sleep well, if one has not
                    dined well.</h2>
                <!-- <a class="btn btn-primary js-scroll-trigger" href="#about">Get Started</a> -->
            </div>
        </div>
    </header>
    <!-- About-->
    <!-- <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Built with love</h2>
                    <p class="text-white-50">
                        In our bid to deliver authentic, undiluted experiences, we???ve introduced a unique regional home
                        style dining experience. Always prepared with a local touch, the home-style cooking ensures that
                        you maintain good health throughout your stay. And at the same time it gives you the opportunity
                        to dabble in the local delicacies.
                        <<a href="https://startbootstrap.com/template-overviews/grayscale/">the preview page</a>
                        . The theme is open source, and you can use it for any purpose, personal or commercial. -->
    <!-- </p>
                </div>
            </div>
            <img class="img-fluid" src="assets/img/resturant.jpg" alt="" />
        </div>
    </section> -->
    <div class="container my-5" id="about">
        <form class="needs-validation" method="post" action="/DBMSPROJECT/Reserveseat.php" >
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">First name</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="First Name" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip02">Last name</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="surname" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label mx-1">Telephone</label>
                    <div class="col-10 mx-1">
                        <input class="form-control" type="tel" value="+91 Your Number" id="tnum" name="tnum">
                    </div>
                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label mx-3 my-2">Seats</label>
                        <div class="mx-5 my-2">
                            <input class="form-control" type="number" value="2" id="sitting" name="sitting">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-2 col-form-label my-2">Time</label>
                        <div class="col-10 md-8 mb-3 my-2">
                            <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                                id="dt" name="dt">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Reserve Seat</button>
            </div>
        </form>
    </div>
    <!-- Projects-->
    <!-- Contact-->
    <section class="projects-section bg-light" id="projects">
        <div class="container">
            <!-- Featured Project Row-->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/dish1.jpeg" alt="" />
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Icecream</h4>
                        <p class="text-black-50 mb-0">You can't buy happiness, but you can buy ice cream and that is
                            pretty much the same thing
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/dish2.jpg" alt="" /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Sahi Paneer</h4>
                                <p class="mb-0 text-white-50">You have no idea about the struggle to find paneer when
                                    you order for paneer butter masala. Paneer ??? Guys, peas out. Because, it doesn't
                                    even 'mattar'.</p>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/dish3.jpg" alt="" /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Pizza</h4>
                                <p class="mb-0 text-white-50">Anyone who says that money cannot buy happiness has
                                    clearly never spent their money on pizza. ...</p>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <!-- <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                    <form class="form-inline d-flex">
                        <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" type="email"
                            placeholder="Enter email address..." />
                        <button class="btn btn-primary mx-auto" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div> -->
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">Nit Jalandhar,punjab,India</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"><a href="#!">jadoun1239@gmail.com.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">+91 9819378461</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container">Copyright ?? All Right Reserved 2020</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>