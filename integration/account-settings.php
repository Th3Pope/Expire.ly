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
<html style="background-color: #f9f3db;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BlueButton</title>
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
</head>

<body style="background-color: #f9f3db;">
    <nav class="navbar navbar-light navbar-expand-md custom-header">
        <div class="container-fluid">
            <div><a class="navbar-brand" href="home.php" style="font-size: 40px;">Expire.ly</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links"></ul>
                <div style="text-align: center;">
                    <div class="row">
                        <div class="col">
                            <div style="font-size: 19px;"><i class="fa fa-home" style="color: #ffffff;"></i><span><a href="home.php" style="color: #ffffff;">&nbsp; Home&nbsp;&nbsp;</a></span><span><i class="fa fa-angle-double-right" style="color: #ffffff;"></i></span><span><a href="index.php" style="color: #ffffff;">&nbsp; Pantry&nbsp;&nbsp;</a><span><i class="fa fa-angle-double-right" style="color: #ffffff;"></i></span></span><span><a href="account-settings.php" style="color: #ffffff;">&nbsp; Account Settings</a></span></div>
                        </div>
                    </div>
                </div>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <img class="dropdown-image" src="assets/img/avatar.jpg">&nbsp;&nbsp;<?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                        <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="home.php">Home</a><a class="dropdown-item" role="presentation" href="index.php">My Pantry</a><a class="dropdown-item" role="presentation" href="donation.php">Donate Food</a>
                            <a
                                class="dropdown-item" role="presentation" href="analytics.php">Analytics</a><a class="dropdown-item" role="presentation" href="account-settings.php">Account Settings</a><a class="dropdown-item" role="presentation" href="logout.php">Logout </a></div>
                    </li>
                </ul>
        </div>
        </div>
    </nav><div class="container profile profile-view" id="profile">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Profile save with success</span></div>
        </div>
    </div>
    <form>
        <div class="form-row profile-row" >
            <div class="col-md-4 relative" >
                <div class="avatar">
                    <div class="avatar-bg center"></div>
                    <br>
                </div><input type="file" class="form-control" name="avatar-file" style="background-color: #f9f3db; border: none;"/></div>
            <div class="col-md-8">
                <h1>Profile </h1>
                <hr />
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>Firstname </label><input class="form-control" type="text" name="firstname" /></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>Lastname </label><input class="form-control" type="text" name="lastname" /></div>
                    </div>
                </div>
                <div class="form-group"><label>Email </label><input class="form-control" type="email" autocomplete="off" required name="email" /></div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>Password </label><input class="form-control" type="password" name="password" autocomplete="off" required /></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group"><label>Confirm Password</label><input class="form-control" type="password" name="confirmpass" autocomplete="off" required /></div>
                    </div>
                </div>
                <hr />
                <div class="form-row">
                    <div class="col-md-12 content-right">
                        <button class="btn btn-primary form-btn" type="submit">SAVE </button>
                        <button class="btn btn-danger form-btn" type="reset">CANCEL </button>
                        <button type="button" class="btn btn-warning form-btn" onclick="window.location.href = 'reset-password.php';" style="color: white">RESET PASSWORD</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Create-Form.js"></script>
    <script src="assets/js/myChart.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>