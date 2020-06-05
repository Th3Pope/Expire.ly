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
   include_once ($_SERVER["DOCUMENT_ROOT"] . "/insert.php");
?>
<!DOCTYPE html>
<html style="background-color: #f9f3db;">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>expire.ly</title>
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
            <div class="collapse navbar-collapse" id="navbar-collapse">
               <ul class="nav navbar-nav links"></ul>
               <div style="text-align: center;">
                  <div class="row">
                     <div class="col">
                        <div style="font-size: 19px;"><i class="fa fa-home" style="color: #ffffff;"></i><span><a href="home.php" style="color: #ffffff;">&nbsp; Home&nbsp;</a></span><span><i class="fa fa-angle-double-right" style="color: #ffffff;"></i></span><span><a href="#" style="color: #ffffff;">&nbsp; Pantry</a></span></div>
                     </div>
                  </div>
               </div>
               <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                     <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"> <img class="dropdown-image" src="assets/img/avatar.jpg">&nbsp;&nbsp;<?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                     <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" role="presentation" href="home.php">Home</a><a class="dropdown-item" role="presentation" href="index.php">My Pantry</a><a class="dropdown-item" role="presentation" href="donation.php">Donate Food</a>
                        <a
                           class="dropdown-item" role="presentation" href="analytics.php">Analytics</a><a class="dropdown-item" role="presentation" href="account-settings.php">Account Settings</a><a class="dropdown-item" role="presentation" href="logout.php">Logout </a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="d-xl-flex" style="background-color: #f9f3db;padding-top: 37px;">
      <div class="container" style="display: inline-table;">
      <div class="row" style="display: flex; flex-wrap: wrap; float: center;">
      <div class="col-md-6 col-lg-9 col-xl-3" style="margin-right: 30px; padding-top: 18px;">
              
         <?php 
	
   $userid = $_SESSION["id"];
	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {

		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$query = "INSERT INTO todo (note, user_id) VALUES ('$task', '$userid')";//needs diff user_id
			mysqli_query($link, $query);
			header('location: index.php');
		}
	}	

	// delete task
	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];

		mysqli_query($link, "DELETE FROM todo WHERE id=".$id);
		header('location: index.php');
	}

	// select all tasks if page is visited or refreshed
	$tasks = mysqli_query($link, "SELECT * FROM todo WHERE user_id = '$userid'");

?>

<div id="taskToDo">
<head>
	<title>Tasks Todo</title>
	<link rel="stylesheet" type="text/css" href="todoStyle.css">
</head>

<body id="bodyID">

	<div id="headingID" class="heading">
		<h4>My Tasks</h4>
	</div>


	<form id= "buttonArea" method="post" action="index.php" class="input_form">
		<?php if (isset($errors)) { ?>
			<p><?php echo $errors; ?></p>
		<?php } ?>
		<input type="text" name="task" class="task_input"placeholder="Add a task here">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add</button>
	</form>


	<table id= "tblBody">
		<thead style="border-bottom: 3px solid black; padding-bottom: 6px;">
			<tr>
				<th>#</th>
				<th>Tasks</th>
				<th>Done</th>
			</tr>
		</thead>

		<tbody ><!--id= "tblBody"-->
			<?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				<tr id="tableRow">
					<td> <?php echo $i; ?> </td>
					<td class="task" > <?php echo $row['note']; ?> </td>
					<td class="delete"> 
						<a href="index.php?del_task=<?php echo $row['id'] ?>">X</a> 
					</td>
				</tr>
			<?php $i++; } ?>	
		</tbody>
	</table>

