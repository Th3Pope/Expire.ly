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
    <link rel="stylesheet" href="assets/css/Map.css">
    <link rel="stylesheet" href="assets/css/MUSA_panel-table.css">
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-9 col-xl-3" style="margin-right: 50px;padding-top: 18px;">

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
<div>
    <script async src="https://cse.google.com/cse.js?cx=000096038462138319625:3fpaisqpfsk"></script>
</div></div>
                <div class="col-md-6 col-xl-8" style="width: 301px;">
                    <div class="row"><!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>-->

    <script>
//function deleteRow(r) {
 // var i = r.parentNode.parentNode.rowIndex;
// getElementById("myTableBody").deleteRow(i);
//}
</script>
    
<div class="container" style="background-color:White; padding-top: 30px;">
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
                    
                      <button type="button" class="btn btn-sm btn-primary btn-create" style= "background-color:green;" onclick="openForm()">Create New</button>
		      <button type="open-button" class="btn btn-sm btn-primary btn-create" style= "background-color:red;" onclick="openForm2()">Add Left Overs</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list" id="myTable">
                  <thead >
                    <tr>
                        <th><a class="btn btn-success" href="#popup1"><em class="fa fa-filter"></em></a></th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Expiration</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
<!--                         <th>Good?</th> -->
                    </tr> 
                  </thead>
                  <tbody> <!--error on delete row-->

                    <?php
                      $id = $_SESSION["id"];
                      $sql = "SELECT * FROM food, images WHERE food.user_id = " . $id . " AND images.id = food.image_id";

                      $result = $link->query($sql);
                      if ($result->num_rows > 0) 
                      {
                        while($row = $result->fetch_assoc()) 
                        {
                            echo "<tr>";
                                echo "<td align='center'>";
                                    echo "<a class='btn btn-danger' onclick='deleteRow()'><em class='fa fa-trash' id='trash'></em></a>";
                                echo "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["amount"] . "</td>";
                                echo "<td>" . $row["expires"] . "</td>";
                                echo "<td>" . $row["description"] . "</td>";
                                echo "<td align='center'><img src='" . $row["url"] . "' height='70' width='70'></td>";
                                echo "<td align='center' style='font-size: 30px;'><i class='fas fa-circle' style='color: green;'></i></td>";
                            echo "</tr>";
                        }
                      }
                      else {
                        echo "Sorry, nothing in your pantry! (0 results)";
                      }
                  ?>
                </tbody>
                </table>
            
              </div>

         <!--     <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>-->
<!--<div>
    <h5>Recipe Search
    </h5>
    <script async src="https://cse.google.com/cse.js?cx=0000096038462138319625:3fpaisqpfsk"></script>
<div class="gcse-search"></div>
    </div>-->
              </div>
                </div>
            </div>
        </div>
    </div><div class="form-popup" id="myForm" style = "height: 700px; ">
  <form class="form-container">
    <h2>Add Your Food</h1>

    <label for="name"><b>Food Name</b></label>
    <input id="foodName"  type="text" placeholder="Food" name="name" style= "height: 20px; font-size: 14px" required>

    <label for="amount"><b>Quantity</b></label>
    <input id="foodAmount" type="number" placeholder="Quantity" name="amount" style= "height: 20px; font-size: 16px; width: 250px;" required>
      
     <label for="expiration"><b>Expiration Date</b></label>
    <input id="foodExpiration" type="text" placeholder="Expiration Date" name="expiration" style= "height: 20px; font-size: 14px" required>
      
     <label for="description"><b>Description</b></label>
    <input id="foodDescription" type="text" placeholder="Enter Description" name="description" style= "height: 20px; font-size: 14px">

            
<!--     <label for="good"><b>Good?</b></label>
    <input id= "goodYeah"  type="text" placeholder="Yes or No?" name="good" style= "height: 20px; font-size: 14px" required>  -->
      
      
      <label for="image"><b>Image</b></label>
     <input type="file" id="foodImage" accept="image/*"  onchange="readURL(this)" name="image"style= "height: 30px; font-size: 14px">
       <img id="blah" src="#" alt=" " />
      

      <input type="button" class="btn" onclick="addValues()" value="Add" style="height:40px; width=70px;">
    <input type="button" class="btn cancel" onclick="closeForm(); clearForm()" value="Close" style="height:40px; width=70px;">
  </form>
</div>

<div class="form-popup" id="myForm2" style = "height: 700px; ">
  <form class="form-container">
    <h1>Add your left over</h1>

    <label for="name"><b>Left over name</b></label>
    <input type="text" placeholder="Left Over name" name="name" style="height: 20px; font-size: 16px;" required>

    <label for="amount"><b>Portions</b></label>
    <input type="number" placeholder="Portions" name="amount" style="height: 20px; font-size: 16px; width:250px;" required>

    <label for="expiration"><b>Expiration</b></label>
    <input type="text" name="expiration" style="height: 20px; font-size: 16px; width:250px;" required >

    <label for="Description"><b>Description</b></label>
    <input type="text" placeholder="Description of left over" name="name" style="height: 20px; font-size: 16px; width:250px;" required>

    <input type="button" class="btn" onclick="addValues()" value="Add" style="height:40px; width=70px;">
      
    <input type="button" class="btn cancel" onclick="closeForm2(); clearForm2()" value="Close" style="height:40px; width=70px;">
  </form>
</div>


<!-- <div class="form-popup" id="myForm" style = "height: 700px; ">
  <form class="form-container">
    <h2>Add Your Food</h1>

    <label for="name"><b>Food Name</b></label>
    <input id="foodName"  type="text" placeholder="Food" name="name" style= "height: 20px; font-size: 14px" required>

    <label for="amount"><b>Quantity</b></label>
    <input id="foodAmount" type="number" placeholder="Quantity" name="amount" style= "height: 20px; font-size: 16px; width: 250px;" required>
      
     <label for="expiration"><b>Expiration Date</b></label>
    <input id="foodExpiration" type="text" placeholder="Todays date plus 3 days if left over food" name="expiration" style= "height: 20px; font-size: 14px" required>
      
     <label for="description"><b>Description</b></label>
    <input id="foodDescription" type="text" placeholder="Enter Description" name="description" style= "height: 20px; font-size: 14px">
     
      <label for="good"><b>Good?</b></label>
    <input id= "goodYeah"  type="text" placeholder="Yes or No?" name="good" style= "height: 20px; font-size: 14px" required>
      
      
      <label for="image"><b>Image</b></label>
     <input type="file" id="foodImage" accept="image/*"  onchange="readURL(this)" name="image"style= "height: 30px; font-size: 14px">
       <img id="blah" src="#" alt=" " />
      

      <input id="creatNew" type="button" class="btn" onclick="addValues()" value="Add Item" style="height:40px; width=70px;">
      <input id="creatNewLeftOver" type="button" class="btn" onclick="addValues()" value="Add LeftOvers" style="height:40px; width=70px;">
    <input id="closeForm" type="button" class="btn cancel" onclick="closeForm()" value="Close" style="height:40px; width=70px;">
  </form>
</div> --><div id="popup1" class="overlay">
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
