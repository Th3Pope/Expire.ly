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

// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
$expires = mysqli_real_escape_string($link, $_REQUEST['expiration']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$image = '1';//mysqli_real_escape_string($link, $_REQUEST['image']);

//echo "expires = " . $expires . "<br>";
//echo date("YW", strtotime($expires)) . "<br>";
//$expires = date("YW", strtotime(mysqli_real_escape_string($link, $_REQUEST['expiration'])));
 
// Attempt insert query execution
$sql = "INSERT INTO food (name, amount, class, expires, description, user_id, image_id) VALUES ('$name', '$amount', 'food', '$expires', '$description', '" . 
        mysqli_real_escape_string($link, $_SESSION['id']) . "', '$image')" or die(mysqli_error());

if(mysqli_query($link, $sql)){
    //echo "Records added successfully.";
    header("location: index.php");
    exit;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
