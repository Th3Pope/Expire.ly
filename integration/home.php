<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Expire.ly</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Analytics.css">
    <link rel="stylesheet" href="assets/css/breadcrumb.css">
    <link rel="stylesheet" href="assets/css/ComingSoon.css">
    <link rel="stylesheet" href="assets/css/Create-Form.css">
    <link rel="stylesheet" href="assets/css/Dynamic-Table.css">
    <link rel="stylesheet" href="assets/css/filter.css">
    <link rel="stylesheet" href="assets/css/Home.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/Map.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet"> 
</head>

<body><nav class="navbar navbar-light navbar-expand-md custom-header">
    <div class="container-fluid">
        <div><a class="navbar-brand" href="home.php" style="font-size: 40px;">Expire.ly</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
        <div
            class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav links"></ul>
            <div style="text-align: center;">
                <div class="row">
                   
                </div>
            </div>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><img class="dropdown-image" src="assets/img/avatar.jpg" />&nbsp;&nbsp;<?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a class="dropdown-item" role="presentation" href="home.php">Home</a>
                        <a class="dropdown-item" role="presentation" href="index.php">My Pantry </a>
                        <a class="dropdown-item" role="presentation" href="donation.php">Donate Food</a>
                        <a class="dropdown-item" role="presentation" href="analytics.php">Analytics </a>
                        <a class="dropdown-item" role="presentation" href="account-settings.php">Account Settings</a>
                        <a class="dropdown-item" role="presentation" href="logout.php">Logout </a></div>
                </li>
            </ul>
    </div>
    </div>
</nav>
<html>


<body id="page-top">
    <header class="masthead text-center text-white d-flex" 
    style="background-image:url('assets/img/veggies.jpg'); background-size: cover; height: 700px;">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 style="padding-top: 100px; font-family: 'Rock Salt', cursive; font-size: 75px; padding-bottom: 50px;" ><strong>Welcome To Expire.ly</strong></h1>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 mx-auto">
                <p style=" font-family: 'Roboto', sans-serif; font-size: 20px;" class="text-faded mb-5">We are dedicated to helping you make sure your kitchen is fully stocked, 
                    and that nothing goes to waste. Have a look around you will be glad you did!
                </p></div>
        </div>
    </header>
    <section id="contact"style="background-color: #f9f3db;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading"style="padding-top: 20px; font-family: 'Permanent Marker', cursive;">Let's Get In Touch!</h2>
                    <hr class="my-4">
                    <p class="mb-5"style=" font-family: 'Roboto', sans-serif; font-size: 20px;">If you have any questions or concerns, don't hesitate. Give us a call or send us 
                        an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center">
                    <i class="fa fa-phone fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-once="true"></i>
                    <p style=" font-family: 'Roboto', sans-serif; font-size: 16px;">605-475-6968</p>
                </div>
                <div class="col-lg-4 mr-auto text-center"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300" data-aos-once="true"></i>
                    <p><a href="mailto:your-email@your-domain.com" style=" font-family: 'Roboto', sans-serif; font-size: 16px;">CustomerCare@Expire.ly</a></p>
                </div>
            </div>
        </div>
    </section>

<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Create-Form.js"></script>
    <script src="assets/js/myChart.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>