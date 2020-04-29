<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="$
</head>
<body>

<?php
    $hostname = "localhost";//35.247.109.182:3306";
    $username = "nnewhard";
    $password = "wS9cMCF6*R!";
    $db = "expirely";
    $dbconnect=mysqli_connect($hostname,$username,$password,$db);

    if (!$dbconnect) {
        die('Connect Error: ' . mysqli_connect_error());
    }
    if ($dbconnect->connect_error) {
        die("Database connection failed: " . $dbconnect->connect_error);
    }
?>

<table border="1" align="center">
<tr>
  <td>Game</td>
  <td>Rating</td>
  <td>Details</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT name,rating,players_min,players_max FROM games")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo //"{$row['name']}<BR>{$row['rating']}<BR>";
   "<tr>
   <td>{$row['name']}</td>
   <td>{$row['rating']}</td>
   <td> {$row['players_min']} to {$row['players_max']} players</td>
  </tr>";
}

?>

</table>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0$
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJ$
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2$

</body>
</html>
