<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "francesco", "some_pass", "shop");
 
// Check connection
//if($link === false){
//    die("ERROR: Could not connect. " . mysqli_connect_error());
//}

// Include config file
require_once "config.php";

$target_path = "uploads/";
// uploads/ folder MUST be created under the web folder (expirely, www_nick, ...)
// uploads folder MUST have the right privileges
// sudo chown daemon:daemon -R uploads/
// sudo chmod 775 -R uploads/

$target_file = $target_path . basename( $_FILES['image']['name']);
$source_file = $_FILES['image']['tmp_name'];
$image = '1'; // this is the default image id of RICE

if (empty($source_file)) {
	$image = '1'; // this is the default image id of RICE
} else {
	if(move_uploaded_file($source_file, $target_file))
	{
		$sqlImg = "INSERT INTO images(url) VALUES ('$target_file')";
		if (mysqli_query($link, $sqlImg) == TRUE) 
		{
			$image = $link->insert_id; // this is the ID of the image we just added
			//echo "image: " . $image;
			//die;
		} else 
		{
			echo "Food image database error: " . $sqlImg . "<br>" . $link->error;
			die;
		}

	} else 
	{
		echo "Food image upload failed. I'm afraid something has gone terribly wrong!";
		die;
	}
}

	
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
$expires = mysqli_real_escape_string($link, $_REQUEST['expiration']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);

//echo "expires = " . $expires . "<br>";
//echo date("YW", strtotime($expires)) . "<br>";
//$expires = date("YW", strtotime(mysqli_real_escape_string($link, $_REQUEST['expiration'])));
 
// Attempt insert query execution
$sqlFood = "INSERT INTO food (name, amount, class, expires, description, user_id, image_id) VALUES ('$name', '$amount', 'food', '$expires', '$description', '" . 
        mysqli_real_escape_string($link, $_SESSION['id']) . "', '$image')" or die(mysqli_error());

if (mysqli_query($link, $sqlFood)) {
    //echo "Records added successfully.";
    header("location: index.php");
    exit;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
