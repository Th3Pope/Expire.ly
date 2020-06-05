
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
                            <div style="font-size: 19px;"><i class="fa fa-home" style="color: #ffffff;"></i><span><a href="home.php" style="color: #ffffff;">&nbsp; Home&nbsp;</a></span><span><i class="fa fa-angle-double-right" style="color: #ffffff;"></i></span><span><a href="index.php" style="color: #ffffff;">&nbsp; Pantry&nbsp;</a><span><i class="fa fa-angle-double-right" style="color: #ffffff;"></i></span></span><span><a href="#" style="color: #ffffff;">&nbsp; Analytics</a></span></div>
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
    </nav>    <div>
        <div class="container"><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            <!-- top row-->
            <div class="row">
                <div class="col-md-12">
                <h3 style="text-align: center; padding: 15px;">Welcome to your analytics page!</h3>
      
                <body style="text-align: center; margin-bottom: 30px;">Here we give you a visual break down of how your foods are represented in charts.
      We recommened always keep an eye on the quality of the food items in your inventory.
    The fewer items in the yellow and red zones means the more prepared you are!</body>
                </div>
            </div>
            <!--Bottom Row-->
            <div class="row">
                <!--Left Block-->
                <div class="col-md-6">
                <canvas id="Chart1" width="300" height="300"></canvas>
                </div>
                <!--Right block-->
                <div class="col-md-6">
                <canvas id="Chart2" width="300" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Create-Form.js"></script>
</body>
<?php
                                $bad = 0;
                                $use = 0;
                                $good = 0;
                                
                                
                                $seshId = $_SESSION["id"];
                                 
                                 $sqlFetch = "SELECT expires, user_id FROM food WHERE user_id = ' $seshId ' " ;
                                 
                                $result = $link->query($sqlFetch);
                                if ($result->num_rows > 0) 
                                {
                  while($row = $result->fetch_assoc()) 
                                    {
                    $now = new DateTime('NOW', new DateTimeZone('America/Los_Angeles')); // should use user time zone
                    $expires = new DateTime($row["expires"], new DateTimeZone('America/Los_Angeles'));
                    $idays = 0;
                    if ($expires < $now) {
                      $idays = -(int)date_diff($now, $expires)->format("%a");
                      
                    } else {
                      $idays = (int)date_diff($now, $expires)->format("%a");
                      
                    }

                                        if ($idays < 3) {
                                          ++$bad;
                                        } elseif ($idays >= 3 && $idays <= 14) {
                                          ++$use;
                                        } else {
                                          ++$good;
                                        }
                                   }
                                 }
                                
                                 ?>

  <script>
  //var dataStuff = [0, 0, 0];
  var bad = <?php echo json_encode($bad); ?>;
  var use = <?php echo json_encode($use); ?>;
  var good = <?php echo json_encode($good); ?>;

  var ctx = document.getElementById('Chart1').getContext('2d');
  var chart = new Chart(ctx, {
  /*
  * type indicates the type of chart we will be using
  * line, bar, radar, doughnut and pie, polar area, bubble, and scatter
  */
  type: 'bar',

  // The data for our dataset
  data: {
      labels: ["Good", "Use", "Bad"],
      datasets: [{
          label: ["Good", "Use", "Bad"],
          backgroundColor: ['rgb(35, 136, 35)', 'rgb(255, 191, 0)', 'rgb(210, 34, 46)'],
          borderColor: 'rgb(0, 0, 0)',
          data: [good, use, bad],
      }]
  },

  // Configuration options go here
  options: {

  }
});
  /*
  * Separating JavaScript for different charts
  */
  var cty = document.getElementById('Chart2').getContext('2d');
  var chart = new Chart(cty, {
  /*
  * type indicates the type of chart we will be using
  * line, bar, radar, doughnut and pie, polar area, bubble, and scatter
  */
  type: 'doughnut',

  // The data for our dataset
  data: {
    labels: [ "Good", "Use", "Bad"],
    datasets: [{
        label: [ "Good", "Use", "Bad"],
        backgroundColor: ['rgb(35, 136, 35)', 'rgb(255, 191, 0)', 'rgb(210, 34, 46)'],
        borderColor: 'rgb(0, 0, 0)',
        data: [ good, use, bad],
    }]
  },

  // Configuration options go here
  options: {

  }
  });
  </script>

</html>