</body>
         </div>

         <!--/htmlBELOW SHOULD COME BACK ITS THE RECIPE SEARCH-->
         <div class="row"></div>
         <div style="text-align:center; width: 300px; background-color:White;">
            <h4 >Recipe Search</h4>
            <!--script async src="https://cse.google.com/cse.js?cx=0000096038462138319625:3fpaisqpfsk"></script-->
            <div class="gcse-search"></div>
         </div>
         <div style = "padding-bottom: 30px;">
            <script async src="https://cse.google.com/cse.js?cx=000096038462138319625:3fpaisqpfsk"></script>
         </div>
      </div>
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
                              <button type="button" class="btn btn-sm btn-primary btn-create" style= "background-color:green; border: none; width: 100px;" onclick="openForm(); closeForm2();">Create New</button>
                              <!--LEFTOVER BUTTON-->
                              <button type="open-button" class="btn btn-sm btn-primary btn-create" style= "background-color:light-blue; border: none; width: 100px;" onclick="openForm2(); closeForm();">Left Overs?</button>
                           </div>
                        </div>
                     </div>
                     <!-- Table Start overflow-x:auto is for table scroll when page gets small-->
                     <div class="panel-body" style="overflow-x:auto;">
                        <table class="table table-striped table-bordered table-list" id="myTable" >
                           <thead>
                              <tr>
                                 <th>Delete</th>
                                 <th>Name</th>
                                 <th>Expiration</th>
                                 <th>Amount</th>
                                 <th>Description</th>
                                 <th>Image</th>
                                 <th>Status</th>
                                 <!--                         <th>Good?</th> -->
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $id = $_SESSION["id"];
                                 
                                 $sql = "SELECT food.id, food.name, food.amount, food.expires, food.description, food.user_id, food.image_id, images.id AS 'image_id', images.url FROM food, images WHERE food.user_id = " . $id . " AND images.id = food.image_id ORDER BY STR_TO_DATE(food.expires, \"%Y-%m-%d\") ASC";
                                 
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) 
                                {
                  while($row = $result->fetch_assoc()) 
                                    {
                    $now = new DateTime('NOW', new DateTimeZone('America/Los_Angeles')); // should use user time zone
                    $expires = new DateTime($row["expires"], new DateTimeZone('America/Los_Angeles'));
                    $idays = 0;
                    if ($expires < $now) {
                      $idays = -(int)date_diff($now, $expires)->format("%a");
                      //echo "<br>idays = " . $idays . "<br>";
                    } else {
                      $idays = (int)date_diff($now, $expires)->format("%a");
                      //echo "<br>idays = " . $idays . "<br>";
                    }

                                       echo "<tr>";
                                 
                                           echo "<td align='center'>";
                                            echo "<a class='btn btn-danger'  
                                                   href='delete.php?food_id=" . $row["id"] . "'>
                                                   <em class='fa fa-trash'></em></a>";
                                           echo "</td>";
                                           echo "<td>" . $row["name"] . "</td>";
                                           echo "<td>" . $row["expires"] ."</td>";
                                           echo "<td>" . $row["amount"] . "</td>";
                                           echo "<td>" . $row["description"] . "</td>";
                                           echo "<td align='center'><img src='" . $row["url"] . "' height='70' width='70'></td>";

                    if ($idays < 3) {
                                          $color = 'red';
                                        } elseif ($idays >= 3 && $idays <= 14) {
                                          $color = 'orange';
                                        } else {
                                          $color = 'green';
                                        }

                                           echo "<td align='center' style='font-size: 30px;'><i class='fas fa-circle' style='color: " . $color . ";'></i></td>";
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
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="form-popup" id="myForm" style = "float: bottom;">
         <form class="form-container" method="post" action="./insert.php" enctype="multipart/form-data">
           	 <input type="hidden" name="class" value="food">

            <h1 style="text-align: center;">Add Your Food</h1>
            <label for="name"><b>Food Name</b></label>
            <input id="foodName"  type="text" placeholder="Food" name="name" style= "height: 20px; font-size: 14px" required>
            <label for="amount"><b>Quantity</b></label>
            <!-- Switched from number to text type-->
            <input id="foodAmount" type="text" placeholder="Quantity" name="amount" style= "height: 20px; font-size: 16px" required>
            <label for="expiration"><b>Expiration Date</b></label>
            <input id="foodExpiration" type="date" placeholder="Expiration Date" name="expiration" style= "height: 20px; width: 250px; font-size: 14px" required>
            <label for="description"><b>Description</b></label>
            <input id="foodDescription" type="text" placeholder="Enter Description" name="description" style= "height: 20px; font-size: 14px">
            <label for="image"><b>Image</b></label>
            <input type="file" id="foodImage" accept="image/*" onchange="readURL(this)" name="image" style= "height: 40px; font-size: 12px">
            <img src= "assets/img/image.jpg" height="70" width="70" id="blah"/>
            <button type="submit" class="btn" onclick="removeFns(); clearForm();" style="width:100%; height: 20px; line-height:5%;"> Add </button>
            <button type="submit" class="btn cancel" onclick="closeForm(); clearForm();" style="width:100%; height: 20px; line-height:5%;"> Close </button>
         </form>
      </div>
      <!--LEFT OVER BUTTON-->
      
        <div class="form-popup" id="myForm2" style = "float: bottom;">
           <form class="form-container" method="post" action="./insert.php" enctype="multipart/form-data">
           	 <input type="hidden" name="class" value="leftover">

             <h1 style="text-align: center;">Left Overs?</h1>
         
             <label for="name"><b>Left over name</b></label>
             <input id="leftName" type="text" placeholder="Left Over name" name="name" style="height: 20px; font-size: 16px;" required>
         
             <label for="amount"><b>Portions</b></label>
             <input id="leftAmount" type="number" placeholder="Portions" name="amount" style="height: 20px; font-size: 16px; width:250px;" required>
         

             <label for="expiration"><b></b>Expiration</label>
             <?php
              $my_date = new DateTime('NOW');
              $date_plus_3_days = date_add($my_date, new DateInterval('P3D'));
              echo "<input id='leftExpiration; type='date' value='" . $date_plus_3_days->format("Y-m-d") . "' name='expiration' style='height: 20px; width: 250px; font-size: 14px' required>";
             ?>
             <?php
             
             ?>
         
             <label for="Description"><b>Description</b></label>
             <input id= "leftDescription" type="text"  placeholder="Description of left over" name="description" style="height: 20px; font-size: 16px; width:250px;" required>
                
              
             <button type="submit" class="btn" onclick="removeFns(); clearForm2();" style="width:100%; height: 20px; line-height:5%;"> Add </button>
            <button type="submit" class="btn cancel" onclick="closeForm2(); clearForm2();" style="width:100%; height: 20px; line-height:5%;"> Close </button>
           </form>
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
      <script src="assets/js/myChart.js"></script>
      <script src="assets/js/Profile-Edit-Form.js"></script>
   </body>
</html>