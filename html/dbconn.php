<?php
$server = "localhost";
$username = "nnewhard";
$password = "wS9cMCF6*R!";
$dbname = "expirely";

// Create connection
try{
   //$conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");

   $conn=mysqli_connect($hostname,$username,$password,$db);


   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Unable to connect with the database');
}