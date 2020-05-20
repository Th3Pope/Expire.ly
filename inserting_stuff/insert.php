<?php
session_start();

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "francesco", "some_pass", "shop");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Include config file
//require_once "config.php";

// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
$expiration = mysqli_real_escape_string($link, $_REQUEST['expiration']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$image = mysqli_real_escape_string($link, $_REQUEST['image']);
 
// Attempt insert query execution
$sql = "INSERT INTO food (userid, name, amount, expiration, description) VALUES ('" . mysqli_real_escape_string($link, $_SESSION['id']) . "', '$name', '$amount', '$expiration', '$description')" or die(mysqli_error());;
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
