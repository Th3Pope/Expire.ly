<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include ("/insert.php");
?>

<!DOCTYPE html>
<html style="background-color: #f9f3db;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ExpV1compiled</title>
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
    <link rel="stylesheet" href="assets/css/Home.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/Map.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
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
                            <div style="font-size: 19px;"><i class="fa fa-home" style="color: #ffffff;"></i><span><a href="home.php" style="color: #ffffff;">&nbsp; Home&nbsp;</a></span><span><i class="fa fa-angle-double-right" style="color: #ffffff;"></i></span><span><a href="index.php" style="color: #ffffff;">&nbsp; Pantry</a></span></div>
                        </div>
                    </div>
                </div>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <img class="dropdown-image" src="assets/img/avatar.jpg">&nbsp;&nbsp;<?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
			<a class="dropdown-item" role="presentation" href="home.php">Home</a>
			<a class="dropdown-item" role="presentation" href="index.php">My Pantry</a>
			<a class="dropdown-item" role="presentation" href="donation.php">Donate Food</a>
                        <a class="dropdown-item" role="presentation" href="analytics.php">Analytics</a>
			<a class="dropdown-item" role="presentation" href="reset-password.php">Reset Password</a>
			<a class="dropdown-item" role="presentation" href="logout.php">Logout </a></div>
                    </li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="d-xl-flex" style="background-color: #f9f3db;padding-top: 37px;">
        <div class="container" style="display: inline-table;">
            <div class="row" style="display: flex; flex-wrap: wrap; float: center;">
                <div class="col-md-6 col-lg-9 col-xl-3" style="margin-right: 30px; padding-top: 18px;">

<style>
html {
 
    font-family: Helevetica, sans-serif;
 
}



input {
 // position: absolute; 
  width: 300px;
  height: 60px;
  font-size: 30px;
  border: 2px;
}

input:focus {
  border: 1px;
    outline: none;
}

li {
  background-color: white; 
    text-align: left;
  font-size: 20px;
  
 
    width: 260px;
    
}

li:hover {
  text-decoration: line-through;
}
    </style>
    <script>
     function newItem() {
  var item = document.getElementById("input").value;
  var ul = document.getElementById("list");
  ul.style ="background-color: white";
  var li = document.createElement("li");
  li.appendChild(document.createTextNode( item));
  ul.appendChild(li);
  document.getElementById("input").value = "";
  li.onclick = removeItem;
}

document.body.onkeyup = function(e) {
  if (e.keyCode == 13 && document.getElementById("input").value != "") {
    newItem();
  }
};

function removeItem(e) {
  e.target.parentElement.removeChild(e.target);
}
    </script>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" />
    
        <html>
    <title>
      To-do List
    </title>
  </head>
  <body>
    <input id="input" placeholder="Things To Do?" />
    <ul id="list"></ul>
  </body>
        </html><div class="row"></div>
<div style="background-color:White; width: 300px; text-align:center;">
    <h5 >Recipe Search
    </h5>
    <script async src="https://cse.google.com/cse.js?cx=0000096038462138319625:3fpaisqpfsk"></script>
<div class="gcse-search"></div>
    </div>
<div style = "padding-bottom: 30px;">
    <script async src="https://cse.google.com/cse.js?cx=000096038462138319625:3fpaisqpfsk"></script>
</div></div>
                <div class="col-md-6 col-xl-8" style="width: 301px;">
                    <div class="row">    
<div class="container" style="background-color:White; padding-top: 30px; margin-left: 15px;">
    <div class="row">
    
        <div class="col-md-12", class="col-md-offset-1">

          <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title" style="padding-bottom: 30px">Pantry</h3>
                  </div>
                  <div class="col col-xs-6 text-right"
                       style="padding-left: 50px;">
                    
                      <button type="button" class="btn btn-sm btn-primary btn-create" style= "background-color:green; width: 100px;" onclick="openForm(); closeForm2();">Create New</button>
    <!--LEFTOVER BUTTON-->
                      <button type="open-button" class="btn btn-sm btn-primary btn-create" style= "background-color:light-blue; width: 100px;" onclick="openForm2(); closeForm();">Left Overs?</button>
                  </div>
                </div>
              </div>
             
             <!-- Table Start overflow-x:auto is for table scroll when page gets small-->
              <div class="panel-body" style="overflow-x:auto;">
                <table class="table table-striped table-bordered table-list" id="myTable" >
                  <thead>
                    <tr>
                        <th><a class="btn btn-success" href="#popup1"><em class="fa fa-filter"></em></a></th>
                        <th>Name</th>
                        <th>Expiration</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
<!--                         <th>Good?</th> -->
                    </tr> 
                  </thead>
                  <tbody> <!--error on delete row-->
                          <tr>
                            <td align="center">
                              <a class="btn btn-danger" onclick="deleteRow(this)"><em class="fa fa-trash" id="trash"></em></a>
                            </td>
                            <td>Rice</td>
                            <td>2030-10-27</td>
                            <td>10 pounds</td>
                            <td>California Short Grain</td>
                              <td align="center"><img src="https://www.lundberg.com/wp-content/uploads/2014/06/ShortGrainBrown-600x600.png" height="70" width="70"></td>
<!--                               <td>yes</td> -->
                              <td align="center" style="font-size: 30px;"><i class="fas fa-circle" style="color: green;"></i></td>
                          </tr>
                        </tbody>
                </table>
            
              </div>


              </div>
                </div>
            </div>
        </div>
    </div><div class="form-popup" id="myForm" style="float: bottom;">
  <form action="/insert.php" class="form-container">
    <h1 style="text-align: center;">Add Your Food</h1>

    <label for="name"><b>Food Name</b></label>
    <input id="foodName"  type="text" placeholder="Food" name="name" style= "height: 20px; font-size: 14px" required>

    <label for="amount"><b>Quantity</b></label>
    <input id="foodAmount" type="number" placeholder="Quantity" name="amount" style= "height: 20px; font-size: 16px; width: 250px;" required>
      
     <label for="expiration"><b>Expiration Date</b></label>
    <input id="foodExpiration" type="date" placeholder="Expiration Date" name="expiration" style= "height: 20px; width: 250px; font-size: 14px" required>
      
     <label for="description"><b>Description</b></label>
    <input id="foodDescription" type="text" placeholder="Enter Description" name="description" style= "height: 20px; font-size: 14px">
      
      <label for="image"><b>Image</b></label>
     <input type="file" id="foodImage" accept="image/*" onchange="readURL(this)" name="image"style= "height: 40px; font-size: 12px">
       <img src= "assets/img/image.jpg" height="70" width="70" id="blah"/>

  
      <button type="submit" class="btn" onclick="clearForm();" style="width:100%; height: 20px; line-height:5%;">Add</button> 
      
    <button type="submit" class="btn cancel" onclick="closeForm(); clearForm();" style="width:100%; height: 20px; line-height:5%;">Close</button>
  </form>
</div>
</div>


<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Feature Coming Soon</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			Hang in there! We are working diligently to implement filters.
		</div>
	</div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Create-Form.js"></script>
</body>

</html>
