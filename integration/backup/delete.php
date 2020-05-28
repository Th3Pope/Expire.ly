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

// Get the food id to identy which entry to delete
$food_id = $_GET['food_id'];

 echo "$food_id = " . $_GET['food_id'];


// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL to delete food entry based on its unique id
$sql = "DELETE FROM food WHERE id = $food_id"; 

if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    header('Location: index.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>